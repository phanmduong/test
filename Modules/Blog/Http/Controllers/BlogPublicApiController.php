<?php

namespace Modules\Blog\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Product;
use App\Http\Controllers\PublicApiController;
use Illuminate\Support\Facades\DB;

class BlogPublicApiController extends PublicApiController
{
    public function productKinds(Request $request) 
    {
        $kinds = Product::select(DB::raw('distinct(kind) as kind'))->get();
        return $this->respondSuccessWithStatus([
            'kinds' => $kinds->map(function($kind){
                return $kind->kind;  
            }) 
        ]);
    }
}
