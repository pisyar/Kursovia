<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::post('/register', [UserController::class, "register"])->name("register");
Route::post('/login', [UserController::class, "login"])->name("login");
Route::get('/logout', [UserController::class, "logout"])->name("logout");



