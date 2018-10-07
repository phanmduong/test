<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeatType extends Model
{
    //
    protected $table = "seat_types";

    public function seats()
    {
        return $this->belongsToMany(Seat::class,'seats');
    }
}
