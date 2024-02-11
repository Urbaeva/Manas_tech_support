<?php

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
                Route::get('/category/{category}', [IndexController::class, 'category'])->name('user.department.category');
                Route::get('/service/{service}', [IndexController::class, 'service'])->name('user.category.service');
                Route::get('/service/get/video/{video}', [IndexController::class, 'getVideo'])->name('user.service.getVideo');
            });
        });

    });

Auth::routes();
