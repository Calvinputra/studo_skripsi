<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::namespace('studo')->group( function () {
            // Google Auth
            Route::get('auth/google', [AuthController::class, 'redirectToGoogle'])->name('studo.auth.google.redirect');
            Route::get('auth/google/callback', [AuthController::class, 'handleGoogleCallback'])->name('studo.auth.google.callback');
            // Home
            Route::get('/', [SiteController::class, 'getIndex'])->name('studo.index');

            Route::get('/search', [SiteController::class, 'getSearch'])->name('studo.search');

            Route::get('/detail-class', [SiteController::class, 'getDetail'])->name('studo.overview');

            Route::get('/settings', [SiteController::class, 'getSetting'])->name('studo.setting');

            Route::get('/checkout', [CheckoutController::class, 'getCheckout'])->name('studo.checkout');

            // Login Halaman Login
            Route::get('/signin', [AuthController::class, 'getSignIn'])->name('studo.get.signin');
            // Post Data dari Halaman Login
            Route::post('/login', [AuthController::class, 'postLogin'])->name('studo.post.login');

            // Login Halaman Daftar
            Route::get('/signup', [AuthController::class, 'getSignUp'])->name('studo.get.signup');
            // Post Data dari Halaman Daftar
            Route::post('/regist', [AuthController::class, 'postRegist'])->name('studo.post.regist');
});



