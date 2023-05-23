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

// Home
Route::get('/', [SiteController::class, 'getIndex'])->name('carel.index');

Route::get('/search', [SiteController::class, 'getSearch'])->name('carel.search');

Route::get('/detail-class', [SiteController::class, 'getDetail'])->name('carel.overview');

Route::get('/settings', [SiteController::class, 'getSetting'])->name('carel.setting');

Route::get('/checkout', [CheckoutController::class, 'getCheckout'])->name('carel.pages.checkout');

// Login Halaman Login
Route::get('/signin', [AuthController::class, 'getSignIn'])->name('carel.get.signin');
// Post Data dari Halaman Login
Route::post('/login', [AuthController::class, 'postLogin'])->name('carel.post.login');

// Login Halaman Daftar
Route::get('/signup', [AuthController::class, 'getSignUp'])->name('carel.get.signup');
// Post Data dari Halaman Daftar
Route::post('/regist', [AuthController::class, 'postRegist'])->name('carel.post.regist');



