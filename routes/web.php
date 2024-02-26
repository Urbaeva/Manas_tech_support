<?php

use App\Http\Controllers\ActionController;
use App\Http\Controllers\User\IndexController;
use App\Services\Localization\LocalizationService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Route::group(
    [
        'prefix' => LocalizationService::locale(),
        'middleware' => 'setLocale',
    ],
    function () {

        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

        Route::group(['prefix' => 'user'], function () {
            Route::get('/', [IndexController::class, 'index'])->name('user.index');

            Route::group(['prefix' => 'departments'], function () {
                Route::get('/{department}', [IndexController::class, 'department'])->name('user.department');
                Route::get('/service/{service}', [IndexController::class, 'service'])->name('user.category.service');
                Route::get('/service/video/{video}', [IndexController::class, 'video'])->name('user.service.video');
                Route::get('/service/get/video/{video}', [ActionController::class, 'getVideo'])->name('user.service.getVideo');
            });


            Route::get('/getQr', [ActionController::class, 'getQrCode'])->name('getqr');

            Route::get('/contact', [IndexController::class, 'contact'])->name('user.contact');
            Route::get('/services', [IndexController::class, 'services'])->name('user.services');
        });
    });
Route::get('/save/video/view/{video}', [ActionController::class, 'viewVideo']);
Auth::routes();
