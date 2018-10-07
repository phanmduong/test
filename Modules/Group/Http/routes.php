<?php


$routes = function () {
    Route::group(['prefix' => 'group'], function () {
        Route::get("/group-list", "ManageGroupApiController@getGroupList");
        Route::post("/group-list", "ManageGroupApiController@createGroup");
        Route::put("/group-list/{clusterId}", "ManageGroupApiController@editGroup");
    });
};

Route::group(['domain' => config('app.domain'), 'prefix' => 'manageapi/v3', 'namespace' => 'Modules\Group\Http\Controllers'], $routes);