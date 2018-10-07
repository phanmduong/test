<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoryFund extends Model
{
    //
    protected $table = 'history_funds';

    public function payer(){
        return $this->belongsTo(Fund::class,'payer_id');
    }

    public function receiver(){
        return $this->belongsTo(Fund::class,'receiver_id');
        
    }

    public function transform(){
        
        return [
            "id" => $this->id,
            "payer" => $this->payer ? $this->payer->transform() : [],
            "receiver" => $this->receiver ? $this->receiver->transform() : [],
            "money_value" => $this->money_value,
            "created_at" => format_vn_short_datetime(strtotime($this->created_at)),
        ];
    }
}
