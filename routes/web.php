<?php

use App\Http\Controllers\User\IndexController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'user'], function (){
    Route::get('/', [IndexController::class, 'index'])->name('user.index');

    Route::group(['prefix' => 'department'], function (){
        Route::get('/', [IndexController::class, 'department'])->name('user.department.index');
        Route::get('/{category}', [IndexController::class, 'category'])->name('user.department.category');
    });
});
