<?php

use App\Http\Controllers\studo\CheckoutController;
use App\Http\Controllers\studo\OverviewController;
use App\Http\Controllers\studo\SearchController;
use App\Http\Controllers\studo\SettingController;
use App\Http\Controllers\studo\SiteController;
use App\Http\Controllers\studo\QuestController;
use App\Http\Controllers\studo\AuthController as StudoAuthController;

use App\Http\Controllers\admin\DashboardController;

use App\Http\Controllers\internal\AuthController as InternalTutorAuthController ;
use App\Http\Controllers\internal\ClassController;
use App\Http\Controllers\internal\TutorController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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
            Route::get('/auth/google', [App\Http\Controllers\studo\AuthController::class, 'redirectToGoogle'])->name('studo.auth.google.redirect');
            Route::get('auth/google/callback', [App\Http\Controllers\studo\AuthController::class, 'handleGoogleCallback'])->name('studo.auth.google.callback');
            // Home
            Route::get('/', [SiteController::class, 'index'])->name('studo.index');

            Route::get('/search-page', [SearchController::class, 'index'])->name('studo.search');

            Route::get('/overview', [OverviewController::class, 'index'])->name('studo.overview');

            Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.pages.dashboard.index');

            Route::get('/checkout', [CheckoutController::class, 'getCheckout'])->name('studo.checkout');


            //  Post Data dari Popup Login
            Route::post('/login', [App\Http\Controllers\studo\AuthController::class, 'postLogin'])->name('studo.post.login');
            
            // Post Data dari Popup Daftar
            Route::post('/regist', [App\Http\Controllers\studo\AuthController::class, 'postSignup'])->name('studo.post.regist');


        Route::middleware('auth')->group(function () {

            Route::get('/signout', [App\Http\Controllers\studo\AuthController::class, 'getSignout'])->name('studo.post.signout');

            Route::get('/setting', [SettingController::class, 'index'])->name('studo.setting');
            Route::post('/setting/user/profile/update/{id}', [SettingController::class, 'updateProfile'])->name('studo.post.updateProfile');
            Route::post('/setting/user/profile/photo/update/{id}', [SettingController::class, 'updateProfilePhoto'])->name('studo.user.profile.update_photo');
            Route::post('/setting/user/profile/updatePassword/{id}', [SettingController::class, 'updatePassword'])->name('studo.post.updatePassword');
            
            Route::get('/quest/pretest/', [QuestController::class, 'indexPreTest'])->name('studo.pages.quest.pre-test');
            Route::get('/quest/posttest/', [QuestController::class, 'indexPostTest'])->name('studo.pages.quest.post-test');
            
            Route::get('/signout', [App\Http\Controllers\studo\AuthController::class, 'getSignout'])->name('studo.post.signout');

        });
});

Route::namespace('internal')->group(function () {

    // Sebelum Login
    // Route::middleware('guest:tutors')->group(function () {
        Route::get('/internal', [App\Http\Controllers\internal\AuthController::class, 'getSignin'])->name('internal_tutor.signin');
        Route::post('/internal/post_signin', [App\Http\Controllers\internal\AuthController::class, 'postSignin'])->name('internal_tutor.post.signin');
        Route::get('/internal/signup', [App\Http\Controllers\internal\AuthController::class, 'getSignup'])->name('internal_tutor.signup');
        Route::post('/internal/post/signup', [App\Http\Controllers\internal\AuthController::class, 'postSignup'])->name('internal_tutor.post.signup');
    // });
    // Setelah Login
    Route::middleware('auth:tutors')->group(function () {

        Route::get('/internal/signout', [App\Http\Controllers\internal\AuthController::class, 'getSignout'])->name('internal_tutor.post.signout');

        Route::get('/internal/tutor', [TutorController::class, 'index'])->name('internal_tutor.index');

        Route::get('/internal/profile', [TutorController::class, 'profile'])->name('internal_tutor.profileTutor');

        // View Input Class
        Route::get('/internal/class/informasi/{slug?}', [ClassController::class, 'index'])->name('internal_tutor.class.informasi');

        Route::get('/internal/class/materi/{slug}', [ClassController::class, 'materi'])->name('internal_tutor.class.materi');

        Route::get('/internal/class/quest/{slug}', [ClassController::class, 'quest'])->name('internal_tutor.class.quest');
        Route::get('internal/class/question/download_template', [ClassController::class, 'download_template_question_import'])->name('internal_tutor.class.quest.download_template_question_import');

        Route::get('/internal/class/project/{slug}', [ClassController::class, 'project'])->name('internal_tutor.class.project');

        // Edit Informasi Class
        Route::get('/internal/class/informasi/edit/{slug}', [ClassController::class, 'edit'])->name('internal_tutor.class.informasi.edit');
        
        //  Input Class Informasi
        Route::post('/internal/class/storeInformasi/{slug?}', [ClassController::class, 'storeInformasi'])->name('internal_tutor.class.storeInformasi');
        //  Input Class Materi
        Route::post('/internal/class/storeMateri/{slug}', [ClassController::class, 'storeMateri'])->name('internal_tutor.class.storeMateri');

        //  edit Class Informasi
        Route::post('/internal/class/updateInformasi/{slug}', [ClassController::class, 'updateInformasi'])->name('internal_tutor.class.updateInformasi');
        //  edit Class Materi
        Route::post('/internal/class/{slug}/updateMateri/{id}', [ClassController::class, 'updateMateri'])->name('internal_tutor.class.updateMateri');

        // Input Quest
        Route::post('internal/class/quest/question/import', [ClassController::class, 'import_quiz_question'])->name('internal.quest.question.import');

        // Update Profile Tutor
        Route::post('/internal/tutor/profile/update/{id}', [TutorController::class, 'updateProfile'])->name('internal_tutor.post.updateProfile');
        Route::post('/internal/tutor/profile/updatePassword/{id}', [TutorController::class, 'updatePassword'])->name('internal_tutor.post.updatePassword');


    });
});


