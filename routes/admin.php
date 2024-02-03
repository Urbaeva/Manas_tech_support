<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\IndexController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/


Route::get('/', [IndexController::class, 'index'])->name('admin.index');

Route::group(['prefix' => 'department'], function () {
    Route::get('/', [DepartmentController::class, 'index'])->name('admin.department.index');
    Route::get('/create', [DepartmentController::class, 'create'])->name('admin.department.create');
    Route::post('/', [DepartmentController::class, 'store'])->name('admin.department.store');

//    Route::get('/{department}/edit', [DepartmentController::class, 'edit'])->name('admin.department.edit');
//    Route::patch('/{department}', [DepartmentController::class, 'update'])->name('admin.department.update');
//
//    Route::get('/{department}', [DepartmentController::class, 'show'])->name('admin.department.show');
//    Route::delete('/{department}/delete', [DepartmentController::class, 'delete'])->name('admin.department.delete');
});


Route::group(['prefix' => 'category'], function () {
    Route::get('/', [CategoryController::class, 'index'])->name('admin.category.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('/', [CategoryController::class, 'store'])->name('admin.category.store');

//    Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('admin.category.edit');
//    Route::patch('/{category}', [CategoryController::class, 'update'])->name('admin.category.update');
//
//    Route::get('/{category}', [CategoryController::class, 'show'])->name('admin.category.show');
//    Route::delete('/{category}/delete', [CategoryController::class, 'delete'])->name('admin.category.delete');
});
