<?php

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\NotificationController;

Route::get('/test-toast', function () {
    return redirect()->route('show-toast')->with('success', 'This is a test success message!');
});

Route::get('/show-toast', function () {
    return view('test');
})->name('show-toast');

Route::middleware(['web'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('/product', [ProductController::class, 'index'])->name('product');

    Route::get('product-detail/{product}', [ProductController::class, 'detail'])->name('product.detail');

    Route::post('product', [ProductController::class, 'detail'])->name('product.index');

    Route::get('/about', function() {
        return view('about');
    })->name('about');

    Route::get('/contact', function() {
        return view('contact');
    })->name('contact');

    Route::get('login',function() {
        return view('login');
    })->name('login-form');

    Route::get('register',
        [RegisterController::class, 'index']
    )->name('register');

    Route::post('create',
        [RegisterController::class, 'storeUser']
    )->name('create-user');

    Route::post('login', [
        LoginController::class, 'login'
    ])->name('login');

    Route::get('logout', [
        LoginController::class, 'logout'
    ])->name('logout');

    // routes/web.php
    Route::post('/contact/send', [ContactController::class, 'sendByUser'])->name('contact.send');


    // Route::get('/cart', function() {
    //     return view('user.cart');
    // })->name('cart');

    Route::middleware('auth')->group(function() {
        // Route::get('/profile', [HomeController::class, 'profile'])->name('profile');

        Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

        Route::post('/cart/{product}', [CartController::class, 'store'])->name('cart.store');

        Route::post('/cart-decrease/{cart}', [CartController::class, 'decreaseQuantity'])->name('cart.decrease');

        Route::post('/cart-increase/{cart}', [CartController::class, 'increaseQuantity'])->name('cart.increase');

        Route::delete('/cart/{cart}', [CartController::class, 'destroy'])->name('cart.remove');

        Route::post('/cart-confirm', [CartController::class, 'confirmCart'])->name('cart.confirm');

        Route::get('/my-order', [UserController::class, 'myOrders'])->name('my-order');

        Route::get('/notification', [NotificationController::class, 'index'])->name('notificaton.index');

        Route::get('/notification/{notification}', [NotificationController::class, 'changeStatus'])->name('notification.read');

        Route::get('/notification-destroy/{notification}', [NotificationController::class, 'destroy'])->name('notification.destroy');




    });

});