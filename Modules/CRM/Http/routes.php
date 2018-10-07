<?php

$manageRoutes = function () {
    Route::group(['prefix' => 'crm'], function () {
        Route::get('/analytics', 'ManageCRMApiController@analytics');
        Route::get('/clients', 'ManageCRMApiController@clients');
    });
};

Route::group(['domain' => config('app.domain'), 'prefix' => 'manageapi', 'namespace' => 'Modules\CRM\Http\Controllers'],
    function () use ($manageRoutes) {
        Route::group(['prefix' => 'v3'], $manageRoutes);
    }
);
