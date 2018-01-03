<?php

use Illuminate\Http\Request;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::middleware('auth')->prefix('v1')->group( function () {

    Route::prefix('user')->group( function () {

        Route::get('/', function (Request $request) {
            return $request->user();
        });

    });

    Route::prefix('video')->group( function () {

        Route::post('watch/{video}', 'VideoApiController@markWatched');

        Route::post('unwatch/{video}', 'VideoApiController@markUnwatched');

    });

} );
