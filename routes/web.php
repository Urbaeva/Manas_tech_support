<?php

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

Route::get('/get-video', function () {
    $videoPath = public_path('video/video.mp4');

    if (file_exists($videoPath)) {
        // Return the video file as a response
        return response()->file($videoPath, [
            'Content-Type' => 'video/mp4',
        ]);
    } else {
        // Handle the case where the video file doesn't exist
        return response()->json(['error' => 'Video not found'], 404);
    }
})->name('get.video');
