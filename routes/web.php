<?php

use App\Http\Controllers\studo\CheckoutController;
use App\Http\Controllers\studo\OverviewController;
use App\Http\Controllers\studo\SearchController;
use App\Http\Controllers\studo\SettingController;
use App\Http\Controllers\studo\SiteController;
use App\Http\Controllers\studo\AuthController as StudoAuthController;


use App\Http\Controllers\internal\AuthController as InternalTutorAuthController ;
use App\Http\Controllers\internal\ClassController;
use App\Http\Controllers\internal\TutorController;
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
            Route::post('/login', [StudoAuthController::class, 'postLogin'])->name('studo.post.login');
            
            // Post Data dari Popup Daftar
            Route::post('/regist', [StudoAuthController::class, 'postSignup'])->name('studo.post.regist');


        Route::middleware('auth')->group(function () {

            Route::get('/signout', [StudoAuthController::class, 'getSignout'])->name('studo.post.signout');

            Route::get('/setting', [SettingController::class, 'index'])->name('studo.setting');
            Route::post('/setting/user/profile/update/{id}', [SettingController::class, 'updateProfile'])->name('studo.post.updateProfile');
            Route::post('/setting/user/profile/photo/update/{id}', [SettingController::class, 'updateProfilePhoto'])->name('studo.user.profile.update_photo');
            
            Route::get('/signout', [StudoAuthController::class, 'getSignout'])->name('studo.post.signout');

        });
});

Route::namespace('internal')->group(function () {

    // Sebelum Login
    // Route::middleware('guest:tutors')->group(function () {
        Route::get('/internal', [InternalTutorAuthController::class, 'getSignin'])->name('internal_tutor.signin');
        Route::post('/internal/post_signin', [InternalTutorAuthController::class, 'postSignin'])->name('internal_tutor.post.signin');
        Route::get('/internal/signup', [InternalTutorAuthController::class, 'getSignup'])->name('internal_tutor.signup');
        Route::post('/internal/post/signup', [InternalTutorAuthController::class, 'postSignup'])->name('internal_tutor.post.signup');
    // });
    // Setelah Login
    Route::middleware('auth:tutors')->group(function () {

        Route::get('/internal/signout', [InternalTutorAuthController::class, 'getSignout'])->name('internal_tutor.post.signout');

        Route::get('/internal/tutor', [TutorController::class, 'index'])->name('internal_tutor.index');

        Route::get('/internal/profile', [TutorController::class, 'profile'])->name('internal_tutor.profileTutor');

        // View Input Class
        Route::get('/internal/class/informasi', [ClassController::class, 'index'])->name('internal_tutor.class.informasi');
        Route::get('/internal/class/materi', [ClassController::class, 'materi'])->name('internal_tutor.class.materi');
        Route::get('/internal/class/project', [ClassController::class, 'project'])->name('internal_tutor.class.project');
        //  Input Class
        Route::post('/internal/class/store', [ClassController::class, 'store'])->name('internal_tutor.class.store');


    });
});


