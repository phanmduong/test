<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cluster extends Model
{
    protected $table = "clusters";

    public function creator()
    {
        return $this->belongsTo(User::class, "creator_id");
    }

    public function user()
    {
        return $this->belongsToMany(User::class, "clusters_users", "cluster_id", "user_id");
    }

    public function getData()
    {
        return [
            "id" => $this->id,
            "creator" => [
                "id" => $this->creator->id,
                "avatar_url" => $this->creator->avatar_url,
                "name" => $this->creator->name
            ],
            "name" => $this->name ? $this->name : '',
            "description" => $this->description ? $this->description : '',
            "quantity" => $this->user()->count()
        ];
    }
}
