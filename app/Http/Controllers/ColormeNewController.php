<?php

namespace App\Http\Controllers;

use App\Base;
use App\Category;
use App\CategoryProduct;
use App\Colorme\Transformers\CourseTransformer;
use App\Colorme\Transformers\ProductTransformer;
use App\Course;
use App\Gen;
use App\Lesson;
use App\Order;
use App\Repositories\CourseRepository;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\CourseCategory;
use App\Product;
use Illuminate\Support\Facades\DB;
use App\Comment;
use App\Services\EmailService;
use Carbon\Carbon;
use App\ProductSubscription;
use Illuminate\Support\Facades\Auth;
use App\Register;
use App\Repositories\ClassRepository;
use App\StudyClass;
use App\Attendance;
use App\ClassLesson;
use App\UserCarer;


class ColormeNewController extends CrawlController
{
    protected $productTransformer;
    protected $courseTransformer;
    protected $courseRepository;
    protected $emailService;
    protected $classRepository;

    public function __construct(ClassRepository $classRepository, EmailService $emailService, ProductTransformer $productTransformer, CourseTransformer $courseTransformer, CourseRepository $courseRepository)
    {
        parent::__construct();
        $this->productTransformer = $productTransformer;
        $this->courseTransformer = $courseTransformer;
        $this->courseRepository = $courseRepository;
        $this->emailService = $emailService;
        $this->classRepository = $classRepository;
        $bases = Base::orderBy('created_at')->get();
        $courses = Course::where('status', '1')->orderBy('created_at', 'asc')->get();
        $this->data['courses'] = $courses;
        $this->data['paid_courses'] = $this->courseRepository->paid_courses($this->user);
        $this->data['bases'] = $bases;
    }

    public function home($saler_id = null, $campaign_id = null)
    {
        $current_gen = Gen::getCurrentGen();
        $categories = CourseCategory::all();
        $categories = $categories->filter(function ($category) {
            $courses = $category->courses;
            $courses_count = $courses->reduce(function ($count, $course) {
                return $count + $course->status;
            }, 0);
            return $courses_count > 0;
        });

        $this->data['saler_id'] = $saler_id;
        $this->data['campaign_id'] = $campaign_id;
        $this->data['gen_cover'] = $current_gen->cover_url;
        $this->data['saler'] = User::find($saler_id);
        $this->data['categories'] = $categories;
        return view('colorme_new.home', $this->data);
    }

    public function course($course_id, $saler_id = null, $campaign_id = null)
    {
        $course = Course::find($course_id);
        if ($course == null) {
            $courses = Course::all();
            foreach ($courses as $key) {
                if (convert_vi_to_en($key->name) === $course_id) {
                    $course = $key;
                }
            }
        }
        $course_id = $course->id;
        $current_gen = Gen::getCurrentGen();
        $this->data['current_gen_id'] = $current_gen->id;
        $this->data['gen_cover'] = $current_gen->cover_url;
        $this->data['course'] = $course;
        $this->data['course_id'] = $course_id;
        $this->data['bases'] = Base::orderBy('created_at', 'asc')->get()->filter(function ($base) use ($course_id, $current_gen) {
            return $base->classes()->where('course_id', $course_id)->where('gen_id', $current_gen->id)->count() > 0;
        });
        $this->data['saler_id'] = $saler_id;
        $this->data['campaign_id'] = $campaign_id;
        $this->data['pixels'] = $course->coursePixels;
        $this->data['saler'] = User::find($saler_id);
        return view('colorme_new.course', $this->data);
    }

    public function confirmEmailSuccess(Request $request)
    {
        $token = $request->token;
        $name = $request->name;
        $hash = $request->hash;
        $email = $request->email;
        $phone = $request->phone;

        if ($this->user) {
            return redirect('/');
        }

        if (Hash::check($name . $email . $phone . $hash, $token)) {
            $user = User::where('email', $email)->first();

            if ($user == null) {
                $user = new User();
            }

            $user->name = $request->name;
            $user->email = $request->email;
            $user->username = $request->email;
            $user->phone = $phone;
            $user->password = $hash;

            $user->save();
            if ($request->product_id) {
                $subscription = new ProductSubscription();
                $subscription->user_id = $user->id;
                $subscription->product_id = $request->product_id;
                $subscription->save();
            }
            return view('colorme_new.email_verified', $this->data);
        } else {
            return 'Đường link không chính xác';
        }
    }

    public function courseOnline($courseId, $lessonId = null)
    {
        $lesson = Lesson::find($lessonId);

        $course = Course::find($courseId);

        if ($course == null) {
            return view('colorme_new.404.not_found_course', $this->data);
        }

        $this->data['course'] = $course;

        if ($this->user == null || $this->user->registers()->where('course_id', $course->id)->where('status', 1)->first() == null) {
            return view('colorme_new.course_detail', $this->data);
        }

        if ($lesson == null) {
            $term = $course->terms()->orderBy('order')->first();
            if ($term) {
                $lesson = $term->lessons()->orderBy('order')->first();
            }
        }

        if ($lesson == null) {
            return view('colorme_new.404.not_found_lesson', $this->data);
        }

        $lessons = $course->lessons()->get()->map(function ($lesson) {
            return [
                'id' => $lesson->id,
                'name' => $lesson->name
            ];
        });

        $this->data['lesson_selected'] = $lesson;
        $this->data['lessons'] = $lessons;
        $this->data['comments'] = $lesson ? $lesson->comments()->where('parent_id', '0')->orderBy('created_at', 'desc')->get()->map(function ($comment) {
            $data = $comment->transform($this->user);
            $data['child_comments'] = $comment->child_comments()->orderBy('created_at', 'desc')->get()->map(function ($commentChild) {
                $dataComment = $commentChild->transform($this->user);
                return $dataComment;
            });
            return $data;
        }) : [];

        return view('colorme_new.course_online_lesson', $this->data);
    }

    public function profileProcess($username)
    {
        $user = User::where('username', $username)->first();

        if ($user) {
            $user->avatar_url = generate_protocol_url($user->avatar_url);
            $this->data['user_profile'] = $user;
            $courses = $user->registers()->get()->map(function ($register) {
                $data = [
                    'id' => $register->studyClass->course->id,
                    'type_id' => $register->studyClass->course->type_id,
                    'name' => $register->studyClass->course->name,
                    'linkId' => convert_vi_to_en($register->studyClass->course->name),
                    'icon_url' => $register->studyClass->course->icon_url,
                    'duration' => $register->studyClass->course->duration,
                    'description' => $register->studyClass->course->description,
                    'image_url' => $register->studyClass->course->image_url,
                    'first_lesson' => $register->studyClass->course->lessons()->orderBy('order')->first(),
                    'total_lesson' => $register->studyClass->course->lessons()->count(),
                    'total_passed' => $register->studyClass->course->lessons()
                        ->join('class_lesson', 'class_lesson.lesson_id', '=', 'lessons.id')
                        ->where('class_lesson.class_id', $register->studyClass->id)
                        ->whereRaw('date(now()) >= date(class_lesson.time)')->count()
                ];
                return $data;
            });
            $this->data['paid_courses_user'] = $courses;
            return view('colorme_new.profile.process', $this->data);
        }
        return redirect('/');
    }

    public function profileInfo($username)
    {
        $user = User::where('username', $username)->first();
        $user->avatar_url = generate_protocol_url($user->avatar_url);
        $this->data['user_profile'] = $user;
        if ($user) {
            return view('colorme_new.profile.profile_info', $this->data);
        }
        return redirect('/');
    }

    public function profileProject($username)
    {
        $user = User::where('username', $username)->first();
        $user->avatar_url = generate_protocol_url($user->avatar_url);
        $blogs = Product::where('author_id', $user->id)->get();
        $blogs = $blogs->map(function ($blog) {
            $data = $blog->blogTransform();
            $data['time'] = $this->timeCal(date($blog->created_at));
            $data['comments_count'] = Comment::where('product_id', $blog->id)->count();
            return $data;
        });
        $this->data['user_profile'] = $user;
        $this->data['blogs'] = $blogs;
        if ($user) {
            return view('colorme_new.profile.profile_project', $this->data);
        }
        return redirect('/');
    }

    public function profileAttendance($username)
    {
        $user = User::where('username', $username)->first();
        $user->avatar_url = generate_protocol_url($user->avatar_url);
        $this->data['user_profile'] = $user;
        if ($user) {
            return view('colorme_new.profile.profile_attendance', $this->data);
        }
        return redirect('/');
    }

    public function social(Request $request)
    {
        return view('colorme_new.colorme_react', $this->data);
    }

    public function social1(Request $request)
    {
        $limit = $request->limit ? $request->limit : 20;

        $products = Product::where('created_at', '>=', Carbon::today())
            ->orderBy('rating', 'desc')->paginate($limit);

        $this->data['total_pages'] = ceil($products->total() / $products->perPage());
        // $this->data['total_pages'] = 5;
        $this->data['current_page'] = $products->currentPage();

        $products = $products->map(function ($product) {
            $data = $product->personalTransform();
            $data['time'] = $this->timeCal(date($product->created_at));
            $data['comment'] = count(Product::find($product['id'])->comments);
            $data['like'] = count(Product::find($product['id'])->likes);
            return $data;
        });

        // axios called
        if ($request->page) {
            return $products;
        };

        if (Auth::user()) {
            $this->data['user_posts'] = count(Product::where('author_id', Auth::user()->id)->get());
            $this->data['user_views'] = Product::where('author_id', Auth::user()->id)->sum('views');
            $this->data['user_likes'] = Product::join('likes', 'products.id', '=', 'likes.product_id')
                ->where('author_id', Auth::user()->id)
                ->count();
            // dd($this->data['user_views']);
            // $temps = Product::where('author_id', Auth::user()->id)->get();
            // $comments = 0;
            // foreach($temps as $temp){
            //     $comments .= Comment::where('product_id', '=', $temp->id)->count();
            // }
            // $this->data['user_comments'] = $comments;
        }

        $cources = Course::all();

        $this->data['products'] = $products;
        $this->data['cources'] = $cources;
        return view('colorme_new.staff_1day', $this->data);
    }

    public function social7(Request $request)
    {
        $limit = $request->limit ? $request->limit : 20;

        $date = Carbon::today()->subDays(6);
        $products = Product::where('created_at', '>=', $date)
            ->orderBy('rating', 'desc')->paginate($limit);

        $this->data['total_pages'] = ceil($products->total() / $products->perPage());
        // $this->data['total_pages'] = 5;
        $this->data['current_page'] = $products->currentPage();

        $products = $products->map(function ($product) {
            $data = $product->personalTransform();
            $data['time'] = $this->timeCal(date($product->created_at));
            $data['comment'] = count(Product::find($product['id'])->comments);
            $data['like'] = count(Product::find($product['id'])->likes);
            return $data;
        });

        // axios called
        if ($request->page) {
            return $products;
        };

        if (Auth::user()) {
            $this->data['user_posts'] = count(Product::where('author_id', Auth::user()->id)->get());
            $this->data['user_views'] = Product::where('author_id', Auth::user()->id)->sum('views');
            $this->data['user_likes'] = Product::join('likes', 'products.id', '=', 'likes.product_id')
                ->where('author_id', Auth::user()->id)
                ->count();
            // dd($this->data['user_views']);
            // $temps = Product::where('author_id', Auth::user()->id)->get();
            // $comments = 0;
            // foreach($temps as $temp){
            //     $comments .= Comment::where('product_id', '=', $temp->id)->count();
            // }
            // $this->data['user_comments'] = $comments;
        }

        $cources = Course::all();

        $this->data['products'] = $products;
        $this->data['cources'] = $cources;
        return view('colorme_new.staff_7days', $this->data);
    }

    public function social30(Request $request)
    {
        $limit = $request->limit ? $request->limit : 20;
        $date = Carbon::today()->subDays(30);
        $products = Product::where('created_at', '>=', $date)
            ->orderBy('rating', 'desc')->paginate($limit);

        $this->data['total_pages'] = ceil($products->total() / $products->perPage());
        // $this->data['total_pages'] = 5;
        $this->data['current_page'] = $products->currentPage();

        $products = $products->map(function ($product) {
            $data = $product->personalTransform();
            $data['time'] = $this->timeCal(date($product->created_at));
            $data['comment'] = count(Product::find($product['id'])->comments);
            $data['like'] = count(Product::find($product['id'])->likes);
            return $data;
        });

        // axios called
        if ($request->page) {
            return $products;
        };

        if (Auth::user()) {
            $this->data['user_posts'] = count(Product::where('author_id', Auth::user()->id)->get());
            $this->data['user_views'] = Product::where('author_id', Auth::user()->id)->sum('views');
            $this->data['user_likes'] = Product::join('likes', 'products.id', '=', 'likes.product_id')
                ->where('author_id', Auth::user()->id)
                ->count();
            // dd($this->data['user_views']);
            // $temps = Product::where('author_id', Auth::user()->id)->get();
            // $comments = 0;
            // foreach($temps as $temp){
            //     $comments .= Comment::where('product_id', '=', $temp->id)->count();
            // }
            // $this->data['user_comments'] = $comments;
        }

        $cources = Course::all();

        $this->data['products'] = $products;
        $this->data['cources'] = $cources;
        return view('colorme_new.staff_30days', $this->data);
    }

    public function socialnew(Request $request)
    {
        $limit = $request->limit ? $request->limit : 20;
        $products = Product::orderBy('created_at', 'desc')->paginate($limit);

        $this->data['total_pages'] = ceil($products->total() / $products->perPage());
        // $this->data['total_pages'] = 5;
        $this->data['current_page'] = $products->currentPage();

        $products = $products->map(function ($product) {
            $data = $product->personalTransform();
            // dd($data);
            $data['time'] = $this->timeCal(date($product->created_at));
            $data['comment'] = count(Product::find($product['id'])->comments);
            $data['like'] = count(Product::find($product['id'])->likes);
            return $data;
        });

        // axios called
        if ($request->page) {
            return $products;

        };

        if (Auth::user()) {
            // dd(Auth::user()->id);
            // dd(Register::where('money','>',0)->where('user_id',Auth::user()->id)->get());
            $this->data['user_posts'] = count(Product::where('author_id', Auth::user()->id)->get());
            $this->data['user_views'] = Product::where('author_id', Auth::user()->id)->sum('views');
            $this->data['user_likes'] = Product::join('likes', 'products.id', '=', 'likes.product_id')
                ->where('author_id', Auth::user()->id)
                ->count();
            $registers = Register::where('money', '>', 0)
                ->where('user_id', Auth::user()->id)->get();
            // dd($registers);

            // $data_registers = array();
            // foreach($registers as $register){
            //     $class = StudyClass::find($register['class_id']);

            //     $data = $this->classRepository->get_class($class);
            //     $registers = $this->classRepository->get_student($class);
            //     $attendances = $this->classRepository->get_attendances_class($class);

            //     if (isset($data['teacher']))
            //         $data['teacher']['attendances'] = $this->classRepository->attendances_teacher($class);

            //     if (isset($data['teacher_assistant']))
            //         $data['teacher_assistant']['attendances'] = $this->classRepository->attendances_teaching_assistant($class);

            //     if ($registers) {
            //         $data['registers'] = $registers;
            //     }

            //     if ($attendances) {
            //         $data['attendances'] = $attendances;
            //         // dd($register['class_id']);
            //         // dd(Attendance::where('class_lesson_id', $register['class_id'])->get());
            //         // $data['all_attendances'] = Attendance::where('register_id', $register['id'])->count();
            //     }
            //     $data_registers[] = $data;
            // }
            // // dd($data_registers);
            // $this->data['user_registers'] = $data_registers;

        }
        // dd($this->data['user_registers']);
        $cources = Course::all();
        // dd($this->data['user_posts']);
        $this->data['products'] = $products;
        $this->data['cources'] = $cources;
        return view('colorme_new.staff_new', $this->data);
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

    public function queryProducts($kind, $request)
    {
        $limit = $request->limit ? $request->limit : 6;
        $search = $request->search;
        $tag = $request->tag;
        $category = $request->category;

        $blogsData = Product::where('kind', $kind)->where('status', 1)
            ->where('title', 'like', "%$search%")->orderBy('created_at', 'desc');

        if ($tag) {
            $blogsData = $blogsData->where('tags', 'like', "%$tag%");
        }

        if ($category) {
            $blogsData = $blogsData->where('category_id', $category);
        }

        if ($request->page > 1) {
            $blogs = $blogsData;
        } else {
            $topBlogs = $blogsData->first();
            $topBlogs = $topBlogs->blogTransform();
            $topBlogs['time'] = $this->timeCal(date($topBlogs['created_at']));
            $this->data['topBlogs'] = $topBlogs;

            $blogs = $blogsData->where('id', '<>', $topBlogs['id']);
        }

        $topTags = DB::select("SELECT
                                   SUBSTRING_INDEX(SUBSTRING_INDEX(products.tags, ',', tag_numbers.id), ',', -1) tag,
                                  count(SUBSTRING_INDEX(SUBSTRING_INDEX(products.tags, ',', tag_numbers.id), ',', -1)) sum_tag
                                FROM
                                  tag_numbers INNER JOIN products
                                  ON products.kind='$kind' AND CHAR_LENGTH(products.tags)
                                     -CHAR_LENGTH(REPLACE(products.tags, ',', ''))>=tag_numbers.id-1 
                                WHERE (SUBSTRING_INDEX(SUBSTRING_INDEX(products.tags, ',', tag_numbers.id), ',', -1) <> '' || SUBSTRING_INDEX(SUBSTRING_INDEX(products.tags, ',', tag_numbers.id), ',', -1) <> NULL)
                                GROUP BY tag 
                                ORDER BY sum_tag DESC
                                LIMIT 20");

        $blogs = $blogs->paginate($limit);

        $this->data['total_pages'] = ceil($blogs->total() / $blogs->perPage());
        $this->data['current_page'] = $blogs->currentPage();

        $blogs = $blogs->map(function ($blog) {
            $data = $blog->blogTransform();
            $data['time'] = $this->timeCal(date($blog->created_at));
            return $data;
        });

        $topViewBlogs = Product::where('kind', $kind)->where('status', 1)->orderBy('views', 'desc')->limit(10)->get();

        $categories = Product::where('kind', $kind)->where('status', 1)
            ->join('category_products', 'category_products.id', '=', 'products.category_id')
            ->select('category_products.name', 'category_products.id', DB::raw('count(*) as total_blogs'))
            ->orderBy('total_blogs', 'desc')
            ->groupBy('products.category_id')
            ->get();
        $this->data['blogs'] = $blogs;
        $this->data['search'] = $search;
        $this->data['tag'] = $tag;
        $this->data['topTags'] = $topTags;
        $this->data['topViewBlogs'] = $topViewBlogs;
        $this->data['categories'] = $categories;
        $this->data['link'] = $kind == 'blog' ? 'blogs' : ($kind == 'promotion' ? 'khuyen-mai' : 'tai-nguyen');
        return view('colorme_new.blogs', $this->data);
    }

    public function blogs(Request $request)
    {
        return $this->queryProducts('blog', $request);
    }

    public function promotions(Request $request)
    {
        return $this->queryProducts('promotion', $request);
    }

    public function resources(Request $request)
    {
        return $this->queryProducts('resource', $request);
    }

    public function mailViews($views)
    {
        if ($views < 10) {
            return false;
        }
        while ($views != 0) {
            if ($views > 10 && $views % 10 != 0) {
                return false;
            }
            if ($views < 10 && ($views == 1 || $views == 2 || $views == 5)) {
                return true;
            }
            $views /= 10;
        }
    }

    public function blog($slug, Request $request)
    {
        $blog = Product::where('slug', $slug)->first();
        $blog->views += 1;
        $blog->save();
        if ($this->mailViews($blog->views) === true) {
            $this->emailService->send_mail_blog($blog, $blog->author, $blog->views);
        }
        $data = $blog->blogDetailTransform();
        $data['time'] = $this->timeCal(date($blog->created_at));
        $this->data['auth_related_blogs'] = Product::where('id', '<>', $blog->id)->where('kind', $blog->kind)->where('status', 1)->where('author_id', $blog->author_id)
            ->inRandomOrder()->limit(5)->get();
        $this->data['related_blogs'] = Product::where('id', '<>', $blog->id)->where('kind', $blog->kind)->where('status', 1)
            ->inRandomOrder()->limit(5)->get();
        $this->data['blog'] = $data;
        $this->data['course'] = findCourseWithProduct($blog);

        return view('colorme_new.blog', $this->data);
    }

    public function register(Request $request)
    {
        $user = User::where('email', '=', $request->email)->first();
        if ($user == null)
            $user = User::where('username', '=', $request->email)->first();
        $phone = preg_replace('/[^0-9]+/', '', $request->phone);
        if ($user == null) {
            $user = new User;
            $user->password = bcrypt('123456');
            $user->username = $request->email;
            $user->email = $request->email;
            $user->name = $request->name;
            $user->phone = $phone;
        }
        $user->rate = 2;
        $user->how_know = $request->blog_id;
        $user->save();

        $subscription = new ProductSubscription();
        $subscription->user_id = $user->id;
        $subscription->product_id = $request->blog_id;
        $subscription->save();

        $this->emailService->send_mail_welcome($user);
        return [
            'message' => 'success'
        ];
    }

    public function signUpCourse(Request $request)
    {
        $user = User::where('email', '=', $request->email)->first();
        if ($user == null)
            $user = User::where('username', '=', $request->email)->first();
        $phone = preg_replace('/[^0-9]+/', '', $request->phone);
        $course = Course::find($request->course_id);
        if ($user == null) {
            $user = new User;
            $user->password = bcrypt('123456');
            $user->username = $request->email;
            $user->email = $request->email;
            $user->name = $request->name;
            $user->phone = $phone;
        }
        $user->how_know = $course ? $course->name : '';
        $user->rate = 5;
        $user->save();
        if ($request->saler_id) {
            $userCarer = new UserCarer();
            $userCarer->carer_id = $request->saler_id;
            $userCarer->user_id = $user->id;
            $userCarer->assigner_id = 1;
            $userCarer->save();
        }

        $this->emailService->send_mail_welcome($user);
        return [
            'message' => 'success'
        ];
    }

    public function extract(Request $request)
    {
        // dd($kinds);
        // $date = new \DateTime();
        // $formatted_time = $date->format('Y-m-d');

        // $userIds = ProductSubscription::select(DB::raw('distinct user_id'), 'created_at')->get();
        // foreach ($userIds as $userId) {
        //     $user = User::find($userId->user_id);
        //     $day = ceil(abs(strtotime($userId->created_at) - strtotime(Carbon::now()->toDateTimeString())) / (60 * 60 * 24));
        //     $week_count = (int)ceil($day / 7);

        //     $resourceIds = Product::where('kind', 'resource')->where('status', 1)->pluck('id')->toArray();
        //     $resourceCount = count($resourceIds);
        //     $resource = Product::find($resourceIds[$week_count % $resourceCount]);
        //     if ($user && $resource)
        //         if ($user->id == 13620)
        //             $this->emailService->send_mail_resource($resource, $user);
        // }
    }

    public function blogsByCategory($category_name)
    {
        $category = CategoryProduct::where('name', $category_name)->first();
        $blogs = Product::where('category_id', $category->id);
        return $this->queryProducts('blog', $blogs);
    }

}
