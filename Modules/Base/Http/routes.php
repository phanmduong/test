<?php
$baseRoutes = function () {
    Route::group(['prefix' => 'base'], function () {
        Route::get('/', 'ManageBaseApiController@getBases');
        Route::post('/', 'ManageBaseApiController@createBase');
        Route::put('/{baseId}/display', 'ManageBaseApiController@createBase');

        Route::post('/{baseId}/room', 'ManageBaseApiController@createRoom');

        Route::get('/{baseId}/rooms', 'ManageBaseApiController@getBaseRooms');

        Route::put('/{baseId}/room/{roomId}', 'ManageBaseApiController@editRoom');
        Route::get('/room-type', 'ManageBaseApiController@getRoomTypes');
        Route::put('/room-type/{roomTypeId}', 'ManageBaseApiController@editRoomType');
        Route::post('/room-type', 'ManageBaseApiController@createRoomType');

        Route::get('/{baseId}', 'ManageBaseApiController@getBase');
        Route::put('/{baseId}', 'ManageBaseApiController@editBase');

        Route::get('/room/{roomId}/classes', 'ManageBaseApiController@getClassesByRoom');
    });
};

$provinceRoutes = function () {
    Route::group(['prefix' => 'province'], function () {
        Route::get('/all', 'ManageBaseApiController@getAllProvinces');
    });
};

$roomRoutes = function () {
    Route::group(['prefix' => 'v2/room'], function () {
        Route::post('/{roomId}/seat', 'ManageBaseApiController@createSeat');
        Route::get('/{roomId}/seats', 'ManageBaseApiController@getSeats');
        Route::post('/{roomId}/seats', 'ManageBaseApiController@createSeats');
        Route::put('/seat/{seatId}', 'ManageBaseApiController@updateSeat');
        Route::put('/{roomId}/seat/{seatId}', 'ManageBaseApiController@editSeat');
        Route::post('/{roomId}/layout', 'ManageBaseApiController@roomLayout');
        Route::get('/{roomId}/seat-types', 'ManageBaseApiController@getSeatTypes');
        Route::put('/seat-type/{seatTypeId}', 'ManageBaseApiController@editSeatType');
        Route::get('/{roomId}/group', 'ManageBaseApiController@groupSeatColors');
        Route::delete('/delete-sessions', 'ManageBaseApiController@test');
    });
};

$seatRoutes = function () {
    Route::get('available', 'ManageBaseApiController@availableSeats');
    Route::post('{seatId}/book', 'ManageBaseApiController@bookSeat');
    Route::get('all', 'ManageBaseApiController@getHistoryBookSeat');
    Route::post('/register/{registerId}', 'ManageBaseApiController@chooseSeatHistory');
};

Route::group(['prefix' => 'v2/seat', 'namespace' => 'Modules\Base\Http\Controllers'], $seatRoutes);

$routes = function () {
    Route::group(['prefix' => 'v2'], function () {
        Route::get('/base/provinces', 'PublicApiController@provinces');
        Route::get('/base/province/{provinceId}', 'PublicApiController@basesInProvince');
        Route::get('/base/{baseId}/rooms', 'PublicApiController@baseRooms');
        Route::get('/base', 'PublicApiController@bases');
        // Route::get('/product-category', 'PublicApiController@productCategories');
        // Route::get('/product-kind', 'PublicApiController@productKinds');
        // Route::get('/blogs', 'PublicApiController@getBlogs');
        // Route::get('/blog/{id}', 'PublicApiController@getDetailBlog');
    });
};

Route::group(['domain' => 'manageapi.' . config('app.domain'), 'prefix' => 'v2', 'namespace' => 'Modules\Base\Http\Controllers'], $baseRoutes);

Route::group(['domain' => 'manageapi.' . config('app.domain'), 'namespace' => 'Modules\Base\Http\Controllers'], $provinceRoutes);

Route::group(['domain' => 'manageapi.' . config('app.domain'), 'namespace' => 'Modules\Base\Http\Controllers'], $roomRoutes);

Route::group(['domain' => 'manageapi.' . config('app.domain'), 'namespace' => 'Modules\Base\Http\Controllers'], $seatRoutes);

Route::group(['domain' => 'api.' . config('app.domain'), 'namespace' => 'Modules\Base\Http\Controllers'], $routes);

// new api routes

Route::group(['domain' => config('app.domain'), 'prefix' => 'api/v3', 'namespace' => 'Modules\Base\Http\Controllers'], $routes);

Route::group(
    ['domain' => config('app.domain'), 'prefix' => 'manageapi', 'namespace' => 'Modules\Base\Http\Controllers'],
    function () use ($baseRoutes, $provinceRoutes, $roomRoutes, $seatRoutes) {
        Route::group(['prefix' => 'v3/v2'], $baseRoutes);
        Route::group(['prefix' => 'v3'], $provinceRoutes);
        Route::group(['prefix' => 'v3'], $roomRoutes);
        Route::group(['prefix' => 'v3/seat'], $seatRoutes);
    }
);

