<?php

use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminVideoController;
use App\Http\Controllers\VideoApiController;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoController;
use App\Http\Middleware\Admin;

Route::view('/', 'welcome')->name('home');
Route::view('/privacy', 'privacy');

Auth::routes();

Route::prefix('admin')->middleware(['auth', Admin::class])->group(
    function () {

        Route::resource('/videos', AdminVideoController::class)->only(['index', 'show', 'edit', 'update']);
        Route::resource('/users', AdminUserController::class)->only(['index', 'show', 'edit', 'update']);

    }
);

Route::group(
    [ 'prefix' => 'video', 'middleware' => [ 'auth' ] ], function () {

        Route::get('{video}', [VideoController::class, 'show']);
        // Route::get('watch/{video}', [VideoController::class, 'markWatched']);
        // Route::get('unwatch/{video}', [VideoController::class, 'markUnwatched']);
        // Route::get('togglewatched/{video}', [VideoController::class, 'toggleWatched']);
    }
);


Route::middleware('auth')->prefix('v1')->group(
    function () {

        // Route::prefix('user')->group(
        //     function () {

        //         Route::get(
        //             '/', function (Request $request) {
        //                 return $request->user();
        //             }
        //         );

        //     }
        // );

        Route::prefix('video')->group(
            function () {

                Route::post('watchy/{video}', [VideoApiController::class, 'markWatched']);
                Route::post('unwatch/{video}', [VideoApiController::class, 'markUnwatched']);
                Route::post('togglewatched/{video}', [VideoApiController::class, 'toggleWatched']);

            }
        );

    }
);


//---
/*
 * Laravel 12 routes
 */
/*
Route::get('/', function () {
    return view('welcome');
})->name('home');
*/
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(
    function () {
        Route::redirect('settings', 'settings/profile');

        Route::get('settings/profile', Profile::class)->name('settings.profile');
        Route::get('settings/password', Password::class)->name('settings.password');
        Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
    }
);

require __DIR__.'/auth.php';
