<?php

use App\Http\Controllers\ActionController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/


Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {

    Route::get('/', [IndexController::class, 'index'])->name('admin.index');

    Route::group(['prefix' => 'departments'], function () {
        Route::get('/', [DepartmentController::class, 'index'])->name('admin.department.index');
        Route::get('/create', [DepartmentController::class, 'create'])->name('admin.department.create');
        Route::post('/', [DepartmentController::class, 'store'])->name('admin.department.store');

        Route::get('/{department}/edit', [DepartmentController::class, 'edit'])->name('admin.department.edit');
        Route::patch('/{department}', [DepartmentController::class, 'update'])->name('admin.department.update');

        Route::get('/{department}/categories', [DepartmentController::class, 'show'])->name('admin.department.show');
        Route::delete('/{department}/delete', [DepartmentController::class, 'delete'])->name('admin.department.delete');
    });


    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('admin.category.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('admin.category.create');
        Route::post('/', [CategoryController::class, 'store'])->name('admin.category.store');

        Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('admin.category.edit');
        Route::patch('/{category}', [CategoryController::class, 'update'])->name('admin.category.update');

        Route::get('/{category}', [CategoryController::class, 'show'])->name('admin.category.show');
        Route::delete('/{category}/delete', [CategoryController::class, 'delete'])->name('admin.category.delete');
    });

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.user.index');
        Route::get('/create', [UserController::class, 'create'])->name('admin.user.create');
        Route::post('/', [UserController::class, 'store'])->name('admin.user.store');

        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('admin.user.edit');
        Route::patch('/{user}', [UserController::class, 'update'])->name('admin.user.update');

        Route::delete('/{user}/delete', [UserController::class, 'delete'])->name('admin.user.delete');
        Route::get('/{user}', [UserController::class, 'show'])->name('admin.user.show');
    });

    Route::group(['prefix' => 'services'], function () {
        Route::get('/', [ServiceController::class, 'index'])->name('admin.service.index');
        Route::get('/create', [ServiceController::class, 'create'])->name('admin.service.create');
        Route::post('/', [ServiceController::class, 'store'])->name('admin.service.store');

        Route::get('/{service}/edit', [ServiceController::class, 'edit'])->name('admin.service.edit');
        Route::patch('/{service}', [ServiceController::class, 'update'])->name('admin.service.update');

        Route::delete('/{service}/delete', [ServiceController::class, 'delete'])->name('admin.service.delete');
        Route::get('/{service}', [ServiceController::class, 'show'])->name('admin.service.show');

        Route::group(['prefix' => '/{service}'], function (){
             Route::post('/addVideo', [ActionController::class, 'addVideo'])->name('admin.service.addVideo');
             Route::post('/addImage', [ActionController::class, 'addImage'])->name('admin.service.addImage');
             Route::post('/addFile', [ActionController::class, 'addFile'])->name('admin.service.addFile');
        });

        Route::get('/get/video/{video}', [ActionController::class, 'getVideo'])->name('admin.service.getVideo');
        Route::delete('/file/{file}/delete', [ActionController::class, 'deleteFile'])->name('admin.file.delete');
        Route::delete('/video/{video}/delete', [ActionController::class, 'deleteVideo'])->name('admin.video.delete');
        Route::delete('/image/{image}/delete', [ActionController::class, 'deleteImage'])->name('admin.image.delete');


    });
    Route::get('/show/video/{video}', [IndexController::class, 'showVideo'])->name('admin.video.show');
    Route::get('/get/video/statistic', [IndexController::class, 'statistic'])->name('admin.video.statistic');
    Route::post('/get/video/statistic/video', [IndexController::class, 'getVideoStatistics'])->name('admin.video.statistic.video');

});
