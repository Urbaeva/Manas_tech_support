<?php


/*
|--------------------------------------------------------------------------
| Personal Routes
|--------------------------------------------------------------------------
*/


use App\Http\Controllers\Personal\CategoryController;
use App\Http\Controllers\Personal\IndexController;
use App\Http\Controllers\Personal\ServiceController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'personal', 'middleware' => ['auth', 'personal']], function () {

    Route::get('/', [IndexController::class, 'index'])->name('personal.index');

    Route::get('/departments', [CategoryController::class, 'departments'])->name('personal.department.index');

    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('personal.category.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('personal.category.create');
        Route::post('/', [CategoryController::class, 'store'])->name('personal.category.store');

        Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('personal.category.edit');
        Route::patch('/{category}', [CategoryController::class, 'update'])->name('personal.category.update');

        Route::get('/{category}', [CategoryController::class, 'show'])->name('personal.category.show');
        Route::delete('/{category}/delete', [CategoryController::class, 'delete'])->name('personal.category.delete');
    });

    Route::group(['prefix' => 'services'], function () {
        Route::get('/', [ServiceController::class, 'index'])->name('personal.service.index');
        Route::get('/create', [ServiceController::class, 'create'])->name('personal.service.create');
        Route::post('/', [ServiceController::class, 'store'])->name('personal.service.store');

        Route::get('/{service}/edit', [ServiceController::class, 'edit'])->name('personal.service.edit');
        Route::patch('/{service}', [ServiceController::class, 'update'])->name('personal.service.update');

        Route::delete('/{service}/delete', [ServiceController::class, 'delete'])->name('personal.service.delete');
        Route::get('/{service}', [ServiceController::class, 'show'])->name('personal.service.show');

        Route::group(['prefix' => '/{service}'], function (){
            Route::post('/addVideo', [ServiceController::class, 'addVideo'])->name('personal.service.addVideo');
            Route::post('/addImage', [ServiceController::class, 'addImage'])->name('personal.service.addImage');
            Route::post('/addFile', [ServiceController::class, 'addFile'])->name('personal.service.addFile');
        });
    });
});
