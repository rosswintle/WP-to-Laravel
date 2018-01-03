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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group( [ 'prefix' => 'video', 'middleware' => [ 'auth' ] ], function () {

    Route::get('watch/{video}', 'VideoController@markWatched');
    Route::get('unwatch/{video}', 'VideoController@markUnwatched');
    Route::get('togglewatched/{video}', 'VideoController@toggleWatched');

} );