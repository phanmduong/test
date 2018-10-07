<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FilmRoom extends Model
{
    //
    protected $table = "film_rooms";

    public function seats()
    {
        return $this->hasMany(Seat::class,'room_id');
    }

    public function session()
    {
        return $this->hasMany(FilmSession::class);
    }
}
