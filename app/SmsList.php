<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SmsList extends Model
{
    protected $table = "sms_list";

    public function classes()
    {
        return $this->belongsToMany(StudyClass::class, "sms_list_class", 'sms_list_id', 'class_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function templates()
    {
        return $this->hasMany(SmsTemplate::class, "sms_list_id");
    }

    public function group()
    {
        return $this->belongsTo(Group::class, "group_id");
    }

    public function getData()
    {
        $templates = collect($this->templates()->get()->toArray());
        $total_quantity = $templates->reduce(function ($result, $item) {
            $count = Sms::where('sms_template_id', '=', $item['id'])->count();
            return $result + $count;
        }, 0);
        return [
            "id" => $this->id,
            "user" => [
                "id" => $this->user->id,
                "avatar_url" => $this->user->avatar_url,
                "name" => $this->user->name
            ],
            "name" => $this->name ? $this->name : '',
            "description" => $this->description ? $this->description : '',
            "status" => $this->status,
            "sent_quantity" => $this->templates()->where("status", "=", "sent")->count(),
            "total_quantity" => $this->templates()->count(),
            "money" => 750 * $total_quantity
        ];
    }
}
