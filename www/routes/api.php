<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('authentication')->group(function () {
    Route::prefix('v1')->group(function () {
        Route::post('search', 'Api\FlightsController@search')->name('api.search');

        Route::prefix('airports')->group(function () {
            Route::get('list', 'Api\AirportsController@list')->name('api.airports.list');
        });
    });
});
