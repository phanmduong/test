<?php

namespace Modules\FilmZgroup\Http\Controllers;

use App\CategoryProduct;
use App\CodeType;
use App\Comment;
use App\DiscountCode;
use App\Film;
use App\FilmSession;
use App\FilmSessionRegister;
use App\FilmSessionRegisterSeat;
use App\Product;
use App\ProductTag;
use App\Seat;
use App\SeatBookingHistory;
use App\SeatType;
use App\SessionPrice;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class FilmZgroupController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function reloadFilmStatus(Film $film)
    {
        if (count($film->film_sessions) > 0) {
            $sessions = $film->film_sessions()->where('start_date', '>=', date('Y-m-d'))->get();
            if (count($sessions) == 0 && $film->film_status == 1) {
                $film->film_status = 0;
                $film->save();
            } elseif (count($sessions) > 0) {
                $film->film_status = 1;
                $film->save();
            }
        } elseif ($film->film_status == 1) {
            $film->film_status = 0;
            $film->save();
        }
    }

    public function index()
    {
        $filmsR = Film::all();
        foreach ($filmsR as $filmR) {
            $this->reloadFilmStatus($filmR);
        }
        $today = Carbon::today();
        $day = Carbon::today();
        $todaySessions = FilmSession::where('start_date', '=', date('Y-m-d'))->orderBy('start_time')->groupBy('film_id')->get();
        $after1DaySessions = FilmSession::where('start_date', '=', Carbon::createFromFormat('Y-m-d H:i:s', $today->addDays(1)->toDateString() . ' 00:00:00'))->orderBy('start_time')->groupBy('film_id')->get();
        $after2DaySessions = FilmSession::where('start_date', '=', Carbon::createFromFormat('Y-m-d H:i:s', $today->addDays(1)->toDateString() . ' 00:00:00'))->orderBy('start_time')->groupBy('film_id')->get();
        $after3DaySessions = FilmSession::where('start_date', '=', Carbon::createFromFormat('Y-m-d H:i:s', $today->addDays(1)->toDateString() . ' 00:00:00'))->orderBy('start_time')->groupBy('film_id')->get();
        $after4DaySessions = FilmSession::where('start_date', '=', Carbon::createFromFormat('Y-m-d H:i:s', $today->addDays(1)->toDateString() . ' 00:00:00'))->orderBy('start_time')->groupBy('film_id')->get();
        $after5DaySessions = FilmSession::where('start_date', '=', Carbon::createFromFormat('Y-m-d H:i:s', $today->addDays(1)->toDateString() . ' 00:00:00'))->orderBy('start_time')->groupBy('film_id')->get();
        $after6DaySessions = FilmSession::where('start_date', '=', Carbon::createFromFormat('Y-m-d H:i:s', $today->addDays(1)->toDateString() . ' 00:00:00'))->orderBy('start_time')->groupBy('film_id')->get();

        $filmsComing = Film::where('film_status', 2)->orderBy('release_date')->get();
        $favoriteFilms = Film::where('is_favorite', true)->get();

        $sessionsShowing = FilmSession::where('start_date', '>=', date('Y-m-d'))->orderBy('start_date', 'desc')->get();
        $filmsShowing = Film::where('film_status', 1)->get();
        $this->data = [
            'filmsComing' => $filmsComing,
            'filmsShowing' => $filmsShowing,
            'sessionsShowing' => $sessionsShowing,
            'day' => $day,
            "todaySessions" => $todaySessions,
            'after1DaySessions' => $after1DaySessions,
            'after2DaySessions' => $after2DaySessions,
            'after3DaySessions' => $after3DaySessions,
            'after4DaySessions' => $after4DaySessions,
            'after5DaySessions' => $after5DaySessions,
            'after6DaySessions' => $after6DaySessions,
            'favoriteFilms' => $favoriteFilms,
            'limit_summary' => 400
        ];
        $this->data['current_menu_item'] = "film";

        return view('filmzgroup::index', $this->data);
    }

    public function film($id)
    {
        $film = Film::find($id);

        $sessionsShowing = $film->film_sessions()->where('start_date', '>=', date('Y-m-d'))->orderBy('start_time', 'desc')->get();
        $today = Carbon::today();
        $day = Carbon::today();
        $todaySessions = $film->film_sessions()->where('start_date', '=', date('Y-m-d'))->get();
        $after1DaySessions = $film->film_sessions()->where('start_date', '=', Carbon::createFromFormat('Y-m-d H:i:s', $today->addDays(1)->toDateString() . ' 00:00:00'))->orderBy('start_time', 'desc')->get();
        $after2DaySessions = $film->film_sessions()->where('start_date', '=', Carbon::createFromFormat('Y-m-d H:i:s', $today->addDays(1)->toDateString() . ' 00:00:00'))->orderBy('start_time', 'desc')->get();
        $after3DaySessions = $film->film_sessions()->where('start_date', '=', Carbon::createFromFormat('Y-m-d H:i:s', $today->addDays(1)->toDateString() . ' 00:00:00'))->orderBy('start_time', 'desc')->get();
        $after4DaySessions = $film->film_sessions()->where('start_date', '=', Carbon::createFromFormat('Y-m-d H:i:s', $today->addDays(1)->toDateString() . ' 00:00:00'))->orderBy('start_time', 'desc')->get();
        $after5DaySessions = $film->film_sessions()->where('start_date', '=', Carbon::createFromFormat('Y-m-d H:i:s', $today->addDays(1)->toDateString() . ' 00:00:00'))->orderBy('start_time', 'desc')->get();
        $after6DaySessions = $film->film_sessions()->where('start_date', '=', Carbon::createFromFormat('Y-m-d H:i:s', $today->addDays(1)->toDateString() . ' 00:00:00'))->orderBy('start_time', 'desc')->get();
        $film->images_url = str_replace("[", "", $film->images_url);
        $film->images_url = str_replace("]", "", $film->images_url);
        $images_url = $this->multiStringToArray($film->images_url);
        $favoriteFilms = Film::where('is_favorite', true)->get();

        $this->data = [
            'film' => $film,
            'sessionsShowing' => $sessionsShowing,
            'day' => $day,
            "todaySessions" => $todaySessions,
            'after1DaySessions' => $after1DaySessions,
            'after2DaySessions' => $after2DaySessions,
            'after3DaySessions' => $after3DaySessions,
            'after4DaySessions' => $after4DaySessions,
            'after5DaySessions' => $after5DaySessions,
            'after6DaySessions' => $after6DaySessions,
            'images_url' => $images_url,
            'favoriteFilms' => $favoriteFilms,
        ];
        $this->data['current_menu_item'] = "film";

        return view('filmzgroup::film', $this->data);
    }

    public function multiStringToArray($multi_string)
    {
        $strings = (String)$multi_string;
        $strings = str_replace(" ,", ",", $strings);
        $strings = str_replace(", ", ",", $strings);
        $string_array = explode(",", $strings);

        return $string_array;
    }

    public function films(Request $request)
    {
        $f_title = "Tất cả phim";
        $title = "";
        $sm_title = "";
        $classComing = "";
        $classShowing = "";
        $films = Film::orderBy('created_at', 'desc');
        $category = $request->category;
        $limit = $request->limit ? $request->limit : 6;
        if ($category == "coming-soon") {
            $films = $films->where('film_status', 2);
            $sm_title = "Tất cả phim";
            $f_title = "Phim sắp chiếu";
            $title = "SẮP CHIẾU";
            $classComing = "active";
        } elseif ($category == "showing") {
            $films = $films->where('film_status', 1);
            $sm_title = "Tất cả phim";
            $f_title = "Phim đang chiếu";
            $title = "ĐANG CHIẾU";
            $classShowing = "active";
        }

        $search = $request->search;
        if ($search) {
            $films = $films->where('name', 'like', '%' . $search . '%');
            $sm_title = "Kết quả tìm kiếm cho ";
            $f_title = "Tìm kiếm phim";
            $title = $search;
        }
        $display = '';


        $films = $films->paginate($limit);

        if ($request->page == null) {
            $page_id = 2;
        } else {
            $page_id = $request->page + 1;
        }
        if ($films->lastPage() == $page_id - 1) {
            $display = 'display:none';
        }

        $this->data['films'] = $films;
        $this->data['page_id'] = $page_id;
        $this->data['display'] = $display;
        $this->data['title'] = $title;
        $this->data['classShowing'] = $classShowing;
        $this->data['classComing'] = $classComing;
        $this->data['sm_title'] = $sm_title;
        $this->data['f_title'] = $f_title;
        $this->data['search'] = $search;
        $this->data['total_pages'] = ceil($films->total() / $films->perPage());
        $this->data['current_page'] = $films->currentPage();
//        $this->data['current_menu_item'] = "film";
        return view("filmzgroup::films", $this->data);
    }

//    public function filmsCategory (Request $request, $category) {
//        $title = "";
//        $films = Film::orderBy('created_at','desc');
//
//        if($category == "coming-soon") {
//            $films = $films->where('film_status',2);
//            $title = "Sắp chiếu";
//        } elseif ($category == "showing") {
//            $films = $films->where('film_status',1);
//            $title = "Đang chiếu";
//        }
//
//        $films = $films->paginate(3);
//        $search = $request->search;
//        if ($search) {
//            $films = $films->where('name', 'like', '%' . $search . '%');
//        }
//        $display = '';
//        if ($request->page == null) {
//            $page_id = 2;
//        } else {
//            $page_id = $request->page + 1;
//        }
//        if ($films->lastPage() == $page_id - 1) {
//            $display = 'display:none';
//        }
//
//
//        $this->data['films'] = $films;
//        $this->data['title'] = $title;
//        $this->data['page_id'] = $page_id;
//        $this->data['display'] = $display;
//        $this->data['search'] = $search;
//        $this->data['total_pages'] = ceil($films->total() / $films->perPage());
//        $this->data['current_page'] = $films->currentPage();
//        $this->data['current_menu_item'] = "film";
//
//        return view('filmzgroup::films_by_category',$this->data);
//    }

    public function timeCal($time)
    {
//        $diff = abs(strtotime($time) - strtotime(Carbon::now()->toDateTimeString()));
//        $diff /= 60;
//        if ($diff < 60) {
//            return floor($diff) . ' phút trước';
//        }
//        $diff /= 60;
//        if ($diff < 24) {
//            return floor($diff) . ' giờ trước';
//        }
//        $diff /= 24;
//        if ($diff <= 30) {
//            return floor($diff) . ' ngày trước';
//        }
//        return date('d/m/Y', strtotime($time));
    }

    public function reloadBlogTags()
    {
        $blogs = Product::where('kind', 'blog')->where('status', 1)->get();
        $blogs->map(function ($blog) {
            $data = $blog->blogDetailTransform();
            $data['tags'] = $this->multiStringToArray($data['tags']);
            if ($data['tags']) {
                foreach ($data['tags'] as $tag) {
                    if ($tag != " " && $tag != "") {
                        if (Tag::where('name', $tag)->first()) {
                            $tag_id = Tag::where('name', $tag)->first()->id;
                            if ((ProductTag::where([['product_id', $blog->id], ['tag_id', $tag_id]]))->first()) continue;
                            $blog_tag = new ProductTag();
                            $blog_tag->product_id = $blog->id;
                            $blog_tag->tag_id = $tag_id;
                            $blog_tag->save();
                        } else {
                            $new_tag = new Tag();
                            $new_tag->name = $tag;
                            $new_tag->save();
                            $blog_tag = new ProductTag();
                            $blog_tag->product_id = $blog->id;
                            $blog_tag->tag_id = $new_tag->id;
                            $blog_tag->save();
                        }
                    }
                }
            }
        });
    }

    public function blogs(Request $request)
    {
        $this->reloadBlogTags();
        $title = 'Tin tức phim';
        $sm_title = 'Tất cả';
        $archive_time = $request->archive_time;
        $search = $request->search;
        $type = $request->category_id;
        $limit = $request->limit ? $request->limit : 6;
        $tag = $request->tag;
        $category = $request->category;
        $kind = 'blog';
//        dd($type);
        $type_name = CategoryProduct::find($type);
        $type_name = $type_name ? $type_name->name : '';
//        dd($search);
        $blogs = Product::where('kind', $kind)->where('status', 1);

        if ($search) {
            $blogs = $blogs->where('title', 'like', '%' . $search . '%');
            $sm_title = "Kết quả tìm kiếm cho ";
            $title = $search;
        }

        if ($category) {
            $category_id = CategoryProduct::where('name', $category)->first()->id;
            $blogs = $blogs->where('category_id', $category_id);
            $sm_title = $category;
        }

        if ($type) {
            $blogs = $blogs->where('category_id', $type);
        }
        //undone
        if ($archive_time) {
            $blogs = $blogs->where('created_at', $archive_time);
            $sm_title = $archive_time;
//            {{substr($archive_time,0,10)}}
        }
        if ($tag) {
            $tag_id = Tag::where('name', $tag)->first();
            if ($tag_id) {
                $blogs = $blogs->join('products_tags', 'products_tags.product_id', '=', 'products.id')->where('products_tags.tag_id', '=', $tag_id->id)
                    ->select('products.*');
            } else {
                $blogs = $blogs->where('id', 0);
            }
//            $blogs = $blogs->whereHas('tags', function ($query) use ($tag) {
//                $query->where('name', $tag);
//            });
            $sm_title = "Tags";
            $title = $tag;
        }

        $blogs = $blogs->orderBy('created_at', 'desc')->paginate($limit);
        $display = '';
        if ($request->page == null) {
            $page_id = 2;
        } else {
            $page_id = $request->page + 1;
        }
        if ($blogs->lastPage() == $page_id - 1) {
            $display = 'display:none';
        }

//        $archive_times = $blogs->groupBy('created_at) ->format('y-m-d');
        $categories = CategoryProduct::orderBy('name')->get();
        $this->data['total_pages'] = ceil($blogs->total() / $blogs->perPage());
        $this->data['current_page'] = $blogs->currentPage();

        $blogs = $blogs->map(function ($blog) {
            $data = $blog->blogDetailTransform();
            $data['tags'] = $this->multiStringToArray($data['tags']);
            $data['time'] = $this->timeCal(date($blog->created_at));
            $data['comments_count'] = Comment::where('product_id', $blog->id)->count();
            return $data;
        });

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

        $topNewBlogs = Product::where('kind', $kind)->where('status', 1)->orderBy('created_at', 'desc')->limit(3)->get();
        $topViewBlogs = Product::where('kind', $kind)->where('status', 1)->orderBy('views', 'desc')->limit(3)->get();


        $this->data['title'] = $title;
        $this->data['sm_title'] = $sm_title;
        $this->data['blogs'] = $blogs;
        $this->data['page_id'] = $page_id;
        $this->data['display'] = $blogs;
        $this->data['search'] = $search;
//        $this->data['current_menu_item'] = "blog";
        $this->data['tag'] = $tag;
        $this->data['topTags'] = $topTags;
        $this->data['topViewBlogs'] = $topViewBlogs;
        $this->data['topNewBlogs'] = $topNewBlogs;
        $this->data['link'] = 'blogs';
        $this->data['categories'] = $categories;
        $this->data['category_id'] = $request->category_id;

        return view('filmzgroup::blogs', $this->data);
    }

    public function post($post_id)
    {
        $title = 'Tin tức phim';
        $kind = 'blog';
        $post = Product::find($post_id);
        $post->author;
        $post->views += 1;
        $post->save();
        $post->category;
//        $post->url = config('app.protocol') . $post->url;
        if (trim($post->author->avatar_url) === '') {
            $post->author->avatar_url = config('app.protocol') . 'd2xbg5ewmrmfml.cloudfront.net/web/no-avatar.png';
        } else {
            $post->author->avatar_url = config('app.protocol') . $post->author->avatar_url;
        }
//        $posts_related = Product::where('id', '<>', $post_id)->inRandomOrder()->limit(3)->get();
//        $posts_related = $posts_related->map(function ($p) {
//            $p->url = config('app.protocol') . $p->url;
//            return $p;
//        });
        $post->comments = $post->comments->map(function ($comment) {
            $comment->commenter->avatar_url = config('app.protocol') . $comment->commenter->avatar_url;
            return $comment;
        });
        $topNewBlogs = Product::where('kind', $kind)->where('status', 1)->orderBy('created_at', 'desc')->limit(3)->get();
        $topViewBlogs = Product::where('kind', $kind)->where('status', 1)->orderBy('views', 'desc')->limit(3)->get();
        $this->data['post'] = $post;
        $this->data['topNewBlogs'] = $topNewBlogs;
        $this->data['topViewBlogs'] = $topViewBlogs;
        $this->data['link'] = 'blogs';
        $this->data['title'] = $title;


        return view('filmzgroup::post', $this->data);
    }

    public function contact(Request $request)
    {
        return view('filmzgroup::contact_us');
    }

    public function session($id)
    {
        $today = Carbon::today();
        $session = FilmSession::where('id', $id)->first();
        $film = $session->film;
        $this->data['session'] = $session;
        $this->data['film'] = $film;
        $this->data['todayy'] = $today;

        return view('filmzgroup::session', $this->data);
    }

    public function sessionTimeOut($id)
    {
        $session = FilmSession::find($id)->first();
        $film = $session->film;
        $this->data['session'] = $session;
        $this->data['film'] = $film;

        return view('filmzgroup::session_time_out', $this->data);
    }

    public function FAQ($slug)
    {
        switch ($slug) {
            case "phuong-thuc-thanh-toan":
                return view('filmzgroup::FAQ.payment_method');
            case "cau-hoi-thuong-gap":
                return view('filmzgroup::FAQ.FAQs');
            case "chinh-sach-bao-mat":
                return view('filmzgroup::FAQ.security_policy');
            case "nang-hang-thanh-vien":
                return view('filmzgroup::FAQ.member_upgrade');
            case "quy-dinh-su-dung":
                return view('filmzgroup::FAQ.using_regulation');
            case "gioi-thieu":
                return view('filmzgroup::FAQ.introduce');
            case "huong-dan-mua-hang":
                return view('filmzgroup::FAQ.booking_guide');
            default:
                return view('filmzgroup::contact_us');
        }
    }

    public function vnpay_index(Request $request)
    {
        $checked_seats = Seat::join('film_session_register_seats', 'film_session_register_seats.seat_id', '=', 'seats.id')
            ->where([['film_session_register_seats.film_session_register_id', $request->register_id], ['film_session_register_seats.seat_status', 1]])
            ->select('seats.*')->get();

        $register = FilmSessionRegister::where('id', $request->register_id)->first();
        $session = FilmSession::find($register->film_session_id);
        $film = $session->film;
        $now = Carbon::now();
        $sum_price = 0;
        foreach ($checked_seats as $seat) {
            $seat_type = SeatType::where([['type', $seat->type], ['room_id', $session->room->id]])->first();
//            dd($seat_type->id);
//                dd(SessionPrice::where([['session_id', $history->session_id], ['seat_type_id', $seat_type->id]])->first());
            $price = SessionPrice::where([['session_id', $session->id], ['seat_type_id', $seat_type->id]])->first()->price;
            $price = (int)$price;
            $sum_price += $price;
        }
        $order_code = 'LD' . $film->id . $now->format('m') . $now->format('y');
        $cc = DiscountCode::where('code', $request->code)->first();
        $code_subtract = 0;
        $code_length = 0;
        if ($cc) {
            $code_type = CodeType::where('id', $cc->code_type_id)->first();
            $code_length = $code_type->length;
            $code_subtract = (int)$code_type->value;
            if ((int)$code_length < 10) {
                $order_code = $order_code . $request->code . '0' . $code_length;
            } else {
                $order_code = $order_code . $request->code . $code_length;
            }
        } else {
            $order_code = $order_code . '00';
        }
        $order_code = $order_code . $request->register_id;

        $data = [
            'order_code' => $order_code,
            'price' => $sum_price - $code_subtract
        ];
        return view('filmzgroup::vnpay_index', $data);
    }

    public function vnpay_create_payment()
    {

        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
        /**
         * Description of vnpay_ajax
         *
         * @author xonv
         */
        require_once(public_path("plugins/vnpay_config.php"));

        $vnp_TxnRef = $_POST['order_id']; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = $_POST['order_desc'];
        $vnp_OrderType = $_POST['order_type'];
        $vnp_Amount = $_POST['amount'] * 100;
        $vnp_Locale = $_POST['language'];
        $vnp_BankCode = $_POST['bank_code'];
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=MD5&vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
        , 'message' => 'success'
        , 'data' => $vnp_Url);
        echo json_encode($returnData);
//        dd($returnData['data']);

//        return view('filmzgroup::vnpay_create_payment',$returnData);
        return redirect('' . $returnData['data']);
    }

    public function vnpay_ipn()
    {


        /*
         * IPN URL: Ghi nhận kết quả thanh toán từ VNPAY
         * Các bước thực hiện:
         * Kiểm tra checksum
         * Tìm giao dịch trong database
         * Kiểm tra tình trạng của giao dịch trước khi cập nhật
         * Cập nhật kết quả vào Database
         * Trả kết quả ghi nhận lại cho VNPAY
         */

        require_once(public_path("plugins/vnpay_config.php"));
        $inputData = array();
        $returnData = array();
        $data = $_REQUEST;
        foreach ($data as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }

        $vnp_SecureHash = $inputData['vnp_SecureHash'];
        unset($inputData['vnp_SecureHashType']);
        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . $key . "=" . $value;
            } else {
                $hashData = $hashData . $key . "=" . $value;
                $i = 1;
            }
        }
        $vnpTranId = $inputData['vnp_TransactionNo']; //Mã giao dịch tại VNPAY
        $vnp_BankCode = $inputData['vnp_BankCode']; //Ngân hàng thanh toán
        $secureHash = md5($vnp_HashSecret . $hashData);
        $Status = 0;
        $orderId = $inputData['vnp_TxnRef'];


        include("PublicFilmApiController.php");
        $PublicFilmApiController = new PublicFilmApiController();


        $register_id = substr($_GET['vnp_TxnRef'], -4);
//        $register = \App\FilmSessionRegister::find($register_id);
//        $session_id = $register->film_session_id;

//        $str_len = (int)strlen($_GET['vnp_TxnRef']);
//        $code_order = "";
        $code = "";
        $code_length = (int)substr($_GET['vnp_TxnRef'], -6, 2);
        $start_index = -6 - $code_length;
        if ($code_length) {
            $code = substr($_GET['vnp_TxnRef'], $start_index, $code_length);
        }
//        $code_order = substr($_GET['vnp_TxnRef'], 0, $str_len - 6 - $code_length) . $register_id;

        try {
            //Check Orderid
            //Kiểm tra checksum của dữ liệu
            if ($secureHash == $vnp_SecureHash) {
                //Lấy thông tin đơn hàng lưu trong Database và kiểm tra trạng thái của đơn hàng, mã đơn hàng là: $orderId
                //Việc kiểm tra trạng thái của đơn hàng giúp hệ thống không xử lý trùng lặp, xử lý nhiều lần một giao dịch
                //Giả sử: $order = mysqli_fetch_assoc($result);
                $order = FilmSessionRegister::find($register_id);
                if ($order != NULL) {
                    if ($order->status == 2) {
                        if ($inputData['vnp_ResponseCode'] == '00') {
                            $Status = 1;
                            //Cài đặt Code cập nhật kết quả thanh toán, tình trạng đơn hàng vào DB
                            $req_stt = new \Illuminate\Http\Request();
                            $req_stt->status = 3;
                            $req_stt->code = $code;
                            $req_stt->trusted = true;
                            $PublicFilmApiController->changeFilmSessionRegisterStatus($req_stt, $register_id);


                            //Trả kết quả về cho VNPAY: Website TMĐT ghi nhận yêu cầu thành công
                            $returnData['RspCode'] = '00';
                            $returnData['Message'] = 'Confirm Success';
                        } else {
                            $Status = 2;
                            $req_stt = new \Illuminate\Http\Request();
                            $req_stt->status = 0;
                            $req_stt->code = $code;
                            $PublicFilmApiController->changeFilmSessionRegisterStatus($req_stt, $register_id);
                            $returnData['RspCode'] = $inputData['vnp_ResponseCode'];
                            $returnData['Message'] = 'Error';
                        }
                    } else {
                        $returnData['RspCode'] = '02';
                        $returnData['Message'] = 'Order already confirmed';
                    }
                } else {
                    $returnData['RspCode'] = '01';
                    $returnData['Message'] = 'Order not found';
                }
            } else {
                $returnData['RspCode'] = '97';
                $returnData['Message'] = 'Chu ky khong hop le';
            }
        } catch (Exception $e) {
            $returnData['RspCode'] = '99';
            $returnData['Message'] = 'Unknow error';
        }
//Trả lại VNPAY theo định dạng JSON
        echo json_encode($returnData);

    }

    public function vnpay_return()
    {
        include("FilmZgroupSendingMailController.php");
        $FilmZgroupSendingMailController = new FilmZgroupSendingMailController();

        $data = [
            'FilmZgroupSendingMailController' => $FilmZgroupSendingMailController,
        ];

        return view('filmzgroup::vnpay_return',$data);
    }


}