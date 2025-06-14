<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)->group(function(){
    Route::get('/', 'homePage')->name('homePage');
    Route::get('/login', 'login')->name('login');
    Route::get('/dashboard', 'dashboard')->name('dashboard');

    Route::post('/authenticate', 'authenticate')->name('authenticate');
});
