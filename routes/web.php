<?php

use App\Http\Controllers\studo\CheckoutController;
use App\Http\Controllers\studo\OverviewController;
use App\Http\Controllers\studo\AllController;
use App\Http\Controllers\studo\SettingController;
use App\Http\Controllers\studo\SiteController;
use App\Http\Controllers\studo\QuestController;
use App\Http\Controllers\studo\AuthController as StudoAuthController;

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\AuthController;

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

            Route::get('/all-class', [AllController::class, 'index'])->name('studo.all');

            Route::get('/overview/{slug}/{chapter_id?}', [OverviewController::class, 'index'])->name('studo.overview');

            Route::get('/checkout/{slug}', [CheckoutController::class, 'getCheckout'])->name('studo.checkout');
            Route::get('/checkout/upload-pembayaran/{slug}', [CheckoutController::class, 'getUpload'])->name('studo.checkout.upload');
            Route::post('/checkout/upload-pembayaran/{slug}/post', [CheckoutController::class, 'PostUpload'])->name('studo.checkout.upload.post');


            //  Post Data dari Popup Login
            Route::post('/login/{slug?}/{chapter_id?}', [App\Http\Controllers\studo\AuthController::class, 'postLogin'])->name('studo.post.login');
            
            // Post Data dari Popup Daftar
            Route::post('/regist/{slug?}/{chapter_id?}', [App\Http\Controllers\studo\AuthController::class, 'postSignup'])->name('studo.post.regist');


        Route::middleware('auth')->group(function () {

            Route::get('/signout', [App\Http\Controllers\studo\AuthController::class, 'getSignout'])->name('studo.post.signout');

            Route::get('/setting', [SettingController::class, 'index'])->name('studo.setting');
            Route::post('/setting/user/profile/update/{id}', [SettingController::class, 'updateProfile'])->name('studo.post.updateProfile');
            Route::post('/setting/user/profile/photo/update/{id}', [SettingController::class, 'updateProfilePhoto'])->name('studo.user.profile.update_photo');
            Route::post('/setting/user/profile/updatePassword/{id}', [SettingController::class, 'updatePassword'])->name('studo.post.updatePassword');
            
            Route::get('/quest/pretest/{slug}', [QuestController::class, 'indexPreTest'])->name('studo.pages.quest.pre-test');
            Route::post('/quest/pretest/{slug}/submit',  [QuestController::class, 'postPreTest'])->name('studo.pages.quest.pre-test.submit');
            Route::get('/quest/pretest/{slug}/result', [QuestController::class, 'resultPreTest'])->name('studo.pages.quest.pre-test.result');

            Route::get('/quest/posttest/{slug}', [QuestController::class, 'indexPostTest'])->name('studo.pages.quest.post-test');
            Route::post('/quest/posttest/{slug}/submit',  [QuestController::class, 'postPostTest'])->name('studo.pages.quest.post-test.submit');
            Route::get('/quest/posttest/{slug}/result', [QuestController::class, 'resultPostTest'])->name('studo.pages.quest.post-test.result');

            Route::post('/project/{slug}/{chapter_id?}/submit',  [OverviewController::class, 'postProject'])->name('studo.pages.project.submit');

            Route::post('/forum/{slug}/{chapter_id?}/submit',  [OverviewController::class, 'postForum'])->name('studo.pages.forum.submit');
            Route::post('/reply/forum/{slug}/{chapter_id?}/submit',  [OverviewController::class, 'postReplyForum'])->name('studo.pages.reply.forum.submit');
            Route::get('/signout', [App\Http\Controllers\studo\AuthController::class, 'getSignout'])->name('studo.post.signout');

        });
});

Route::namespace('internal')->group(function () {

    // Sebelum Login
    // Route::middleware('guest:users')->group(function () {
        Route::get('/internal', [App\Http\Controllers\internal\AuthController::class, 'getSignin'])->name('internal_tutor.signin');
        Route::post('/internal/post_signin', [App\Http\Controllers\internal\AuthController::class, 'postSignin'])->name('internal_tutor.post.signin');
        Route::get('/internal/signup', [App\Http\Controllers\internal\AuthController::class, 'getSignup'])->name('internal_tutor.signup');
        Route::post('/internal/post/signup', [App\Http\Controllers\internal\AuthController::class, 'postSignup'])->name('internal_tutor.post.signup');
    // });
    // Setelah Login
    Route::middleware('auth.users')->group(function () {

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
        //  Input Class Quest
        Route::post('/internal/class/storeQuest/{slug?}', [ClassController::class, 'storeQuest'])->name('internal_tutor.class.storeQuest');
        //  Input Class Project
        Route::post('/internal/class/storeProject/{slug?}', [ClassController::class, 'storeProject'])->name('internal_tutor.class.storeProject');


        //  edit Class Informasi
        Route::post('/internal/class/updateInformasi/{slug}', [ClassController::class, 'updateInformasi'])->name('internal_tutor.class.updateInformasi');
        //  edit Class Materi
        Route::post('/internal/class/{slug}/updateMateri/{id}', [ClassController::class, 'updateMateri'])->name('internal_tutor.class.updateMateri');
        //  edit Class Quest
        Route::post('/internal/class/{slug}/updateQuest/{id}', [ClassController::class, 'updateQuest'])->name('internal_tutor.class.updateQuest');
        //  edit Class Project
        Route::post('/internal/class/{slug}/updateProject/{id}', [ClassController::class, 'updateProject'])->name('internal_tutor.class.updateProject');

        //  Change status deactive class -> Active
        Route::post('/internal/class/{slug}/actived/class', [ClassController::class, 'activedClass'])->name('internal_tutor.class.actived');

        Route::post('/internal/tutor/nilai/proyek/{id}', [TutorController::class, 'beriNilaiProyek'])->name('internal_tutor.post.beriNilaiProyek');

        Route::post('/internal/profile/tarik/saldo/{id}', [TutorController::class, 'tarikSaldo'])->name('internal_tutor.post.tarikSaldo');

        // Input Quest
        Route::post('internal/class/quest/question/import', [ClassController::class, 'import_quiz_question'])->name('internal.quest.question.import');

        // Update Profile Tutor
        Route::post('/internal/tutor/profile/update/{id}', [TutorController::class, 'updateProfile'])->name('internal_tutor.post.updateProfile');
        Route::post('/internal/tutor/profile/photo/update/{id}', [TutorController::class, 'updateProfilePhoto'])->name('internal_tutor.post.profile.update_photo');
        Route::post('/internal/tutor/profile/updatePassword/{id}', [TutorController::class, 'updatePassword'])->name('internal_tutor.post.updatePassword');

        Route::get('/internal/tutor/get-forum/{classId}', [TabPanesController::class, 'getForum']);

    });

    // Admin
    Route::get('/internal/admin', [AuthController::class, 'index'])->name('admin.pages.auth.signin');
    Route::post('/internal/admin/regist', [AuthController::class, 'regist'])->name('admin.pages.auth.regist');
    
});
Route::middleware('auth.admin')->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.pages.dashboard.index');
    Route::post('/admin/dashboard/confirm/subscription/{id}', [DashboardController::class, 'confirmSubscription'])->name('studo.subscription.confirm');
    Route::post('/admin/dashboard/confirm/subscription/reject/{id}', [DashboardController::class, 'rejectSubscription'])->name('studo.subscription.reject');

    Route::post('/admin/dashboard/confirm/tarik/saldo/{id}', [DashboardController::class, 'confirmTarikSaldo'])->name('studo.TarikSaldo.confirm');
    Route::post('/admin/dashboard/confirm/tarik/saldo/reject/{id}', [DashboardController::class, 'rejectTarikSaldo'])->name('studo.tarik.saldo.reject');

    Route::post('/admin/dashboard/hapus/pengguna/{id}', [DashboardController::class, 'deletePengguna'])->name('studo.deletePengguna');
    Route::post('/admin/dashboard/hapus/kelas/{id}', [DashboardController::class, 'deleteKelas'])->name('studo.deleteKelas');



});


