<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $table = 'products';

    protected $dates = ['deleted_at'];

    public function author()
    {
        return $this->belongsTo('App\User', 'author_id');
    }

    public function feature()
    {
        return $this->belongsTo('App\User', 'feature_id');
    }

    public function likes()
    {
        return $this->hasMany('App\Like', 'product_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment', 'product_id');
    }

    public function notifications()
    {
        return $this->hasMany('App\Notification', 'product_id');
    }

    public function category()
    {
        return $this->belongsTo(CategoryProduct::class, 'category_id');
    }

    public function productCategories()
    {
        return $this->belongsToMany(CategoryProduct::class, 'product_category_product', 'product_id', 'category_product_id')
            ->withPivot('id');
    }

    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id');
    }

    public function images()
    {
        return $this->hasMany('App\Image', 'product_id');
    }

    public function colors()
    {
        return $this->hasMany('App\Color', 'product_id');
    }

    public function topicAttendance()
    {
        return $this->hasOne(TopicAttendance::class, 'product_id', 'id');
    }

    public function languages()
    {
        return $this->belongsToMany(LanguageProduct::class, 'language_product', 'product_id', 'language_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class,'products_tags','product_id','tag_id');
    }
    public function blogTransform()
    {
        $category = $this->category;
        return [
            'id' => $this->id,
            'url' => generate_protocol_url($this->url),
            'share_url' => config('app.protocol') . config('app.domain') . '/blog/post/' . $this->id,
            'description' => $this->description,
            'created_at' => $this->created_at,
            'author' => [
                'id' => $this->author->id,
                'name' => $this->author->name,
                'avatar_url' => strpos($this->author->avatar_url, config('app.protocol')) === false ? config('app.protocol') . $this->author->avatar_url : $this->author->avatar_url,
                'email' => $this->author->email,
                'username' => $this->author->username,
            ],
            "publish_status" => $this->publish_status,
            'title' => $this->title,
            'category' => $this->category ? $this->category->name : "",
            'category_name' => $category ? $category->name : "",
            'thumb_url' => $this->thumb_url,
            'slug' => $this->slug,
            'kind' => $this->kind,
            'meta_description' => $this->meta_description ? $this->meta_description : "",
            'meta_title' => $this->meta_title ? $this->meta_title : "",
            'keyword' => $this->keyword,
            // 'created_at' => time_remain_string($this->created_at),
            'views' => $this->views,
            'status' => $this->status
        ];
    }

    public function blogEditorTransform()
    {
        $data = $this->blogTransform();
        $data['language_id'] = $this->language ? $this->language->id : 0;
        $data['category_id'] = $this->category_id;
        $data['created_at'] = time_elapsed_string(strtotime($this->created_at));
        $data['updated_at'] = time_elapsed_string(strtotime($this->updated_at));
        $data['content'] = $this->content ? $this->content : "";
        $data['tags'] = $this->tags ? $this->tags : "";
        return $data;
    }

    public function blogDetailTransform()
    {
        $data = $this->blogTransform();

        $data['categories'] = $this->productCategories;
        $data['language_id'] = $this->language ? $this->language->id : 0;

        $data['created_at'] = format_date($this->created_at);
        $data['content'] = $this->content ? $this->content : "";
        $data['tags'] = $this->tags ? $this->tags : "";
        $data['related_blogs'] = $posts_related = Product::where('id', '<>', $this->id)->inRandomOrder()->limit(3)->get()->map(function ($post) {
            return $post->blogTransform();
        });
        return $data;
    }

    public function personalTransform()
    {
        return [
            'id' => $this->id,
            'url' => $this->url,
            'author' => [
                'id' => $this->author->id,
                'name' => $this->author->name,
                'avatar_url' => strpos($this->author->avatar_url, config('app.protocol')) === false ? config('app.protocol') . $this->author->avatar_url : $this->author->avatar_url,
                'email' => $this->author->email,
                'username' => $this->author->username,
            ],
            'content' => $this->content,
            'title' => $this->title,
            'thumb_url' => $this->thumb_url,
            'slug' => $this->slug,
            'views' => $this->views,
            // 'comments' => $this->comments->
        ];
    }
}
