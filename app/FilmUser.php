<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FilmUser extends Model
{
    //
    protected $table = "film_users";

    public function film_session_register()
    {
        return $this->hasMany(FilmSessionRegister::class,'user_id');
    }
}
