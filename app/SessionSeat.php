<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SessionSeat extends Model
{
    //
    protected $table = 'session_seats';

    public function session()
    {
        return $this->belongsTo(FilmSession::class,'session_id');
    }

//    public function seats()
//    {
//        return $this->belongsToMany(FilmSession::class,'s');
//    }


}
