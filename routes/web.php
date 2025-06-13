<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)->group(function(){
    Route::get('/', 'homePage')->name('homePage');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
});
