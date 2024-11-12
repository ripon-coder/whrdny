<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\HistoryController;
use App\Http\Controllers\Admin\MissionController;
use App\Http\Controllers\Admin\VissionController;
use App\Http\Controllers\Admin\OverviewController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ObjectiveController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdmissionFormController;
use App\Http\Controllers\Admin\BoardOfTrustController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DonationController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\FoundRaiseController;
use App\Http\Controllers\Admin\HowWeWorkController;
use App\Http\Controllers\Admin\JoiningController;
use App\Http\Controllers\Admin\PhotoGalleryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\VideoGalleryController;
use App\Http\Controllers\LearningController;

Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::controller(AdminProfileController::class)->group(function () {
        Route::get('/profile/update', 'profile')->name('profile');
        Route::post('/profile/update', 'updateProfile')->name('profile.update');
        Route::get('/profile/change-password', 'changePasswordPage')->name('changePasswordPage');
        Route::post('/profile/change-password', 'changePassword')->name('changePassword');
    });

    Route::controller(SettingsController::class)->group(function () {
        Route::get('/settings', 'setting')->name('setting');
        Route::post('/setting/update', 'updateSetting')->name('setting.update');
    });

    Route::resource('slider-admin',SliderController::class);
    Route::resource('brand-admin',BrandController::class);
    Route::resource('board-trust-admin',BoardOfTrustController::class);
    Route::resource('faq-admin',FaqController::class);
    Route::resource('fund-raise-admin',FoundRaiseController::class);
    Route::resource('posts',PostController::class);
    Route::resource('photo-gallery',PhotoGalleryController::class);
    Route::resource('video-gallery',VideoGalleryController::class);
    Route::resource('learning',LearningController::class);
    Route::resource('admission-form',AdmissionFormController::class);
    Route::get('join-request', [JoiningController::class, 'index'])->name('join-request');
    Route::get('contact-message', [ContactController::class, 'index'])->name('contact-message');
    Route::resource('donation-admin',DonationController::class);
    Route::resource('event-admin',EventController::class);

    Route::controller(MissionController::class)->group(function () {
        Route::get('/mission-admin', 'index')->name('mission');
        Route::post('/mission-admin', 'update')->name('mission.update');
    });

    Route::controller(VissionController::class)->group(function () {
        Route::get('/vission-admin', 'index')->name('vission');
        Route::post('/vission-admin', 'update')->name('vission.update');
    });

    Route::controller(ObjectiveController::class)->group(function () {
        Route::get('/objective-admin', 'index')->name('objective');
        Route::post('/objective-admin', 'update')->name('objective.update');
    });

    Route::controller(HistoryController::class)->group(function () {
        Route::get('/history-admin', 'index')->name('history');
        Route::post('/history-admin', 'update')->name('history.update');
    });

    Route::controller(OverviewController::class)->group(function () {
        Route::get('/overview-admin', 'index')->name('overview');
        Route::post('/overview-admin', 'update')->name('overview.update');
    });
    Route::controller(HowWeWorkController::class)->group(function () {
        Route::get('/how-we-work-admin', 'index')->name('howWork');
        Route::post('/how-we-work-admin', 'update')->name('howWork.update');
    });

});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});