<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController; // Correctly import the controller class

Route::get('/', function () {
    return view('welcome');
});

Route::resource('project', ProjectController::class);