<?php
/**
 * Created by PhpStorm.
 * User: lethergo
 * Date: 16/05/2018
 * Time: 09:39
 */

namespace Modules\Company\Http\Controllers;


use App\Notification;
use App\Repositories\NotificationRepository;
use App\User;

class NotificationZgroupController extends NotificationRepository
{
    public function sendAddNewOrderNotification($actorId){
        $admins = User::where('role',2)->get();
        $staff = User::find($actorId);
        foreach ($admins as $admin){
            $notification = new Notification;
            $notification->actor_id = $actorId;
            $notification->receiver_id = $admin->id;
            $notification->message = $staff->name . " đã tạo một đơn đặt hàng mới";
            $notification->url = "/business/order-good";
            $notification->type = 0;
            $notification->save();
            $this->sendNotification($notification);
        }
    }
    public function sendAddNewOrderedNotification($actorId){
        $admins = User::where('role',2)->get();
        $staff = User::find($actorId);
        foreach ($admins as $admin){
            $notification = new Notification;
            $notification->actor_id = $actorId;
            $notification->receiver_id = $admin->id;
            $notification->message = $staff->name . " đã tạo một đặt hàng mới";
            $notification->url = "/business/ordered-good";
            $notification->type = 0;
            $notification->save();
            $this->sendNotification($notification);
        }
    }
    public function sendAddNewImportOrderNotification($actorId){
        $admins = User::where('role',2)->get();
        $staff = User::find($actorId);
        foreach ($admins as $admin){
            $notification = new Notification;
            $notification->actor_id = $actorId;
            $notification->receiver_id = $admin->id;
            $notification->message = $staff->name . " đã tạo một đơn nhập hàng mới";
            $notification->url = "/business/import-order";
            $notification->type = 0;
            $notification->save();
            $this->sendNotification($notification);
        }
    }
    public function sendAddNewExportOrderNotification($actorId){
        $admins = User::where('role',2)->get();
        $staff = User::find($actorId);
        foreach ($admins as $admin){
            $notification = new Notification;
            $notification->actor_id = $actorId;
            $notification->receiver_id = $admin->id;
            $notification->message = $staff->name . " đã tạo một đơn xuất hàng mới";
            $notification->url = "/business/export-order";
            $notification->type = 0;
            $notification->save();
            $this->sendNotification($notification);
        }
    }
}