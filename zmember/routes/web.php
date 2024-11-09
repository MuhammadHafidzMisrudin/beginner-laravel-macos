<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LearningController;

Route::get('/', function () {
    return view('welcome');
});

// route for demo.
Route::get('/demo', function () {
    return view('daisyui-test');
});

// route for dashboard.
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// route for learning.
Route::get('/learning', [
    LearningController::class,
    'index'
])->middleware(['auth', 'verified'])->name('learning');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('kelas-malam-laravel', function () {
    echo "<h1>Selamat Datang ke Kelas Malam Laravel</h1>";
});

// route to restful resource controller.
Route::resource('user', UserController::class)->middleware('auth');

require __DIR__ . '/auth.php';