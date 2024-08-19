<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController; // Correctly import the controller class
use App\Http\Controllers\SessionController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('project', ProjectController::class);

Route::get('/sesi',[SessionController::class,'index']);
Route::post('/sesi/login',[SessionController::class,'login']);
Route::get('/sesi/logout',[SessionController::class,'logout']);