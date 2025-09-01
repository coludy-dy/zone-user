<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::prefix('user')->name('user.')->group(function(){
    Route::get('/index',[UserController::class,'profile'])->name('profile');
    Route::get('/edit/{user}',[UserController::class,'editProfile'])->name('edit');
    Route::post('/update/{user}',[UserController::class,'updateProfile'])->name('update');
});