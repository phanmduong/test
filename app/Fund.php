<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fund extends Model
{
    //
    protected $table = 'funds';


    public function transform()
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "money_value" => $this->money_value,
            "created_at" => format_vn_short_datetime(strtotime($this->created_at)),

        ];
    }
}
