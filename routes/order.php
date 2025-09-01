<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

Route::prefix('order')->name('order.')->group(function() {
    Route::get('index',[OrderController::class,'index'])->name('index');

});
