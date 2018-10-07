<?php

namespace Modules\FilmZgroup\Http\Controllers;

use App\CodeType;
use App\DiscountCode;
use App\FilmSessionRegister;
use App\FilmSessionRegisterSeat;
use App\FilmUser;
use App\SeatType;
use App\SessionPrice;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;
use App\Lesson;
use Carbon\Carbon;


class FilmZgroupSendingMailController extends Controller
{
    public function user_info($id)
    {
        $user = FilmUser::find($id);
        $data = [
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone
        ];
        Mail::send('emails.confirm_register_filmzgroup', $data, function ($m) use ($user) {
            $m->from('ticket@ledahlia.vn', 'Ledahlia');
            $subject = "ĐĂNG KÝ THÀNH CÔNG";
            $m->to($user->email, $user->name)->subject($subject);
        });
        return "OK";
    }

    public function test() {
        $data = [
            'name' => 'ss',
            'email' => 'ss',
            'phone' => 'ss'
        ];
        Mail::send('test', $data,function ($m) {
            $m->from('ticket@ledahlia.vn', 'Ledahlia');
            $subject = "TEST THÀNH CÔNG";
            $m->to("tien98qb@gmail.com", "Tz")->subject($subject);
        });
        return "OK";
    }
    public function book_info($resId, Request $request)
    {
        $register = FilmSessionRegister::find($resId);
        $user = $register->user;
        $session = $register->film_session;
        $film = $session->film;
        $code = ($request->code) ? ($request->code) : "";
        $now = Carbon::now();
        $order_code = 'LD' . $film->id . $now->format('m') . $now->format('y') . $register->id;
        $first_price = 0;
        $seats = FilmSessionRegisterSeat::where([['film_session_register_id', $register->id], ['seat_status', 1]])->get();
        foreach ($seats as $res_seat) {
            $seat = \App\Seat::find($res_seat->seat_id);
            $seat_type = SeatType::where([['type', $seat->type], ['room_id', $session->room->id]])->first();
            $price = SessionPrice::where([['session_id', $session->id], ['seat_type_id', $seat_type->id]])->first()->price;
            $price = (int)$price;
            $first_price += $price;
        }

        $cc = DiscountCode::where('code', $code)->first();
        $code_subtract = 0;
        if ($cc) {
            $code_type = CodeType::where('id', $cc->code_type_id)->first();
            $code_subtract = (int)$code_type->value;
        }

        $total_price = ($first_price - $code_subtract >= 0) ? $first_price - $code_subtract : 0;

        $data = [
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'session' => $session,
            'seats' => $seats,
            'code' => $code,
            'payment' => $request->payment,
            'order_code' => $order_code,
            'first_price' => $first_price,
            'total_price' => $total_price,
        ];
        Mail::send('emails.confirm_booking_success_filmzgroup', $data, function ($m) use ($user, $order_code) {
            $m->from('ticket@ledahlia.vn', 'Ledahlia');
            $subject = "Ledahlia Cinema - " . $order_code;
            $m->to($user->email, $user->name)->subject($subject);
        });
        return "OK";
    }

    public function message_contact(Request $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'known_from' => $request->known_from,
            'message_str' => $request->message_str
        ];
        Mail::send('emails.message_contact_to_me_filmzgroup', $data, function ($m) use ($request) {
            $m->from('ticket@ledahlia.vn', 'Ledahlia Contact');
            $subject = "Message from Ledahlia.vn";
            $m->to("ledahlia@zgroup.vn", $request->name)->subject($subject);
        });
        return view('filmzgroup::contact_us');
    }
}