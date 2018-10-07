<?php

namespace Modules\Notification\Http\Controllers;

use App\Http\Controllers\ManageApiController;
use App\Notification;
use App\NotificationType;
use App\Repositories\NotificationRepository;
use App\SendNotification;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NotificationManageApiController extends ManageApiController
{
    protected $notificationRepository;

    public function __construct(NotificationRepository $notificationRepository)
    {
        parent::__construct();
        $this->notificationRepository = $notificationRepository;
    }

    public function allNotificationTypes(Request $request)
    {

        $limit = 20;

        $notificationTypes = NotificationType::where('status', 1);
        if ($request->search) {
            $notificationTypes = $notificationTypes->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('template', 'like', '%' . $request->search . '%')
                    ->orWhere('content_template', 'like', '%' . $request->search . '%');
            });
        }
        $notificationTypes = $notificationTypes->orderBy('created_at', 'desc')->paginate($limit);

        $data = [
            'notification_types' => $notificationTypes->map(function ($notificationType) {
                return $notificationType->transform();
            })
        ];

        return $this->respondWithPagination($notificationTypes, $data);
    }

    public function createNotificationType(Request $request)
    {

        if ($request->name == null) {
            return $this->respondErrorWithStatus("Thiếu name");
        }
        if ($request->description == null) {
            return $this->respondErrorWithStatus("Thiếu description");
        }
        if ($request->type == null) {
            return $this->respondErrorWithStatus("Thiếu type");
        }
        $notificationType = new NotificationType();
        $notificationType->color = $request->color;
        $notificationType->name = $request->name;
        $notificationType->template = $request->description;
        $notificationType->icon = '<i class="material-icons">notifications</i>';
        $notificationType->type = $request->type;
        $notificationType->content_template = $request->content_template;
        $notificationType->status = 1;
        $notificationType->mobile_notification_type_id = $request->mobile_notification_type_id;
        $notificationType->save();

        return $this->respondSuccessWithStatus([
            'notification_type' => $notificationType->transform()
        ]);
    }

    public function editNotificationType($notificationTypeId, Request $request)
    {

        if ($request->name == null) {
            return $this->respondErrorWithStatus("Thiếu name");
        }
        if ($request->description == null) {
            return $this->respondErrorWithStatus("Thiếu description");
        }
        if ($request->type == null) {
            return $this->respondErrorWithStatus("Thiếu type");
        }
        $notificationType = NotificationType::where('id', $notificationTypeId)->where('status', 1)->first();
        if ($notificationType == null) {
            return $this->respondErrorWithStatus("Không tồn tại");
        }
        $notificationType->color = $request->color;
        $notificationType->name = $request->name;
        $notificationType->template = $request->description;
        $notificationType->icon = '<i class="material-icons">notifications</i>';
        $notificationType->type = implode(',', $request->type);
        $notificationType->content_template = $request->content_template;
        $notificationType->status = 1;
        $notificationType->mobile_notification_type_id = $request->mobile_notification_type_id;
        $notificationType->save();

        return $this->respondSuccessWithStatus([
            'notification_type' => $notificationType->transform()
        ]);
    }

    public function deleteNotificationType($notificationTypeId)
    {
        $notificationType = NotificationType::where('id', $notificationTypeId)->where('status', 1)->first();
        if ($notificationType == null) {
            return $this->respondErrorWithStatus("Không tồn tại");
        }
        $notificationType->delete();
        return $this->respondSuccessWithStatus([
            'message' => "Xóa thành công"
        ]);
    }

    public function sendNotification(Request $request)
    {
        $notificationType = NotificationType::find($request->notification_type_id);
        if ($notificationType == null) {
            return $this->respondErrorWithStatus("Không tồn tại");
        }

        $sendNotification = new SendNotification();

        $sendNotification->name = $request->name;
        $sendNotification->notification_type_id = $request->notification_type_id;
        $sendNotification->creator_id = $this->user->id;

        if ($request->send_time != null) {
            $sendNotification->send_time = $request->send_time;
            $sendNotification->status = 'pending';
        }
        $sendNotification->save();

        if ($sendNotification->status == null) {

            foreach (explode(',', $notificationType->type) as $type) {
                switch ($type) {
                    case 'social':
                        $devices = getDevicesNotification(config('app.noti_app_id'), config('app.noti_app_key'));
                        break;
                    case 'mobile_social':
                        $devices = getDevicesNotification(config('app.noti_app_id'), config('app.noti_app_key'));
                        break;
                    case 'manage':
                        $devices = getDevicesNotification(config('app.noti_app_manage_id'), config('app.noti_app_manage_key'));
                        break;
                    case 'mobile_manage':
                        $devices = getDevicesNotification(config('app.noti_app_manage_id'), config('app.noti_app_manage_key'));
                        break;
                    default:
                        $devices = [];
                }

                $users = [];

                // gửi cho một nhóm người
                foreach ($devices as $device) {
                    if ($device->tags && isset($device->tags->user_id) && isset($device->tags->device_type)
                        && $device->tags->device_type == $type && !in_array($device->tags->user_id, $users)) {
                        $users[] = $device->tags->user_id;
                    }
                }

                $users = User::whereIn('id', $users)->pluck('id');
//                $users = User::where('id', 1966)->pluck('id');

                $users->map(function ($user) use ($type, $sendNotification, $notificationType) {

                    $userData = User::find($user);

                    $dataConvert = [
                        'user_name' => $userData->name,
                        'user_email' => $userData->email,
                        'user_phone' => $userData->phone,
                    ];

                    $notification = new Notification();
                    $notification->actor_id = 0;
                    $notification->receiver_id = $user;
                    $notification->product_id = "send-notification";
                    $notification->type = $notificationType->id;
                    $notification->message = convertContent($notificationType->template, $dataConvert);
                    $notification->content = convertContent($notificationType->content_template, $dataConvert);
                    $notification->image_url = defaultAvatarUrl();
                    $notification->url = "/";
                    $notification->send_notification_id = $sendNotification->id;
                    $notification->save();

                    $this->notificationRepository->sendNotificationWithDeviceType($notification, $type);
                });
            }

            return $this->respondSuccess("Gửi thành công");
        }

        return $this->respondSuccess("Lưu thành công");

    }

    public function historySendNotifications(Request $request)
    {
        $sendNotifications = SendNotification::query();

        $limit = 20;
        if ($request->search) {
            $sendNotifications = $sendNotifications->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%');
            });
        }

        $sendNotifications = $sendNotifications->orderBy('created_at', 'desc')->paginate($limit);

        $data = [
            'history_notifications' => $sendNotifications->map(function ($sendNotification) {
                return $sendNotification->transform();
            })
        ];

        return $this->respondWithPagination($sendNotifications, $data);
    }
}
