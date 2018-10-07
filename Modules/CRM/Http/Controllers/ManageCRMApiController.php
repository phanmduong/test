<?php

namespace Modules\CRM\Http\Controllers;

use App\Http\Controllers\ManageApiController;
use App\Register;
use App\Repositories\CourseRepository;
use App\Repositories\UserRepository;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class ManageCRMApiController extends ManageApiController
{

    protected $userRepository;
    protected $courseRepository;

    public function __construct(UserRepository $userRepository, CourseRepository $courseRepository)
    {
        parent::__construct();

        $this->userRepository = $userRepository;
        $this->courseRepository = $courseRepository;

    }

    function getRegisterTimes($registers)
    {
        $register_times = [];
        for ($i = 0; $i < count($registers); $i++) {
            $j = $i + 1;
            $times = 1;
            for (; $j < count($registers); $j++) {
                if ($registers[$i]->user_id != $registers[$j]->user_id) break;
                if (format_vn_date(strtotime($registers[$j - 1]->created_at)) != format_vn_date(strtotime($registers[$j]->created_at))) {
                    $times++;
                }
            }
            $register_times[] = [
                'user_id' => $registers[$i]->user_id,
                'name' => $registers[$i]->name,
                'times' => $times
            ];

            $i = $j - 1;
        }

        return $register_times;

    }

    public function analytics(Request $request)
    {
        $registersData = Register::join('users', 'registers.user_id', '=', 'users.id')->select('users.name', 'registers.*')
            ->where('registers.status', 1)->where('registers.money', '>', 0)->where('users.role', '<=', 0)->orderBy('user_id')->orderBy('created_at');


        $registers = clone $registersData;

        if ($request->campaign_id > 0) {
            $registers = $registers->where('campaign_id', $request->campaign_id);
        }

        if ($request->campaign_id == -1) {
            $registers = $registers->whereNull('campaign_id');
        }

        if ($request->campaign_id == -2) {
            $registers = $registers->whereNotNull('campaign_id');
        }
        $registers = $registers->get();


        $register_times = $this->getRegisterTimes($registers);

        $registerIds = $registersData->pluck('user_id');

        $no_time = User::where('role', '<=', 0)->whereNotIn('id', $registerIds)->count();

        $one_time = count(array_filter($register_times, function ($register_time) {
            return $register_time['times'] == 1;
        }));

        $two_times = count(array_filter($register_times, function ($register_time) {
            return $register_time['times'] == 2;
        }));
        $more_times = count(array_filter($register_times, function ($register_time) {
            return $register_time['times'] > 2;
        }));

        return $this->respondSuccessWithStatus([
            'analytics' => [
                'no_time' => $no_time,
                'one_time' => $one_time,
                'two_times' => $two_times,
                'more_times' => $more_times,
            ]
        ]);
    }

    public function clients(Request $request)
    {
        $registersData = Register::join('users', 'registers.user_id', '=', 'users.id')->select('users.name', 'registers.id', 'registers.created_at', 'registers.user_id')
            ->where('registers.status', 1)->where('registers.money', '>', 0)->where('users.role', '<=', 0)->orderBy('user_id')->orderBy('created_at');

        $limit = 20;

        $registers = clone $registersData;

        if ($request->campaign_id > 0) {
            $registers = $registers->where('campaign_id', $request->campaign_id);
        }

        if ($request->campaign_id == -1) {
            $registers = $registers->whereNull('campaign_id');
        }

        if ($request->campaign_id == -2) {
            $registers = $registers->whereNotNull('campaign_id');
        }

        $registers = $registers->get();


        $register_times = $this->getRegisterTimes($registers);

        if ($request->type >= 0) {

            $register_times = array_filter($register_times, function ($register_time) use ($request) {
                if ($request->type > 2) {
                    return $register_time['times'] > 2;
                } else {
                    return $register_time['times'] == $request->type;
                }
            });

        }

        usort($register_times, function ($a, $b) {
            return $b['times'] - $a['times'];
        });

        $user_ids = array_map(function ($register_time) {
            return $register_time['user_id'];
        }, $register_times);

        $ids_ordered = implode(',', $user_ids);

        $users = User::whereIn('id', $user_ids)->orderByRaw(DB::raw("FIELD(id, $ids_ordered)"))->paginate($limit);

        $data = ['users' => $users->map(function ($user) use ($register_times) {
            foreach ($register_times as $register_time) {
                if ($user->id == $register_time['user_id']) {
                    $result = $this->userRepository->student($user);
                    $courses = $user->registers()->where('registers.status', 1)->join("classes", "registers.class_id", "=", "classes.id")
                        ->join("courses", "courses.id", "=", "classes.course_id")
                        ->select('courses.*')->orderBy('created_at')->distinct()->get();

                    $result['courses'] = $this->courseRepository->courses($courses);
                    $result['register_times'] = $register_time['times'];
                    return $result;
                }
            }
        })];

        return $this->respondWithPagination($users, $data);
    }


}
