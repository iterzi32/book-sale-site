<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\LogoutController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Customer\CustomerController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Front\FilterController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\SearchController;
use App\Http\Controllers\Front\User\Auth\Password\ForgotController;
use App\Http\Controllers\Front\User\Auth\RegisterController;
use Illuminate\Support\Facades\Route;


/*-------------------------------------------------Admin--------------------------------------------------*/
Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest:admin')->group(function () {
        Route::view('login', 'admin.auth.login')->name('login');
        Route::post('login', [LoginController::class, 'authenticate'])->name('authenticate');
    });
    Route::middleware('login:admin')->group(function () {
        Route::view('dashboard', 'admin.dashboard.index')->name('index');
        Route::get('', [LogoutController::class, 'logout'])->name('logout');
    });
});

/*-------------------------------------------------Admin Category Management------------------------------*/
Route::prefix('admin/dashboard')->group(function () {
    Route::resource('category', CategoryController::class);
});

/*-------------------------------------------------Admin Product Management------------------------------*/
Route::prefix('admin/dashboard')->group(function () {
    Route::resource('product', ProductController::class);
});

/*-------------------------------------------------Admin Customer Management------------------------------*/
Route::prefix('admin/dashboard')->group(function () {
    Route::resource('customer', CustomerController::class);
});

/*-------------------------------------------------User--------------------------------------------------*/
Route::prefix('user')->name('user.')->group(function () {
    Route::middleware('guest:web')->group(function () {
        Route::view('login', 'front.user.auth.login')->name('login');
        Route::post('login', [\App\Http\Controllers\Front\User\Auth\LoginController::class, 'authenticate'])->name('authenticate');
        Route::get('register', [RegisterController::class, 'register'])->name('register');
        Route::post('register', [RegisterController::class, 'store'])->name('store');
        Route::get('forgot-password', [ForgotController::class, 'showForgotForm'])->name('forgot.password.form');
        Route::post('forgot-password', [ForgotController::class, 'sendResetLink'])->name('send.reset.link');
        Route::get('password-reset/{token}', [ForgotController::class, 'showResetForm'])->name('reset.password.form');
        Route::post('password-reset', [ForgotController::class, 'resetPassword'])->name('reset.password');

    });
    Route::middleware('login:web')->group(function () {
        Route::get('', [\App\Http\Controllers\Front\User\Auth\LogoutController::class, 'logout'])->name('logout');
    });
});


/*-------------------------------------------------Front Management------------------------------*/
Route::get('', [HomeController::class, 'index'])->name('user.index');

/*-------------------------------------------------Front Cart Management--------------------------*/
Route::prefix('cart')->name('cart.')->group(function () {
    Route::get('details', [CartController::class, 'index'])->name('index');
    Route::get('add/{product}', [CartController::class, 'add'])->name('add')->middleware('login:web');
    Route::get('destroy/{details}', [CartController::class, 'destroy'])->name('destroy')->middleware('login:web');
});

/*-------------------------------------------------Front Filter Management--------------------------*/
Route::post('filter', [FilterController::class, 'filter'])->name('filter');

/*-------------------------------------------------Front Search Management--------------------------*/
Route::post('search', [SearchController::class, 'search'])->name('search');

/*-------------------------------------------------Front Checkout Management-------------------------*/
Route::get('checkout-form', [CheckoutController::class, 'showCheckoutForm'])->name('show.checkout.form');
Route::post('checkout', [CheckoutController::class, 'checkout'])->name('checkout');
