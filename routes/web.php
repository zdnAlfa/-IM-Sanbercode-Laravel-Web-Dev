<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;



Route::get('/register', [FormController::class, 'register'])->name('register');
Route::post('/register', [FormController::class, 'submitRegister'])->name('register.submit');


Route::get('/welcome', [FormController::class, 'welcome'])->name('welcome');

Route::get('/', function () {
    return view('home');
});

