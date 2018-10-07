<?php

$webRoutes = function () {

    Route::get('/', 'FilmZgroupController@index');
    Route::get('/film', 'FilmZgroupController@films');
    Route::get('/film/{id}', 'FilmZgroupController@film');
    Route::get('/event', 'FilmZgroupController@event');
//    Route::get('/film-categories/{category}','FilmZgroupController@filmsCategory');
    Route::get('/contact-us', 'FilmZgroupController@contact');
    // hmmm...?
    Route::post('/contact-us', 'FilmZgroupController@contactInfo');
    Route::get('/blog', 'FilmZgroupController@blogs');
    Route::get('/blog/post/{id}', 'FilmZgroupController@post');
    Route::get('/session/{id}', 'FilmZgroupController@session');
    Route::get('/session/{id}/time-out', 'FilmZgroupController@sessionTimeOut');
    Route::post('/user_information/{id}', 'FilmZgroupSendingMailController@user_info');
    Route::post('/book_information/{id}', 'FilmZgroupSendingMailController@book_info');
    Route::post('/mail/test', 'FilmZgroupSendingMailController@test');
    Route::post('/message', 'FilmZgroupSendingMailController@message_contact');
    Route::post('/payment/create_payment', 'FilmZgroupController@vnpay_create_payment');
    Route::get('/payment/vnpay_return', 'FilmZgroupController@vnpay_return');
    Route::get('/payment/vnpay_ipn', 'FilmZgroupController@vnpay_ipn');
    Route::get('/payment', 'FilmZgroupController@vnpay_index');

    //FAQ
    Route::get('/FAQ/{slug}', 'FilmZgroupController@FAQ');

};
$manageApiRoutes = function () {
    
    Route::delete('/delete/{table}', 'FilmZgroupManageApiController@deleteData');
   
    Route::post('/film', 'FilmZgroupManageApiController@addFilm');
    Route::put('/film/{id}', 'FilmZgroupManageApiController@updateFilm');
    Route::delete('/film/{id}', 'FilmZgroupManageApiController@deleteFilm');

    Route::post('/session', 'FilmZgroupManageApiController@addSession');
    Route::put('/session/{id}', 'FilmZgroupManageApiController@updateSession');
    Route::delete('/session/{id}', 'FilmZgroupManageApiController@deleteSession');

    Route::put('/film/{id}/change', 'FilmZgroupManageApiController@changeFilmInfo');
    Route::put('/{session_id}/seat', 'FilmZgroupManageApiController@changeSeatStatus');

//    Route::post('/blog', 'FilmZgroupManageApiController@addBlog');
//    Route::put('/blog/{id}', 'FilmZgroupManageApiController@updateBlog');
//    Route::delete('/blog/{id}', 'FilmZgroupManageApiController@deleteBlog');

    Route::put('/blog/{id}/change', 'FilmZgroupManageApiController@changeBlogStatus');



    Route::post('/seat-type', 'FilmZgroupManageApiController@addSeatType');
    Route::post('/code', 'FilmZgroupManageApiController@generateCodes');
    Route::get('/code', 'FilmZgroupManageApiController@getCodes');
    Route::put('/code/{id}', 'FilmZgroupManageApiController@updateCode');
    Route::delete('/code/{id}', 'FilmZgroupManageApiController@deleteCode');
    Route::post('/booking/seat', 'FilmZgroupManageApiController@bookSeats');
    Route::get('/booking/history', 'FilmZgroupManageApiController@getSeatBookingHistories');

};

$apiRoutes = function () {
    Route::get('/test', 'PublicFilmApiController@test');
    Route::get('/films', 'PublicFilmApiController@getFilmsFilter');
    Route::get('/films/shown', 'PublicFilmApiController@getFilmsShown');
    Route::get('/sessions', 'PublicFilmApiController@getSessionsFilter');
    Route::get('/session-prices', 'PublicFilmApiController@getSessionPrices');
    Route::get('/sessions/showing', 'PublicFilmApiController@getSessionsNowShowing');
    Route::get('/sessions/shown', 'PublicFilmApiController@getSessionsShown');
    Route::get('/blogs', 'PublicFilmApiController@getBlogsFilter');
    Route::get('/session/{id}/seat', 'PublicFilmApiController@getFilmSessionSeats');
    Route::get('/reload', 'PublicFilmApiController@reloadBlogTags');

    Route::post('/user', 'PublicFilmApiController@addUser');
    Route::get('/user', 'PublicFilmApiController@getUsers');
    Route::get('/session/{sesssionId}/seat/{seatId}', 'PublicFilmApiController@getSeatStatus');
    Route::post('/film-session-register', 'PublicFilmApiController@addFilmSessionRegister');
    Route::get('/film-session-register', 'PublicFilmApiController@getFilmSessionRegister');
    Route::post('/film-session-register/seat/trigger', 'PublicFilmApiController@triggerFilmSessionRegisterSeat');
    Route::put('/film-session-register/{id}/change', 'PublicFilmApiController@changeFilmSessionRegisterStatus');
    Route::get('/film-session-register/{id}/seat', 'PublicFilmApiController@getFilmSessionRegisterSeat');
    Route::get('/code/{code}', 'PublicFilmApiController@getCodeValue');
};


Route::group(['middleware' => 'web', 'domain' => "filmzgroup.test", 'namespace' => 'Modules\FilmZgroup\Http\Controllers'], $webRoutes);
Route::group(['middleware' => 'web', 'domain' => "ledahlia.vn", 'namespace' => 'Modules\FilmZgroup\Http\Controllers'], $webRoutes);
Route::group(["prefix" => "/manageapi/v3", 'namespace' => 'Modules\FilmZgroup\Http\Controllers'], $manageApiRoutes);
Route::group(["prefix" => "/api/v3", 'namespace' => 'Modules\FilmZgroup\Http\Controllers'], $apiRoutes);

