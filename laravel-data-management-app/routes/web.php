<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SessionController;
use App\Http\Middleware\isLogin;

// Public routes
Route::get('/', function () {
    return view('welcome');
});

// Routes accessible only to unauthenticated users
Route::middleware([isLogin::class])->group(function () {
    Route::get('/sesi', [SessionController::class, 'index'])->name('login');
    Route::post('/sesi/login', [SessionController::class, 'login']);
    Route::get('/sesi/register', [SessionController::class, 'register'])->name('register');
    Route::post('/sesi/create', [SessionController::class, 'create']);
});

// Routes that require authentication
Route::middleware(['auth'])->group(function () {
    Route::resource('project', ProjectController::class);
});

Route::get('/sesi/logout', [SessionController::class, 'logout'])->name('logout');
