<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FilmSessionRegister extends Model
{
    //
    protected $table = "film_session_registers";

    public function film_session()
    {
        return $this->belongsTo(FilmSession::class,'film_session_id');
    }

    public function user()
    {
        return $this->belongsTo(FilmUser::class,'user_id');
    }

    public function film_session_register_seats()
    {
        return $this->hasMany(FilmSessionRegisterSeat::class,'film_session_register_id');
    }

    public function seats()
    {
        return $this->belongsToMany(Seat::class,'film_session_register_seats','film_session_register_id','seat_id');
    }
}
