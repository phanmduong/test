<?php
namespace Modules\User\Http\Controllers;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Repositories\ClassRepository;
use App\Repositories\UserRepository;
use App\Repositories\AttendancesRepository;
use App\Colorme\Transformers\ProgressTransformer;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Repositories\RegisterRepository;
use App\Product;
use Carbon\Carbon;
class UserApiController extends ApiController
{
    protected $classRepository, $progressTransformer, $userRepository, $attendancesRepository,$registerRepository;

    public function __construct(
        ClassRepository $classRepository,
        ProgressTransformer $progressTransformer,
        UserRepository $userRepository,
        AttendancesRepository $attendancesRepository,
        RegisterRepository $registerRepository
    ) {
        parent::__construct();
        $this->classRepository = $classRepository;
        $this->userRepository = $userRepository;
        $this->attendancesRepository = $attendancesRepository;
        $this->progressTransformer = $progressTransformer;
        $this->registerRepository = $registerRepository;
    }

    public function userSchedule(Request $request)
    {
        $user = $this->user;

        $registers = $user->registers()->where('status', 1)->get();

        return $registers->map(function ($register) {
            $class = $register->studyClass;
            $data = $this->classRepository->get_class($class);
            $data['edit_status'] = $this->classRepository->edit_status($this->user);
            $data['is_delete_class'] = $this->classRepository->is_delete($this->user, $class);
            $data['is_duplicate'] = $this->classRepository->is_duplicate($this->user);
            return $data;
        });
    }

    public function editUserProfile(Request $request)
    {
        $user = $this->user;
        $user->avatar_url = $request->avatar_url;
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->university = $request->university;
        $user->work = $request->work;
        $user->dob = $request->dob; //YYYY-mm-dd
        $user->save();
        return $this->respondSuccessWithStatus('Sửa thành công');
    }

    public function userProfile(Request $request)
    {
        $user = $this->user;
        if ($user == null)
            return $this->respondErrorWithStatus('Error');

        $registers = $user->registers()
            ->where('status', 1)->whereExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('classes')
                    ->whereRaw('classes.id = registers.class_id')
                    ->where('name', 'like', '%.%');
            })->orderBy('created_at', 'desc')->get();
        $data = $user->transform();

        $data['progress'] = $this->progressTransformer->transformCollection($registers);
        $data['registers'] = $registers->map(function ($register) {
            $data = $this->registerRepository->register($register);
            $data['student'] = $this->userRepository->student($register->user);
            $data['total_attendances'] = $this->attendancesRepository->get_total_attendances($register);
            $data['attendances'] = $this->attendancesRepository->get_attendances($register);
            return $data;
        });
        return $this->respondSuccessWithStatus($data);
    }

    public function timeCal($time)
    {
        $diff = abs(strtotime($time) - strtotime(Carbon::now()->toDateTimeString()));
        $diff /= 60;
        if ($diff < 60) {
            return floor($diff) . ' phút trước';
        }
        $diff /= 60;
        if ($diff < 24) {
            return floor($diff) . ' giờ trước';
        }
        $diff /= 24;
        if ($diff <= 30) {
            return floor($diff) . ' ngày trước';
        }
        return date('d-m-Y', strtotime($time));
    }

    public function userProducts($userId, Request $request)
    {
        $limit = $request->limit ? $request->limit : 6;
        $blogs = Product::where('status', 1)
            ->where('title', 'like', "%$request->search%");

        if ($request->tag)
            $blogs = $blogs->where('tags', 'like', "%$request->tag%");
        if ($request->author_id)
            $blogs = $blogs->where('author_id', $userId);
        if ($request->category_id)
            $blogs = $blogs->where('category_id', $request->category_id);
        $blogs = $blogs->orderBy('created_at', 'desc')->paginate($limit);

        $topTags = DB::select("SELECT
                                    SUBSTRING_INDEX(SUBSTRING_INDEX(products.tags, ',', tag_numbers.id), ',', -1) tag,
                                count(SUBSTRING_INDEX(SUBSTRING_INDEX(products.tags, ',', tag_numbers.id), ',', -1)) sum_tag
                                FROM
                                tag_numbers INNER JOIN products
                                ON products.kind='blog' AND CHAR_LENGTH(products.tags)
                                    -CHAR_LENGTH(REPLACE(products.tags, ',', ''))>=tag_numbers.id-1 
                                WHERE (SUBSTRING_INDEX(SUBSTRING_INDEX(products.tags, ',', tag_numbers.id), ',', -1) <> '' || SUBSTRING_INDEX(SUBSTRING_INDEX(products.tags, ',', tag_numbers.id), ',', -1) <> NULL)
                                GROUP BY tag 
                                ORDER BY sum_tag DESC
                                LIMIT 5");

        return $this->respondWithPagination($blogs, [
            'blogs' => $blogs->map(function ($blog) {
                $data = $blog->blogTransform();
                $data['time'] = $this->timeCal(date($blog->created_at));
                return $data;
            }),
            'top_tags' => $topTags
        ]);
    }
}