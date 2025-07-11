<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\BancadasController;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)->group(function(){
    Route::get('/', 'homePage')->name('homePage');
    Route::get('/login', 'login')->name('login');
    Route::get('/logout', 'logout')->name('logout');
    Route::get('/dashboard', 'dashboard')->name('dashboard');

    Route::post('/authenticate', 'authenticate')->name('authenticate');
});

Route::prefix('users')->as('users.')->controller(UsersController::class)->group(function() {
    Route::get('index', 'index')->name('index');
    Route::get('create', 'create')->name('create');
    Route::get('edit/{user}', 'edit')->name('edit');
    Route::post('store', 'store')->name('store');
    Route::put('update/{user}', 'update')->name('update');
    Route::delete('delete/{user}', 'delete')->name('delete');
});

Route::prefix('bancadas')->as('bancadas.')->controller(BancadasController::class)->group(function() {
    Route::get('index', 'index')->name('index');
    Route::get('create', 'create')->name('create');
    Route::get('edit/{user}', 'edit')->name('edit');
    Route::post('store', 'store')->name('store');
    Route::put('update/{user}', 'update')->name('update');
    Route::delete('delete/{user}', 'delete')->name('delete');
});
