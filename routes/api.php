<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::controller(ApiController::class)->group(function(){
    Route::get('/getData', 'getData')->name('getData');
    Route::any('/updateData', 'updateData')->name('updateData');
    Route::post('/sendData', 'sendData')->name('sendData');
});
