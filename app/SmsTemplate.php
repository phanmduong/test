<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SmsTemplate extends Model
{
    protected $table = "sms_template";

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function smsTemplateType()
    {
        return $this->belongsTo(SmsTemplateType::class, "sms_template_type_id");
    }

    public function smsList()
    {
        return $this->belongsTo(SmsList::class, "sms_list_id");
    }

    public function sms()
    {
        return $this->hasMany(Sms::class, "sms_template_id");
    }

    public function transform()
    {
        $templates = collect($this->smsList->templates()->get()->toArray());
        $total_quantity = $templates->reduce(function ($result, $item) {
            $count = Sms::where('sms_template_id', '=', $item['id'])->count();
            return $result + $count;
        }, 0);
        return [
            "template_id" => $this->id,
            "name" => $this->name,
            "content" => $this->content,
            "send_time" => $this->send_time,
            "status" => $this->status,
            "order" => $this->order,
            "sms_template_type" => [
                "id" => $this->smsTemplateType->id,
                "name" => $this->smsTemplateType->name,
                "color" => $this->smsTemplateType->color
            ],
            "sent_quantity" => $this->sms()->count(),
            "total_quantity" => $total_quantity
        ];
    }
}
