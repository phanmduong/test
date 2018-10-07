<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FilmSession extends Model
{
    //
    public function film()
    {
        return $this->belongsTo('App\Film','film_id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class,'room_id');
    }

    public function seats()
    {
        return $this->belongsToMany(Seat::class,'session_seats','session_id','seat_id')->withPivot('seat_status');
    }

    public function prices()
    {
        return $this->hasMany(SessionPrice::class,'session_id');
    }
}
