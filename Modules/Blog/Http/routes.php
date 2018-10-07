<?php

$manageBlogRoutes = function () {
    Route::post('/', 'BlogManageApiController@createPost');
    Route::get('/{postId}', 'BlogManageApiController@getPost');
};

$publicBlogRoutes = function () {
    Route::get('kind', 'BlogPublicApiController@productKinds');
};

Route::group(['domain' => config('app.domain'), 'prefix' => 'manageapi/v3/post', 'namespace' => 'Modules\Blog\Http\Controllers'], $manageBlogRoutes);
Route::group(['domain' => config('app.domain'), 'prefix' => 'api/v3/post', 'namespace' => 'Modules\Blog\Http\Controllers'], $publicBlogRoutes);

