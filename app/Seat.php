<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Seat extends Model
{
    //
    protected $table = 'seats';

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }

    public function film_sessions()
    {
        return $this->belongsToMany(FilmSession::class,'session_seats','seat_id','session_id')->withPivot('seat_status');
    }

    public function film_session_registers()
    {
        return $this->belongsToMany(FilmSessionRegister::class,'film_session_register_seats','seat_id','film_session_registe_id')->withPivot('seat_status');
    }

    public function getData()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
//            'room' => $this->room ? $this->room->getData() : [],
            'type' => $this->type,
            "x" => $this->x,
            "y" => $this->y,
            "r" => $this->r,
            "color" => $this->color
        ];
    }
}
