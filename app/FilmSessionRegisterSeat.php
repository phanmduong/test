<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FilmSessionRegisterSeat extends Model
{
    //
    protected $table = "film_session_register_seats";

    public function film_session_register()
    {
        return $this->belongsTo(FilmSessionRegister::class, 'film_session_register_id');
    }


}
