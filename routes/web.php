<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'welcome');
Route::view('/privacy', 'privacy');

Auth::routes();

Route::prefix('admin')->middleware(['auth', 'admin'])->group( function () {

    Route::resource('/videos', 'AdminVideoController')->only(['index', 'show', 'edit', 'update']);

});

Route::group( [ 'prefix' => 'video', 'middleware' => [ 'auth' ] ], function () {

    Route::get('{video}', 'VideoController@show');
    Route::get('watch/{video}', 'VideoController@markWatched');
    Route::get('unwatch/{video}', 'VideoController@markUnwatched');
    Route::get('togglewatched/{video}', 'VideoController@toggleWatched');

} );