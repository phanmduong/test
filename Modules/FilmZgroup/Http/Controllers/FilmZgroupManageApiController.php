<?php

namespace Modules\FilmZgroup\Http\Controllers;

use App\CodeType;
use App\CommentLike;
use App\DiscountCode;
use App\Film;
use App\Film_Blog;
use App\Film_User;
use App\FilmSession;
use App\FilmSessionRegister;
use App\FilmSessionRegisterSeat;
use App\FilmUser;
use App\Http\Controllers\ManageApiController;
use App\Room;
use App\Seat;
use App\SeatBookingHistory;
use App\SeatType;
use App\SessionPrice;
use App\SessionSeat;
use App\User;
use Aws\History;
use Carbon\Carbon;
use DateInterval;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class FilmZgroupManageApiController extends ManageApiController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function __construct()
    {
        parent::__construct();
    }


    public function addFilm(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'avatar_url' => 'required|max:255',
            'director' => 'required|max:255',
            'cast' => 'required|max:255',
            'running_time' => 'required|max:255',
            'country' => 'required|max:255',
            'language' => 'required|max:255',
            'film_genre' => 'required|max:255',
            'summary' => 'required',
            'cover_url' => 'required',
            'images_url' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->respondErrorWithStatus('Ban phai nhap du thong tin');
        }

        $film = new Film();
        $film->name = $request->name;
        $film->avatar_url = $request->avatar_url;
        $film->trailer_url = $request->trailer_url;
        $film->director = $request->director;
        $film->cast = $request->cast;
        $film->running_time = $request->running_time;
        $film->release_date = $request->release_date;
        $film->country = $request->country;
        $film->language = $request->language;
        $film->film_genre = $request->film_genre;
        $film->summary = $request->summary;
        $film->film_status = 0;
        $film->film_rated = ($request->film_rated) ? $request->film_rated : "P";
        $film->rate = $request->rate;
        $film->cover_url = $request->cover_url;
        $film->images_url = $request->images_url;
        $film->is_favorite = 0;
        $film->save();

        return $this->respondSuccess('add thanh cong');
    }


    public function updateFilm(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'avatar_url' => 'required|max:255',
            'director' => 'required|max:255',
            'cast' => 'required|max:255',
            'running_time' => 'required|max:255',
            'country' => 'required|max:255',
            'language' => 'required|max:255',
            'film_genre' => 'required|max:255',
            'summary' => 'required',
            'cover_url' => 'required',
            'images_url' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->respondErrorWithStatus('Ban phai nhap du thong tin');
        }

        $film = Film::find($id);
        $film->name = $request->name;
        $film->avatar_url = $request->avatar_url;
        $film->trailer_url = $request->trailer_url;
        $film->director = $request->director;
        $film->cast = $request->cast;
        $film->running_time = $request->running_time;
        $film->release_date = $request->release_date;
        $film->country = $request->country;
        $film->language = $request->language;
        $film->film_genre = $request->film_genre;
        $film->summary = $request->summary;
        $film->film_status = $request->film_status;
        $film->film_rated = $request->film_rated;
        $film->rate = $request->rate;
        $film->cover_url = $request->cover_url;
        $film->images_url = $request->images_url;
        $film->is_favorite = $request->is_favorite;

        $film->save();

        return $this->respondSuccess('update thanh cong');
    }

    public function deleteFilm(Request $request, $id)
    {
        $film = Film::find($id);
        if ($sessions = $film->film_sessions()->get()) {
            foreach ($sessions as $session) {
                $session->delete();
            }
        }

        $film->delete();

        return $this->respondSuccess('xoa thanh cong');
    }

    public function addSession(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'start_date' => 'required',
            'start_time' => 'required',
            'film_quality' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->respondErrorWithStatus('Ban phai nhap du thong tin');
        }

        $session = new FilmSession();
        $session->film_id = $request->film_id;
        $session->room_id = $request->room_id;
        $session->start_date = $request->start_date;
        $session->start_time = $request->start_time;
        $session->film_quality = $request->film_quality;
        $session->save();
        $room = Room::where('id', $session->room_id)->first();
        $this->groupSeatColors($session->room_id);
        if (!$room) return $this->respondErrorWithStatus('Phong khong ton tai');
        $seats = json_decode($request->seats);
        foreach ($seats as $s) {
            $ss_price_new = new SessionPrice();
            $ss_price_new->session_id = $session->id;
            $seatTypeIdNew = SeatType::where([['room_id', $request->room_id], ['color', $s->color]])->first()->id;
            $ss_price_new->seat_type_id = $seatTypeIdNew;
            $ss_price_new->price = $s->price;
            $ss_price_new->save();
        }
        $session_seats = $room->seats;
        foreach ($session_seats as $s_s) {
            $session_seat = new SessionSeat();
            $session_seat->session_id = $session->id;
            $session_seat->seat_id = $s_s->id;
            $session_seat->seat_status = 0;
            $session_seat->save();
        }

        return $this->respondSuccess('Tao suat chieu thanh cong');
    }

    public function groupSeatColors($roomId)
    {
        $seats = Seat::where('room_id', $roomId)->orderBy('color')->groupBy('color')->get();
        foreach ($seats as $s) {
            $s_type = SeatType::where([['room_id', $roomId], ['color', $s->color]])->first();
            if ($s_type) continue;
            $s_type_new = new SeatType();
            $s_type_new->room_id = $roomId;
            $s_type_new->color = $s->color;
            $s_type_new->type = "";
            $s_type_new->save();
        }
    }

    public function updateSession(Request $request, $id)
    {
        $session = FilmSession::find($id);
        $validator = Validator::make($request->all(), [
            'start_date' => 'required',
            'start_time' => 'required',
            'film_quality' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->respondErrorWithStatus('Ban phai nhap du thong tin');
        }
        $ss_seat = SessionSeat::where('session_id', $id);
        if ($ss_seat->where('seat_status', '!=', 0)->first()) return $this->respondErrorWithStatus('Có người đã/đang đặt vé, không thể xóa.');

        $session->film_id = $request->film_id;
        $session->room_id = $request->room_id;
        $session->start_date = $request->start_date;
        $session->start_time = $request->start_time;
        $session->film_quality = $request->film_quality;
        $session->save();
        $seats = json_decode($request->seats);
        foreach ($seats as $s) {
            $ss_price = SessionPrice::where([['session_id', $id], ['seat_type_id', SeatType::where([['room_id', $request->room_id], ['color', $s->color]])->first()->id]])->first();
            if ($ss_price) {
                $ss_price->price = $s->price;
                $ss_price->save();
            } else {
                $ss_price_new = new SessionPrice();
                $ss_price_new->session_id = $id;
                $ss_price_new->seat_type_id = SeatType::where([['room_id', $request->room_id], ['color', $s->color]])->first()->id;
                $ss_price_new->price = $s->price;
                $ss_price_new->save();
            }

        }
        return $this->respondSuccess('Cap nhat thanh cong');
    }

    public function deleteSession(Request $request, $id)
    {
        $session = FilmSession::find($id);
        if (!$session) return $this->respondErrorWithStatus('Session khong ton tai');
        $ss_seat = SessionSeat::where('session_id', $id);
        if ($ss_seat->where('seat_status', '!=', 0)->first()) return $this->respondErrorWithStatus('Có người đã/đang đặt vé, không thể xóa.');
        $ss_seat = $ss_seat->get();
        foreach ($ss_seat as $s) {
            $s->delete();
        }
        $session->delete();
        $ss_prices = SessionPrice::where('session_id', $id);
        foreach ($ss_prices as $ss_price) {
            $ss_price->delete();
        }

        return $this->respondSuccess('Xoa thanh cong');
    }

    public function changeSeatStatus(Request $request, $session_id)
    {
        $seat = SessionSeat::where([['session_id', '=', $session_id], ['seat_id', '=', $request->seat_id]])->first();
        $seat->seat_status = $request->seat_status;
        $seat->save();

        return $this->respondSuccess('doi trang thai ghe thanh cong');
    }

    public function changeFilmInfo(Request $request, $id)
    {
        $film = Film::find($id);
        if ($request->film_status || $request->film_status == 0) {
            $film->film_status = $request->film_status;
        }
        if ($request->is_favorite || $request->is_favorite == 0) {
            $film->is_favorite = $request->is_favorite;
        }

        $film->save();

        return $this->respondSuccess('Doi thong tin thanh cong');
    }

    //generate Code
    function generateRandomString($length)
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function generateCodes(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'length' => 'required',
            'value' => 'required',
            'number' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->respondErrorWithStatus('Ban phai nhap du thong tin');
        }
        $code_type = new CodeType();
        $code_type->name = $request->name;
        $code_type->description = $request->description;
        $code_type->length = $request->length;
        $code_type->value = $request->value;
        $code_type->number = $request->number;
        $code_type->start_date = $request->start_date;
        $code_type->end_date = $request->end_date;
        $code_type->save();
        for ($i = 0; $i < $request->number; $i++) {
            $code = new DiscountCode();
            $code->code = $this->generateRandomString($request->length);
            $code->code_type_id = $code_type->id;
            $code->status = 0;
            $code->save();
        }
        return $this->respondSuccess('Tao code thanh cong');
    }

    public function getCodes(Request $request)
    {
        $description = $request->description;
        $value = $request->value;
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $status = $request->status;
        $code_type_id = $request->code_type_id;
        $code_types = CodeType::orderBy('created_at', 'desc');
        $limit = $request->limit;
//        ::join('code_types','code_types.id','=','codes.code_type_id')->select('codes.*');
        if ($description) {
            $code_types = $code_types->where('description', 'LIKE', '%' . trim($description) . '%');
        }
        if ($value) {
            $code_types = $code_types->where('value', $value);
        }
        if ($start_date) {
            $code_types = $code_types->where('start_date', $start_date);
        }
        if ($end_date) {
            $code_types = $code_types->where('end_date', $end_date);
        }
        if ($code_type_id) {
            $code_types = $code_types->where('id', $code_type_id);
        }

        if ($limit == -1 or !$limit) {
            $code_types = $code_types->get();
            $data = $code_types->map(function ($code_type) use ($status) {
                $data['id'] = $code_type->id;
                $data['name'] = $code_type->name;
                $data['description'] = $code_type->description;
                $data['value'] = $code_type->value;
                $data['length'] = $code_type->length;
                $data['start_date'] = $code_type->start_date;
                $data['end_date'] = $code_type->end_date;
                $data['number'] = $code_type->number;
                $detail_codes = DiscountCode::join('code_types', 'code_types.id', '=', 'codes.code_type_id')->select('codes.*')->where('codes.code_type_id', $code_type->id);
                if ($status != null) {
                    $detail_codes = $detail_codes->where('codes.status', $status);
                }
                $detail_codes = $detail_codes->get();
                $data['codes'] = $detail_codes->map(function ($c) {
                    $data['code'] = $c->code;
                    $data['status'] = $c->status;
                    return $data;
                });
                return $data;
            });
            return $data;
        } else {
            $code_types = $code_types->paginate($limit);
            return $this->respondWithPagination($code_types, [
                'codes' => $code_types->map(function ($code_type) use ($status) {
                    $data['id'] = $code_type->id;
                    $data['name'] = $code_type->name;
                    $data['description'] = $code_type->description;
                    $data['value'] = $code_type->value;
                    $data['length'] = $code_type->length;
                    $data['start_date'] = $code_type->start_date;
                    $data['end_date'] = $code_type->end_date;
                    $data['number'] = $code_type->number;
                    $detail_codes = DiscountCode::join('code_types', 'code_types.id', '=', 'codes.code_type_id')->select('codes.*')->where('codes.code_type_id', $code_type->id);
                    if ($status != null) {
                        $detail_codes = $detail_codes->where('codes.status', $status);
                    }
                    $detail_codes = $detail_codes->get();
                    $data['codes'] = $detail_codes->map(function ($c) {
                        $data['code'] = $c->code;
                        $data['status'] = $c->status;
                        return $data;
                    });
                    return $data;
                })
            ]);
        }

    }

    public function updateCode(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'length' => 'required',
            'value' => 'required',
            'number' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->respondErrorWithStatus('Ban phai nhap du thong tin');
        }
        $code_type = CodeType::find($id);
        if (!$code_type) return $this->respondErrorWithStatus('id khong ton tai');
        $codes = DiscountCode::where('code_type_id', $id)->get();
        foreach ($codes as $code) {
            if ($code->status != 0) {
                return $this->respondErrorWithStatus('Code da duoc su dung, khong the thay doi cac thuoc tinh.');
            }
        }
        if ($code_type->number != $request->number || $code_type->length != $request->length) {
            foreach ($codes as $code) {
                $code->delete();
            }
            for ($i = 0; $i < $request->number; $i++) {
                $code = new DiscountCode();
                $code->code = $this->generateRandomString($request->length);
                $code->code_type_id = $id;
                $code->status = 0;
                $code->save();
            }
        }
        $code_type->name = $request->name;
        $code_type->description = $request->description;
        $code_type->length = $request->length;
        $code_type->value = $request->value;
        $code_type->number = $request->number;
        $code_type->start_date = $request->start_date;
        $code_type->end_date = $request->end_date;
        $code_type->save();
        return $this->respondSuccess('Cap nhat code thanh cong');
    }

    public function deleteCode($id)
    {
        $code_type = CodeType::find($id);
        if (!$code_type) return $this->respondErrorWithStatus('id khong ton tai');
        $codes = DiscountCode::where('code_type_id', $id)->get();
        foreach ($codes as $code) {
            $code->delete();
        }
        $code_type->delete();
    }

    //book offline
    public function bookSeats(Request $request)
    {
        if (!$request->email) {
            if (!$request->phone) return $this->respondErrorWithStatus('Chua nhap email va sdt');
            $check_phone = FilmUser::where('phone', $request->phone)->first();
            if (!$check_phone) return $this->respondErrorWithStatus('Sdt chua duoc dang ky');
            return $check_phone;
        }
        $check = FilmUser::where('email', $request->email)->first();
        if ($check) {
            $check->name = ($request->name) ? $request->name : $check->name;
            if ($request->phone) {
                $check_phone = FilmUser::where([['phone', $request->phone], ['email', '!=', $request->email]])->first();
                if ($check_phone) return $this->respondErrorWithStatus('Sdt da ton tai');
            }
            $check->phone = ($request->phone) ? $request->phone : $check->phone;
            $check->save();
            $user = $check;
        } elseif (!$request->name && !$request->phone) {
            return $this->respondErrorWithStatus('Chua nhap ten va sdt');
        } else {
            $new_user = new FilmUser();
            $new_user->name = $request->name;
            if ($request->phone) {
                $check_phone = FilmUser::where([['phone', $request->phone], ['email', '!=', $request->email]])->first();
                if ($check_phone) return $this->respondErrorWithStatus('Sdt da ton tai');
            }
            $new_user->phone = $request->phone;
            $new_user->email = $request->email;
            $y = Carbon::today()->format('y');
            $new_user->account_code = 'LD';
            $new_user->save();
            $new_user->account_code = 'LD' . $y . $new_user->id;
            $new_user->save();
            $user = $new_user;
        }

        $register = new FilmSessionRegister();
        $register->user_id = $user->id;
        $register->film_session_id = $request->session_id;
        $register->save();
        $seats = json_decode($request->seats);
        foreach ($seats as $seat) {
            $check_seat = SessionSeat::where([['seat_id', $seat], ['session_id', $request->session_id]])->first();
            if (!$check_seat) continue;
            if ($check_seat->seat_status != 0) {
                return $this->respondErrorWithStatus('Ghe id ' . $seat . ' khong kha dung. Reload.');
            }
        }
        $number_share = count($seats);
        foreach ($seats as $seat) {
            $ori_seat = SessionSeat::where([['seat_id', $seat], ['session_id', $request->session_id]])->first();
            if (($ori_seat) && $ori_seat->seat_status != 0) {
                return $this->respondErrorWithStatus('Ghe id ' . $seat . ' khong kha dung. Reload');
            } else {
                $s = new FilmSessionRegisterSeat();
                $s->seat_id = $seat;
                $s->film_session_register_id = $register->id;
                $s->seat_status = 1;
                $s->save();
                if (!$ori_seat) {
                    $ori_seat = new SessionSeat();
                    $ori_seat->seat_status = 3;
                    $ori_seat->seat_id = $seat;
                    $ori_seat->session_id = $request->session_id;
                    $ori_seat->save();
                } else {
                    $ori_seat->seat_status = 3;
                    $ori_seat->save();
                }

                $code = ($request->code) ? $request->code : '';
                $this->addSeatBookingHistory($s, $code, $number_share, 'offline',$request->staff_id);
            }
        }
        $register->status = 3;
        $register->save();
        return $this->respondSuccess('Book ghe thanh cong');
    }

    function addSeatBookingHistory(FilmSessionRegisterSeat $seat, $code, $number_share, $payment_method, $staff_id)
    {
        $register = FilmSessionRegister::where('id', $seat->film_session_register_id)->first();
        $record = new SeatBookingHistory();
        $record->user_id = $register->user_id;
        $record->session_id = $register->film_session_id;
        $record->seat_id = $seat->seat_id;
        $record->register_id = $register->id;
        $record->code = $code;
        if ($code) {
            $cc = DiscountCode::where('code', $code)->first();
            $cc->status = 1;
            $cc->save();
        }
        $record->number_share = $number_share;
        $record->payment_method = $payment_method;
        if($staff_id) {
            $record->staff_id = $staff_id;
        }
        $record->save();
        $session = FilmSession::find($register->film_session_id);
        $film = $session->film;
        $now = Carbon::now();
        $record->order_code = 'LD' . $film->id . $now->format('m') . $now->format('y') . $register->id;
        $record->save();
    }

    public function getUserInfo(Request $request)
    {


        /*$now = Carbon::now();
        $month = $now->format('m');
        dd($now->format('m') . $now->format('y'));
        $user = FilmUser::find($id);
        $data['name'] = $user->name;
        $data['phone'] = $user->phone;
        $data['email'] = $user->email;
        //sum money
        $registers_sessionSeats = FilmSessionRegister::join('film_session_register_seats', 'film_session_register_seats.film_session_register_id', '=', 'film_session_registers.id')
            ->join('session_seats', 'session_seats.seat_id', '=', 'film_session_register_seats.seat_id')
            ->join('seats', 'seats.id', '=', 'session_seats.seat_id')->join('seat_types', 'seat_types.type', '=', 'seats.type')
            ->join('session_prices', 'session_prices.seat_type_id', '=', 'seat_types.id');
//        $ss = FilmSessionRegister::where('user_id', $id)->where('film_session_registers.status', 3);
        dd($registers_sessionSeats->get());
        $seat_prices = $registers_sessionSeats->select('session_prices.*')->get();
        dd($seat_prices);*/
//        foreach($registers as $register)
//        {
//            $reg_seats = FilmSessionRegisterSeat::where('register_id',$register->id)->get();
//            foreach($reg_seats as $reg_seat)
//            {
//
//            }
//        }
    }


    public function getSeatBookingHistories(Request $request)
    {
        $histories = SeatBookingHistory::join('film_users', 'film_users.id', '=', 'seat_booking_histories.user_id')
            ->join('film_sessions', 'film_sessions.id', '=', 'seat_booking_histories.session_id');
        $film_name = $request->film_name;
        $roomId = $request->roomId;
        $time = $request->time;
        $id = $request->id;
        $user_id = $request->user_id;
        $session_id = $request->session_id;
        $limit = $request->limit;
        $search = $request->search;
        $payment_method = $request->payment_method;
        if ($search) {
            $histories = $histories->where('film_users.name', 'LIKE', '%' . trim($search) . '%')
                ->orwhere('film_users.phone', 'LIKE', '%' . trim($search) . '%')
                ->orwhere('film_users.email', 'LIKE', '%' . trim($search) . '%');
        }
        if ($id) {
            $histories = $histories->where('seat_booking_histories.id', '=', $id);
        }
        if ($film_name) {
            $histories = $histories->join('films', 'films.id', '=', 'film_sessions.film_id')
                ->where('films.name', 'LIKE', '%' . trim($film_name) . '%');
        }
        if ($roomId) {
            $histories = $histories->where('film_sessions.room_id', 'LIKE', $roomId);
        }
        //session start_date
        if ($time) {
            $histories = $histories->where('film_sessions.start_date', 'LIKE', '%' . trim($time) . '%');
        }
        if ($user_id) {
            $histories = $histories->where('seat_booking_histories.user_id', $user_id);
        }
        if ($session_id) {
            $histories =$histories->where('film_sessions.id',$session_id);
        }
        if ($payment_method) {
            $histories = $histories->where('seat_booking_histories.payment_method', $payment_method);
        }
        $histories = $histories->orderBy('seat_booking_histories.created_at', 'desc')->select("seat_booking_histories.*")->groupBy('order_code');
        if ($limit == -1 or !$limit) {
            $histories = $histories->get();
            $data = $histories->map(function ($history) {
//                $data['id'] = $history->id;
                $user = FilmUser::where('id', $history->user_id)->first();
                $data['user_name'] = $user->name;
                $data['user_phone'] = $user->phone;
                $data['user_email'] = $user->email;
                $ss = FilmSession::where('id', $history->session_id)->first();
                $data['film_name'] = $ss->film->name;
                $data['room_name'] = $ss->room->name;
                $data['base_name'] = $ss->room->base->name;
                $data['session_time'] = $ss->start_time;
                $data['session_date'] = $ss->start_date;
                $total_price = 0;
                $data['seat_name'] = "";
                $hts = SeatBookingHistory::where('order_code',$history->order_code)->get();
                $cnt = 0;
                foreach($hts as $ht) {
                    $seat = Seat::find($ht->seat_id);
                    $data['seat_name'] .= $seat->name . ",";
                    if($cnt<count($hts) - 1) {
                        $data['seat_name'] .=  " - ";
                    }
                    $seat_type = SeatType::where([['type', $seat->type], ['room_id', $ss->room->id]])->first();
                    $price = SessionPrice::where([['session_id', $ht->session_id], ['seat_type_id', $seat_type->id]])->first()->price;
                    $total_price += (int)$price;
                }
                $data['payment_method'] = $history->payment_method;
//
                $staff = DB::table('users')->where('id',$history->staff_id)->first();
                $data['staff_name'] = ($staff) ? $staff->name : "";

                //price
//                $seat = Seat::where('id', $history->seat_id)->first();
//            dd($seat_type->id);
//                dd(SessionPrice::where([['session_id', $history->session_id], ['seat_type_id', $seat_type->id]])->first());
                $data['code'] = $history->code;
                $data['register_id'] = $history->register_id;
                $cc = DiscountCode::where('code', $history->code)->first();
                $code_subtract = 0;
                if ($cc) {
                    $code_type = CodeType::where('id', $cc->code_type_id)->first();
                    $data['code_name'] = $code_type->name;
                    $data['code_info'] = $code_type->description;
                    $code_subtract = (int)$code_type->value;
                }
//                $number_share = ($history->number_share) ? (int)$history->number_share : 1;
                $data['order_code'] = $history->order_code;
                $data['price'] = $total_price - $code_subtract;
                $data['time'] = Carbon::createFromFormat('Y-m-d H:i:s', $history->created_at)->format('Y-m-d H:i');
                return $data;
            });
            return $data;
        } else {
            $histories = $histories->paginate($limit);
            return $this->respondWithPagination($histories, [
                'histories' => $histories->map(function ($history) {
                    $user = FilmUser::where('id', $history->user_id)->first();
                    $data['user_name'] = $user->name;
                    $data['user_phone'] = $user->phone;
                    $data['user_email'] = $user->email;
                    $ss = FilmSession::where('id', $history->session_id)->first();
                    $data['film_name'] = $ss->film->name;
                    $data['room_name'] = $ss->room->name;
                    $data['base_name'] = $ss->room->base->name;
                    $data['session_time'] = $ss->start_time;
                    $data['session_date'] = $ss->start_date;
                    $total_price = 0;
                    $data['seat_name'] = "";
                    $hts = SeatBookingHistory::where('order_code',$history->order_code)->get();
                    $cnt = 0;
                    foreach($hts as $ht) {
                        $seat = Seat::find($ht->seat_id);
                        $data['seat_name'] .= $seat->name ;
                        if($cnt<count($hts) - 1) {
                            $data['seat_name'] .=  " - ";
                        }
                        $seat_type = SeatType::where([['type', $seat->type], ['room_id', $ss->room->id]])->first();
                        $price = SessionPrice::where([['session_id', $ht->session_id], ['seat_type_id', $seat_type->id]])->first()->price;
                        $total_price += (int)$price;
                        $cnt++;
                    }
                    $data['payment_method'] = $history->payment_method;

                    $staff = DB::table('users')->where('id',$history->staff_id)->first();
                    $data['staff_name'] = ($staff) ? $staff->name : "";

                    //price
//                $seat = Seat::where('id', $history->seat_id)->first();
//            dd($seat_type->id);
//                dd(SessionPrice::where([['session_id', $history->session_id], ['seat_type_id', $seat_type->id]])->first());
                    $data['code'] = $history->code;
                    $data['register_id'] = $history->register_id;
                    $cc = DiscountCode::where('code', $history->code)->first();
                    $code_subtract = 0;
                    if ($cc) {
                        $code_type = CodeType::where('id', $cc->code_type_id)->first();
                        $data['code_name'] = $code_type->name;;
                        $data['code_info'] = $code_type->description;
                        $code_subtract = (int)$code_type->value;
                    }
//                $number_share = ($history->number_share) ? (int)$history->number_share : 1;
                    $data['order_code'] = $history->order_code;
                    $data['price'] = $total_price - $code_subtract;
                    $data['time'] = Carbon::createFromFormat('Y-m-d H:i:s', $history->created_at)->format('Y-m-d H:i');
                    return $data;
                })
            ]);
        }
    }

//    public function changeBlogStatus(Request $request, $id)
//    {
//        $blog = Film::find($id);
//        if ($request->status) {
//            $blog->status = $request->status;
//        }
//        $blog->save();
//
//        return $this->respondSuccess('Doi trang thai thanh cong');
//    }
//
//    public function addBlog(Request $request)
//    {
//        $validator = Validator::make($request->all(), [
//            'name' => 'required|max:255',
//            'avatar_url' => 'required|max:255',
//            'content' => 'required',
//            'status' => 'required',
//        ]);
//        if ($validator->fails()) {
//            return $this->respondErrorWithStatus('Ban phai nhap du thong tin');
//        }
//
//        $blog = new Film_Blog();
//        $blog->name = $request->name;
//        $blog->avatar_url = $request->avatar_url;
//        $blog->content = $request->content;
//        $blog->status = $request->status;
//        $blog->save();
//
//        return $this->respondSuccess('add thanh cong');
//    }
//
//    public function updateBlog(Request $request, $id)
//    {
//        $validator = Validator::make($request->all(), [
//            'name' => 'required|max:255',
//            'avatar_url' => 'required|max:255',
//            'content' => 'required',
//            'status' => 'required',
//        ]);
//        if ($validator->fails()) {
//            return $this->respondErrorWithStatus('Ban phai nhap du thong tin');
//        }
//
//        $blog = new Film_Blog();
//        $blog->name = $request->name;
//        $blog->avatar_url = $request->avatar_url;
//        $blog->content = $request->content;
//        $blog->status = $request->status;
//        $blog->save();
//
//        return $this->respondSuccess('update thanh cong');
//    }
//
//    public function deleteBlog(Request $request, $id)
//    {
//        $blog = Film::find($id);
//        $blog->delete();
//
//        return $this->respondSuccess('xoa thanh cong');
//    }


//    public function addSessionSeat(Request $request)
//    {
//        $seat = new SessionSeat();
//        $seat->session_id = $request->session_id;
//        $seat->seat_id = $request->seat_id;
//        $seat->seat_status = $request->seat_status;
//        $seat->save();
//        return $this->respondSuccess('Them ghe thanh cong');
//    }

    public function addSeat(Request $request)
    {
        $seat = new Seat();
        $seat->room_id = $request->room_id;
        $seat->name = $request->name;
        $seat->x = $request->x;
        $seat->y = $request->y;
        $seat->z = $request->z;
        $seat->color = $request->color;
        $seat->archived = $request->archived;
        $seat->type = SeatType::where('color', $request->color)->first()->type;
        $seat->save();
        return $this->respondSuccess('Them ghe thanh cong');
    }

    public function deleteData($table)
    {
        if ($table == 'codes') {
            $codes = DiscountCode::all();
            $code_types = CodeType::all();
            foreach ($codes as $code) {
                $code->delete();
            }
            foreach ($code_types as $code_type) {
                $code_type->delete();
            }
        }
        if ($table == 'sessions') {
            $sessions = FilmSession::all();
            foreach ($sessions as $session) {
                $session->delete();
            }
        }
        if ($table == 'film_users') {
            $users = FilmUser::all();
            foreach ($users as $user) {
                $user->delete();
            }
        }
        if ($table == 'users') {
            $users = User::all();
            foreach ($users as $user) {
                $user->delete();
            }
        }
        if ($table == 'comment_likes') {
            $wsus = CommentLike::all();
            foreach ($wsus as $wsu) {
                    $wsu->delete();
            }
        }
    }
}
