<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OverviewController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\AdminController;
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
            Route::get('/', [SiteController::class, 'index'])->name('studo.index');

            Route::get('/search-page', [SearchController::class, 'index'])->name('studo.search');

            Route::get('/overview', [OverviewController::class, 'index'])->name('studo.overview');

            Route::get('/checkout', [CheckoutController::class, 'getCheckout'])->name('studo.checkout');


            //  Post Data dari Popup Login
            Route::post('/login', [AuthController::class, 'postLogin'])->name('studo.post.login');
            
            // Post Data dari Popup Daftar
            Route::post('/regist', [AuthController::class, 'postSignup'])->name('studo.post.regist');



        Route::middleware(['auth'])->group(function () {

            Route::get('/signout', [AuthController::class, 'getSignout'])->name('studo.post.signout');

            Route::get('/setting', [SettingController::class, 'index'])->name('studo.setting');
            Route::post('/setting/user/profile/update/{id}', [SettingController::class, 'updateProfile'])->name('studo.post.updateProfile');
            Route::post('/setting/user/profile/photo/update/{id}', [SettingController::class, 'updateProfilePhoto'])->name('studo.user.profile.update_photo');
            
            Route::get('/signout', [AuthController::class, 'getSignout'])->name('studo.post.signout');

            Route::get('/setting-admin', [AdminController::class, 'indexAdmin'])->name('studo.settingAdmin');
            
            Route::get('/setting-admin/profile', [AdminController::class, 'profileAdmin'])->name('studo.profileAdmin');
        });
});



