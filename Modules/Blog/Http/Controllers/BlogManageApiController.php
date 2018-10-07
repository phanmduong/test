<?php

namespace Modules\Blog\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\ManageApiController;
use App\Product;

class BlogManageApiController extends ManageApiController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getPost($postId)
    {
        $post = Product::find($postId);

        if ($post) {
            $post->url = generate_protocol_url($post->url);
            return $this->respondSuccessV2([
                'post' => $post->blogEditorTransform()
            ]);
        } else {
            return $this->respondErrorWithStatus('Bài viết không tồn tại');
        }
    }

    public function createPost(Request $request)
    {
        $title = $request->title;
        $kind = $request->kind;
        $language_id = $request->language_id;
        $slug = $request->slug;
        $category_id = $request->category_id;
        $tags = $request->tags;
        $description = $request->description;
        $meta_title = $request->meta_title;
        $meta_description = $request->meta_description;
        $keyword = $request->keyword;
        $content = $request->product_content;
        $url = $request->url;
        $publishStatus = $request->publish_status;

        if ($request->id) {
            $product = Product::find($request->id);
            $pos = strrpos($slug, ".");
            if ($pos) {
                $slug = substr($slug, 0, $pos);
            }
        } else {
            $product = new Product();
            $product->author_id = $this->user->id;
        }

        $product->status = $request->status;
        $product->kind = $request->kind;

        $product->slug = $slug;
        $product->meta_title = $meta_title;
        $product->keyword = $keyword;
        $product->meta_description = $meta_description;

        $product->title = $title;
        $product->description = $description;
        $product->content = $content;
        $product->publish_status = $publishStatus;

        $product->tags = $tags;
        $product->category_id = $category_id;
        $product->language_id = $language_id;

        $product->type = 2;
        $product->url = trim_url($url);

        $product->save();

        $product->slug = $product->slug . "." . $product->id;

        $product->save();

        return $this->respondSuccessV2([
            "product" => $product->blogEditorTransform()
        ]);
    }
}
