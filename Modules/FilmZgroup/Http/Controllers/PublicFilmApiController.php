<?php

namespace Modules\FilmZgroup\Http\Controllers;

use App\CodeType;
use App\CommentLike;
use App\DiscountCode;
use App\Film;
use App\Film_Blog;
use App\FilmSession;
use App\FilmSessionRegister;
use App\FilmSessionRegisterSeat;
use App\FilmUser;
use App\Http\Controllers\NoAuthApiController;
use App\Product;
use App\ProductTag;
use App\Seat;
use App\SeatBookingHistory;
use App\SeatType;
use App\SessionPrice;
use App\SessionSeat;
use App\Tag;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class PublicFilmApiController extends NoAuthApiController
{
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

    public function getFilmsFilter(Request $request)
    {
        $limit = $request->limit;
        $search = $request->search;
        $id = $request->id;
        $status = $request->status;
        $filmsR = Film::orderBy('created_at', 'desc')->get();
        $start_date = $request->start_date;
        $is_showing = $request->is_showing;
        foreach ($filmsR as $film) {
            $this->reloadFilmStatus($film);
        }
        $films = Film::orderBy('name');

        if ($search) {
            $films = $films->where('name', 'LIKE', '%' . trim($search) . '%');
        }
        if ($id) {
            $films = $films->where('id', $id);
        }
        if ($status) {
            $films = $films->where('film_status', $status);
        }
        if ($start_date) {
            $sessions = FilmSession::where('start_date', '=', $start_date);
            $ids = $sessions->groupBy('film_id')->pluck('film_id');
            $films = $films->whereIn('id', $ids);
        }
        if ($is_showing == 1) {
            $sessions = FilmSession::where('start_date', '>=', date('Y-m-d'));
            if ($start_date) {
                $sessions = $sessions->where('start_date', $start_date);
                if($start_date == date('Y-m-d')) {
                    $sessions = $sessions->where('start_time', '>=', date('H:i:s', strtotime("- 600 seconds")));
                }
            }
            $ids = $sessions->groupBy('film_id')->pluck('film_id');
            $films = $films->whereIn('id', $ids);
        }
        if ($limit == -1 or !$limit) {
            $films = $films->get();
            $films = [
                "films" => $films,
            ];

            return $films;
        } else {
            $films = $films->paginate($limit);
            return $this->respondWithPagination($films, ['films' => $films->map(function ($film) {
                return $film;
            })]);
        }
    }


    public function getSessionsFilter(Request $request)
    {
        $search = $request->search;
        $session_id = $request->session_id;
        $room_id = $request->room_id;
        $start_date = $request->start_date;
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $film_id = $request->film_id;
        $limit = $request->limit;
        $sessions = FilmSession::orderBy('start_date', 'desc');
        if ($session_id) {
            $sessions = $sessions->where('id', '=', $session_id);
        }
        if ($room_id) {
            $sessions = $sessions->where('room_id', '=', $room_id);
        }
        if ($film_id) {
            $sessions = $sessions->where('film_id', $film_id);
        }
        if ($search) {
            $sessions = $sessions->whereHas('film', function ($query) use ($search) {
                $query->where('name', 'LIKE', '%' . $search . '%');
            });
        }

        if ($from_date) {
            $sessions = $sessions->where('start_date', '>=', Carbon::createFromFormat('Y-m-d H:i:s', $from_date . ' 00:00:00'));
        }
        if ($to_date) {
            $sessions = $sessions->where('start_date', '<=', Carbon::createFromFormat('Y-m-d H:i:s', $to_date . ' 00:00:00'));
        }
        if ($start_date) {
            $sessions = $sessions->where('start_date', $start_date);
        }

        if ($limit == -1 or !$limit) {
            $sessions = $sessions->get();
            $sessions = [
                'sessions' => $sessions->map(function ($session) {
                    $room = $session->room()->first();
                    $this->groupSeatColors($room->id);
                    $session['room_name'] = $room->name;
                    $seat_types = SeatType::join('seats', 'seats.type', '=', 'seat_types.type')->where('seats.archived', 0)->select('seat_types.*')
                        ->where('seat_types.room_id', $room->id)->groupBy('seat_types.id')->get();
                    $session['seats'] = $seat_types->map(function ($s) use ($session, $room) {
                        $data['color'] = $s->color;
                        $data['type'] = $s->type;
                        if (SessionPrice::where([['session_id', $session->id], ['seat_type_id', SeatType::where([['room_id', $room->id], ['color', $s->color]])->first()->id]])->first()) {
                            $data['price'] = SessionPrice::where([['session_id', $session->id], ['seat_type_id', SeatType::where([['room_id', $room->id], ['color', $s->color]])->first()->id]])->first()->price;
                        } else $data['price'] = "";
                        return $data;
                    });
                    return $session;
                }),

            ];

            return $sessions;
        } else {
            $sessions = $sessions->paginate($limit);
            return $this->respondWithPagination($sessions, [
                'sessions' => $sessions->map(function ($session) {
//                    $session['film'] = $session->film;
                    $room = $session->room()->first();
                    $this->groupSeatColors($room->id);
                    $session['room_name'] = $room->name;
                    $seat_types = SeatType::join('seats', 'seats.type', '=', 'seat_types.type')->select('seat_types.*')
                        ->where([['seats.archived', 0], ['seat_types.room_id', $room->id]])->groupBy('seat_types.type');
                    $session['seats'] = $seat_types->get()->map(function ($s) use ($session, $room) {
                        $s['color'] = $s->color;
                        $s['type'] = $s->type;
                        if (SessionPrice::where([['session_id', $session->id], ['seat_type_id', SeatType::where([['room_id', $room->id], ['color', $s->color]])->first()->id]])->first()) {
                            $s['price'] = SessionPrice::where([['session_id', $session->id], ['seat_type_id', SeatType::where([['room_id', $room->id], ['color', $s->color]])->first()->id]])->first()->price;
                        } else $s['price'] = "";
                        return $s;
                    });
                    return $session;
                })
            ]);
        }
    }

    public function groupSeatColors($roomId)
    {
        $seats = Seat::where('room_id', $roomId)->where('archived', 0)->orderBy('color')->groupBy('color')->get();
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

    public function getSessionsShown(Request $request)
    {
        $showings = FilmSession::where('start_date', '>=', date('Y-m-d') . ' 23:59:59')
            ->orwhere([['start_date', '>=', date('Y-m-d') . ' 00:00:00'], ['start_time', '>=', date('H:i:s', strtotime("- 600 seconds"))]], ['start_time', '<=', date('H:i:s')])
            ->pluck('id');
        $sessions = FilmSession::whereNotIn('id', $showings)->orderBy('start_date', 'desc');
        $search = $request->search;
        $limit = $request->limit;

        if ($search) {
            $sessions = $sessions
                ->join('films','film_sessions.film_id','=','films.id')
                ->where('films.name','LIKE', '%' . $search . '%')
                ->select('film_sessions.*');
        }
        if ($limit == -1 or !$limit) {
            $sessions = $sessions->get();
            $sessions = [
                'sessions' => $sessions->map(function ($session) {
                    $room = $session->room()->first();
                    $this->groupSeatColors($room->id);
                    $session['room_name'] = $room->name;
                    $seat_types = SeatType::join('seats', 'seats.type', '=', 'seat_types.type')->select('seat_types.*')
                        ->where([['seats.archived', 0], ['seat_types.room_id', $room->id]])->groupBy('seat_types.type');
                    $session['seats'] = $seat_types->get()->map(function ($s) use ($session, $room) {
                        $s['color'] = $s->color;
                        $s['type'] = $s->type;
                        if (SessionPrice::where([['session_id', $session->id], ['seat_type_id', SeatType::where([['room_id', $room->id], ['color', $s->color]])->first()->id]])->first()) {
                            $s['price'] = SessionPrice::where([['session_id', $session->id], ['seat_type_id', SeatType::where([['room_id', $room->id], ['color', $s->color]])->first()->id]])->first()->price;
                        } else $s['price'] = "";
                        return $s;
                    });
                    return $session;
                }),

            ];

            return $sessions;
        } else {
            $sessions = $sessions->paginate($limit);
            return $this->respondWithPagination($sessions, [
                'sessions' => $sessions->map(function ($session) {
//                    $session['film'] = $session->film;
                    $room = $session->room()->first();
                    $this->groupSeatColors($room->id);
                    $session['room_name'] = $room->name;
                    $seat_types = SeatType::join('seats', 'seats.type', '=', 'seat_types.type')->select('seat_types.*')
                        ->where([['seats.archived', 0], ['seat_types.room_id', $room->id]])->groupBy('seat_types.type');
                    $session['seats'] = $seat_types->get()->map(function ($s) use ($session, $room) {
                        $s['color'] = $s->color;
                        $s['type'] = $s->type;
                        if (SessionPrice::where([['session_id', $session->id], ['seat_type_id', SeatType::where([['room_id', $room->id], ['color', $s->color]])->first()->id]])->first()) {
                            $s['price'] = SessionPrice::where([['session_id', $session->id], ['seat_type_id', SeatType::where([['room_id', $room->id], ['color', $s->color]])->first()->id]])->first()->price;
                        } else $s['price'] = "";
                        return $s;
                    });
                    return $session;
                })
            ]);
        }

    }

    public function getSessionsNowShowing(Request $request)
    {

        $sessions = FilmSession::orderBy('start_date');
        $sessions = $sessions
            ->where('start_date', '>=', date('Y-m-d', strtotime('+ 1 day')))
            ->orwhere(
                [
                    ['start_date', '=', date('Y-m-d')],
                    ['start_time', '>=', date('H:i:s', strtotime("- 600 seconds"))],
                ]);
        $search = $request->search;
        $limit = $request->limit;
        if ($search) {
            $sessions = $sessions
                ->join('films','film_sessions.film_id','=','films.id')
                ->where('films.name','LIKE', '%' . $search . '%')
                ->select('film_sessions.*');
//            $sessions = $sessions->whereHas('film', function ($query) use ($search) {
//                $query->where('name', 'LIKE', '%' . $search . '%');
//            });
        }

        if ($limit == -1 or !$limit) {
            $sessions = $sessions->get();
            $sessions = [
                'sessions' => $sessions->map(function ($session) {
                    $room = $session->room()->first();
                    $this->groupSeatColors($room->id);
                    $session['room_name'] = $room->name;
                    $seat_types = SeatType::join('seats', 'seats.type', '=', 'seat_types.type')->select('seat_types.*')
                        ->where([['seats.archived', 0], ['seat_types.room_id', $room->id]])->groupBy('seat_types.type');
                    $session['seats'] = $seat_types->get()->map(function ($s) use ($session, $room) {
                        $s['color'] = $s->color;
                        $s['type'] = $s->type;
                        if (SessionPrice::where([['session_id', $session->id], ['seat_type_id', SeatType::where([['room_id', $room->id], ['color', $s->color]])->first()->id]])->first()) {
                            $s['price'] = SessionPrice::where([['session_id', $session->id], ['seat_type_id', SeatType::where([['room_id', $room->id], ['color', $s->color]])->first()->id]])->first()->price;
                        } else $s['price'] = "";
                        return $s;
                    });
                    return $session;
                }),

            ];

            return $sessions;
        } else {
            $sessions = $sessions->paginate($limit);
            return $this->respondWithPagination($sessions, [
                'sessions' => $sessions->map(function ($session) {
//                    $session['film'] = $session->film;
                    $room = $session->room()->first();
                    $this->groupSeatColors($room->id);
                    $session['room_name'] = $room->name;
                    $seat_types = SeatType::join('seats', 'seats.type', '=', 'seat_types.type')->select('seat_types.*')
                        ->where([['seats.archived', 0], ['seat_types.room_id', $room->id]])->groupBy('seat_types.type');
                    $session['seats'] = $seat_types->get()->map(function ($s) use ($session, $room) {
                        $s['color'] = $s->color;
                        $s['type'] = $s->type;
                        if (SessionPrice::where([['session_id', $session->id], ['seat_type_id', SeatType::where([['room_id', $room->id], ['color', $s->color]])->first()->id]])->first()) {
                            $s['price'] = SessionPrice::where([['session_id', $session->id], ['seat_type_id', SeatType::where([['room_id', $room->id], ['color', $s->color]])->first()->id]])->first()->price;
                        } else $s['price'] = "";
                        return $s;
                    });
                    return $session;
                })
            ]);
        }
    }

    public function getFilmSessionSeats($id)
    {
        $session = FilmSession::where('id', $id)->first();
        $seats = $session->seats()->where('archived', 0)->get();
        foreach ($seats as $seat) {
            $ss_seat = SessionSeat::where([['seat_id', $seat->id], ['session_id', $session->id]])->first();
            if ($ss_seat->seat_status == 2) {
                $now = Carbon::now();
                if ($now->diffInSeconds(Carbon::createFromFormat('Y-m-d H:i:s', $ss_seat->updated_at)
                    ) > 600) {
                    $ss_seat->seat_status = 0;
                    $ss_seat->save();
                }
            }
        }
        $data['seats'] = $seats->map(function ($seat) use ($session) {
            $data = $seat->getData();
            $data['status'] = $seat->pivot->seat_status;
            $s_type = SeatType::where([['room_id', $seat->room_id], ['color', $seat->color]])->first();
            $data['type'] = $s_type->type;
            if ((SessionPrice::where([['session_id', $session->id], ['seat_type_id', $s_type->id]])->first())) {
                $data['price'] = SessionPrice::where([['session_id', $session->id], ['seat_type_id', $s_type->id]])->first()->price;
            } else
                $data['price'] = null;
            return $data;
        });
        $room = $session->room;
        $room->getRoomDetail();
        $data['width'] = $session->room->width;
        $data['height'] = $session->room->height;
        $data['room_layout_url'] = $session->room->room_layout_url;

        return $data;
    }

    public function multiStringToArray($multi_string)
    {
        $strings = (String)$multi_string;
        $strings = str_replace(" ,", ",", $strings);
        $strings = str_replace(", ", ",", $strings);
        $string_array = explode(",", $strings);

        return $string_array;
    }


    public function addUser(Request $request)
    {
        $updated_phone = false;
        $updated_name = false;
        if (!$request->email) {
            if (!$request->phone) return $this->respondErrorWithStatus('Chua nhap email va sdt');
            $check_phone = FilmUser::where('phone', $request->phone)->first();
            if (!$check_phone) return $this->respondErrorWithStatus('Sdt chua duoc dang ky');
            if ($request->name && ($request->name != $check_phone->name)) {
                $check_phone->name = $request->name;
                $check_phone->save();
                $updated_phone = true;
            }
            $data = [
                'user' => $check_phone,
                'updated_name' => $updated_name,
                'updated_phone' => $updated_phone
            ];
            return $this->respondSuccessWithStatus($data);
        }
        $check = FilmUser::where('email', $request->email)->first();
        if ($check) {
            if ($request->name && ($request->name != $check->name)) {
                $check->name = $request->name;
                $updated_name = true;
            }
            if ($request->phone) {
                $check_phone = FilmUser::where([['phone', $request->phone], ['email', '!=', $request->email]])->first();
                if ($check_phone) return $this->respondErrorWithStatus('Sdt va email khong khop');
                if ($request->phone != $check->phone) {
                    $check->phone = $request->phone;
                    $updated_phone = true;
                }
            }
            $check->save();
            $data = [
                'user' => $check,
                'updated_name' => $updated_name,
                'updated_phone' => $updated_phone
            ];
            return $this->respondSuccessWithStatus($data);
        } elseif (!$request->name || !$request->phone) {
            return $this->respondErrorWithStatus('Chua nhap du ten va sdt');
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
            $data = [
                'user' => $new_user,
                'updated_name' => $updated_name,
                'updated_phone' => $updated_phone
            ];
            return $this->respondSuccessWithStatus($data);
        }
    }

    public function getUsers(Request $request)
    {
        $limit = $request->limit;
        $search = $request->search;
        $like_search = $request->like_search;
        $users = FilmUser::orderBy('created_at', 'desc');
        if ($search) {
            $users = $users->where('phone', '=', $search)
                ->orwhere('email', '=', $search);
        }
        if ($like_search) {
            $users = $users->where('phone', 'LIKE', '%' . trim($like_search) . '%')
                ->orwhere('email', 'LIKE', '%' . trim($like_search) . '%')
                ->orwhere('name', 'LIKE', '%' . trim($like_search) . '%');
        }

        if ($limit == -1 or !$limit) {
            $users = $users->get();
            $users = [
                "users" => $users,
            ];

            return $users;
        } else {
            $users = $users->paginate($limit);
            return $this->respondWithPagination($users, ['users' => $users->map(function ($user) {
                return $user;
            })]);
        }
    }

    public function addFilmSessionRegister(Request $request)
    {
        $register = new FilmSessionRegister();
        $register->user_id = $request->user_id;
        $register->film_session_id = $request->film_session_id;
        $register->save();

        // reload seat status
        $session = $register->film_session;
        $seats = $session->seats()->where('archived', 0)->get();
        foreach ($seats as $seat) {
            $ss_seat = SessionSeat::where([['seat_id', $seat->id], ['session_id', $session->id]])->first();
            if ($ss_seat->seat_status == 2) {
                $now = Carbon::now();
                if ($now->diffInSeconds(Carbon::createFromFormat('Y-m-d H:i:s', $ss_seat->updated_at)
                    ) > 600) {
                    $ss_seat->seat_status = 0;
                    $ss_seat->save();
                }
            }
        }

        return $this->respondSuccessWithStatus($register);
    }

    //khi doi register status thì tất cả ghế tương ứng cũng đổi trạng thái
    public function changeFilmSessionRegisterStatus(Request $request, $id)
    {
        $register = FilmSessionRegister::find($id);
        $reg_seats = Seat::join('film_session_register_seats', 'film_session_register_seats.seat_id', '=', 'seats.id')->where('film_session_register_seats.film_session_register_id', $id)
            ->select('seats.*')->get();
        $checked_seats = Seat::join('film_session_register_seats', 'film_session_register_seats.seat_id', '=', 'seats.id')
            ->where([['film_session_register_seats.film_session_register_id', $id], ['film_session_register_seats.seat_status', 1]])
            ->select('seats.*')->get();
        //-1 la cancel
        if ($request->status == -1) {
            foreach ($checked_seats as $seat) {
                $ss_seat = FilmSessionRegisterSeat::where([['seat_id', $seat->id], ['film_sesison_register_id', $register->id]])->first();
                $ss_seat->delete();
            }
            $register->delete();
        } elseif ($register->status == 2) {
            $register->status = $request->status;
            $register->save();
            $s_seats = SessionSeat::join('film_session_registers', 'film_session_registers.film_session_id', '=', 'session_seats.session_id')
                ->where([['film_session_registers.id', $id], ['session_seats.seat_status', 2]])
                ->select('session_seats.*')
                ->get();
            foreach ($checked_seats as $seat) {
                $s_seat = SessionSeat::where([['seat_id', $seat->id], ['session_id', $register->film_session->id]])->first();
                $s_seat->seat_status = $request->status;
                $s_seat->save();
                if ($request->status == 0) {
                    $r_seat = FilmSessionRegisterSeat::where([['seat_id', $seat->seat_id], ['register_id', $id]])->first();
                    $r_seat->delete();
                }
            }
            if ($request->status == 3) {
                if (!$request->trusted) {
                    $cc = DiscountCode::where([['code', $request->code], ['status', 0]])->first();
                    if (!$cc) return $this->respondErrorWithStatus('Oops... :>');
                    $code_type = CodeType::where('id', $cc->code_type_id)->first();
                    $code_subtract = (int)$code_type->value;
                    $total_price = -$code_subtract;

                    foreach ($checked_seats as $seat) {
                        //price
                        $seat = Seat::where('id', $seat->id)->first();
                        $seat_type = SeatType::where([['type', $seat->type], ['room_id', $register->film_session->room->id]])->first();
                        $price = SessionPrice::where([['session_id', $register->film_session_id], ['seat_type_id', $seat_type->id]])->first()->price;
                        $price = (int)$price;
                        $total_price += $price;
                    }

                    if ($total_price > 0) return $this->respondErrorWithStatus('Oops... :>');
                }

                $code = ($request->code) ? $request->code : '';

                foreach ($checked_seats as $seat) {
                    $register_seat = FilmSessionRegisterSeat::where([['film_session_register_id', $register->id], ['seat_id', $seat->id]])->first();
                    $number_share = ($request->code) ? count($checked_seats) : null;
                    $this->addSeatBookingHistory($register_seat, $code, $number_share, 'online');
                }
            }
        } elseif ($register->status == 0 && $request->status != 0) {
            foreach ($checked_seats as $seat) {
                $check_seat = SessionSeat::where([['seat_id', $seat->id], ['session_id', $register->film_session->id]])->first();
                if ($check_seat->seat_status != 0) {
                    foreach ($checked_seats as $s) {
                        $r_seat = FilmSessionRegisterSeat::where([['film_session_register_id', $register->id], ['seat_id', $s->id]])->first();
                        $r_seat->delete();
                    }
                    return $this->respondErrorWithStatus($seat->name);
                }
            }
            foreach ($checked_seats as $seat) {
                $register_seat = FilmSessionRegisterSeat::where([['film_session_register_id', $register->id], ['seat_id', $seat->id]])->first();
                if ($register_seat->seat_status == 0) {
                    if ($register_seat) $register_seat->delete();
                } elseif ($register_seat->seat_status == 1) {
                    $ss_seat = SessionSeat::where([['seat_id', $seat->id], ['session_id', $register->film_session->id]])->first();
                    $ss_seat->seat_status = $request->status;
                    $ss_seat->save();
                }
            }
//            if ($request->status == 3) {
//                $code = ($request->code) ? $request->code : '';
//                foreach ($booked_seats as $seat) {
//                    $register_seat = FilmSessionRegisterSeat::where([['film_session_register_id', $register->id], ['seat_id', $seat->id]])->first();
//                    $this->addSeatBookingHistory($register_seat, $code, 'online');
//                }
//            }
            $register->status = $request->status;
            $register->save();
        }
        return $this->respondSuccessWithStatus($register->status);
    }

    function addSeatBookingHistory(FilmSessionRegisterSeat $seat, $code, $number_share, $payment_method)
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
        $record->save();
        $session = FilmSession::find($register->film_session_id);
        $film = $session->film;
        $now = Carbon::now();
        $record->order_code = 'LD' . $film->id . $now->format('m') . $now->format('y') . $register->id;
        $record->save();
    }

//    public function bookSeats(Request $request, $register_id)
//    {
//        $register = FilmSessionRegister::find($register_id);
//        $seats = json_decode($request->seats);
//        foreach ($seats as $seat) {
//            $check_seat = SessionSeat::where([['seat_id', $seat->id], ['session_id', $register->film_session->session_id]])->first();
//            if ($check_seat->seat_status != 0) {
//                return $this->respondErrorWithStatus('Ghe id ' . $seat->id . ' khong kha dung. Reload.');
//            }
//        }
//        foreach ($seats as $seat) {
//            $ori_seat = SessionSeat::where([['seat_id', $seat->id], ['session_id', $register->film_session->session_id]])->first();
//            if ($ori_seat->seat_status == 0) {
//                $s = new FilmSessionRegisterSeat();
//                $s->seat_id = $seat->id;
//                $s->film_session_register_id = $register->id;
//                $s->save();
//                $ori_seat->seat_status = 3;
//                $ori_seat->save();
//                $code = ($seat->code) ? $seat->code : '';
//                $this->addSeatBookingHistory($s, $code, 'offline');
//            } else {
//                return $this->respondErrorWithStatus('Ghe id ' . $seat->id . ' khong kha dung. Reload');
//            }
//        }
//        return $this->respondSuccess('Book ghe thanh cong');
//    }


    public function triggerFilmSessionRegisterSeat(Request $request)
    {
        $session = FilmSessionRegister::where('id', $request->film_session_register_id)->first()->film_session()->first();
        $ori_seat = SessionSeat::where([['seat_id', $request->seat_id], ['session_id', $session->id]])->first();
        $trigger_seat = FilmSessionRegisterSeat::where([['film_session_register_id', $request->film_session_register_id], ['seat_id', $request->seat_id]])->first();
        if ($ori_seat->seat_status == 0) {
            if ($trigger_seat) {
                $trigger_seat->seat_status = ($trigger_seat->seat_status == 0) ? 1 : (($trigger_seat->seat_status == 1) ? 0 : $trigger_seat->seat_status);
                $trigger_seat->save();
            } else {
                $trigger_seat = new FilmSessionRegisterSeat();
                $trigger_seat->seat_id = $request->seat_id;
                $trigger_seat->film_session_register_id = $request->film_session_register_id;
                $trigger_seat->seat_status = 1;
                $trigger_seat->save();
            }
            return $this->respondSuccessWithStatus($trigger_seat);
        } else {
            return $this->respondErrorWithStatus('Ghe da duoc mua hoac khong ton tai');
        }
        /*
            elseif($ori_seat->seat_status == 1) {
            $seat = FilmSessionRegisterSeat::where([['seat_id',$request->seat_id],['film_session_register_id',$request->film_session_register_id]])->first();
                if($seat){
                    $seat->delete();
                    $ori_seat->seat_status = 0;
                    $ori_seat->save();
                    return $this->respondSuccessWithStatus($ori_seat->seat_status);
                }
                return $this->respondErrorWithStatus('Ghe da duoc chon');
            }*/

    }


    public function addSeatType(Request $request)
    {
        $seat_type = new SeatType();
        $seat_type->color = $request->color;
        $seat_type->type = $request->type;
        $seat_type->save();
        return $this->respondSuccessWithStatus($seat_type);
    }

    public function getSessionPrices()
    {
        $ss_prices = SessionPrice::all();
        return $ss_prices;
    }

    public function getFilmSessionRegister()
    {
        $registers = FilmSessionRegister::all();
        return $registers;
    }

    public function getFilmSessionRegisterSeat($id)
    {
        $register = FilmSessionRegister::where('id', $id)->first();
        $session = $register->film_session;
        $seats = $session->seats()->where('archived', 0)->get();
        foreach ($seats as $seat) {
            $ss_seat = SessionSeat::where([['seat_id', $seat->id], ['session_id', $session->id]])->first();
            if ($ss_seat->seat_status == 2) {
                $now = Carbon::now();
                if ($now->diffInSeconds(Carbon::createFromFormat('Y-m-d H:i:s', $ss_seat->updated_at)
                    ) > 600) {
                    $ss_seat->seat_status = 0;
                    $ss_seat->save();
                }
            }
        }
        $data['seats'] = $seats->map(function ($seat) use ($session, $register) {
            $data = $seat->getData();
//            $ss_seat = SessionSeat::where([['seat_id', $seat->id], ['session_id', $session->id]])->first();
//            if ($ss_seat->seat_status == 2) {
//                $now = Carbon::now();
//                if ($now->diffInSeconds(Carbon::createFromFormat('Y-m-d H:i:s', $ss_seat->updated_at)
//                    ) > 600) {
//                    $ss_seat->seat_status = 0;
//                    $ss_seat->save();
//                }
//            }

            $data['status'] = $seat->pivot->seat_status;
            $s_type = SeatType::where([['room_id', $seat->room_id], ['color', $seat->color]])->first();
            $data['type'] = $s_type->type;
            if ((SessionPrice::where([['session_id', $session->id], ['seat_type_id', $s_type->id]])->first())) {
                $data['price'] = SessionPrice::where([['session_id', $session->id], ['seat_type_id', $s_type->id]])->first()->price;
            } else
                $data['price'] = null;
            $register_seat = FilmSessionRegisterSeat::where([['film_session_register_id', $register->id], ['seat_id', $seat->id]])->first();
            $data['trigger_status'] = ($register_seat) ? (($register_seat->seat_status) ? $register_seat->seat_status : 0) : 0;
            return $data;
        });
        $room = $session->room;
        $room->getRoomDetail();
        $data['width'] = $session->room->width;
        $data['height'] = $session->room->height;
        $data['room_layout_url'] = $session->room->room_layout_url;
        return $data;
    }

    public function getSeatStatus($sessionId, $seatId)
    {
        $seat = SessionSeat::where([['session_id', $sessionId], ['seat_id', $seatId]])->first();
        $data['status'] = $seat->seat_status;
        return $data;
    }

    public function getFilmsShown(Request $request)
    {
        $limit = $request->limit;
        $search = $request->search;
        $films = Film::join('film_sessions', 'film_sessions.film_id', '=', 'films.id')
            ->where([['film_sessions.id', '>', 0], ['film_sessions.start_date', '<=', Carbon::today()]])
            ->select('films.*')->groupBy('films.id');
        if ($search) {
            $films = $films->where('films.name', 'LIKE', '%' . trim($search) . '%');
        }
        if ($limit == -1 or !$limit) {
            $films = $films->get();
            $films = [
                "films" => $films,
            ];

            return $films;
        } else {

            $films = $films->paginate($limit);
            return $this->respondWithPagination($films, ['films' => $films->map(function ($film) {
                return $film;
            })]);
        }
    }

    public function getCodeValue($code)
    {
        $discount_code = DiscountCode::where('code', $code)->first();
        $code_type_id = $discount_code->code_type_id;
        $code_type = CodeType::find($code_type_id);
        $value = $code_type->value;
        $status = $discount_code->status;
        $start_date = $code_type->start_date;
        $end_date = $code_type->end_date;
        $description = $code_type->description;
        $data['description'] = $description;
        $data['value'] = $value;
        $data['status'] = $status;
        $data['start_date'] = $start_date;
        $data['end_date'] = $end_date;

        return $data;
    }

    public function test(Request $request)
    {
        $his = SeatBookingHistory::all();
        foreach ($his as $h) {
            $h->delete();
            $h->save();
        }
        return 1;
    }




//    public function getBlogsFilter(Request $request)
//    {
//        $limit = $request->limit;
//        $search_name = $request->search_name;
//        $search_content = $request->search_content;
//        $id = $request->id;
//        $status = $request->status;
//        $blogs = Film_Blog::orderBy('created_at', 'desc');
//
//
//        if ($search_name) {
//            $blos = $blogs->where('name', 'LIKE', '%' . trim($search_name) . '%');
//        }
//        if ($search_content) {
//            $blos = $blogs->where('content', 'LIKE', '%' . trim($search_content) . '%');
//        }
//        if ($id) {
//            $blogs = $blogs->where('id', $id);
//        }
//        if ($status) {
//            $blogs = $blogs->where('status', $status);
//        }
//
//        if ($limit == -1 or !$limit) {
//            $blogs = $blogs->get();
//            $blogs = [
//                "blogs" => $blogs,
//            ];
//
//            return $blogs;
//        } else {
//
//            $blogs = $blogs->paginate($limit);
//            return $this->respondWithPagination($blogs, ['blogs' => $blogs->map(function ($blog) {
//                return $blog;
//            })]);
//        }
//    }
//


}
