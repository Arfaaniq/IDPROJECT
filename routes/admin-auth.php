<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\KalenderController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\VerifyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\InstagramEmbedController;

Route::prefix('admin')->middleware('guest:admin')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('admin.register');
    Route::post('register', [RegisteredUserController::class, 'store']);
    Route::get('login', [LoginController::class, 'create'])->name('admin.login');
    Route::post('login', [LoginController::class, 'store']);
    
    // Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    // Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
    // Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    // Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.store');
});

Route::prefix('admin')->middleware('auth:admin')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('admin.dashboard');


    // Route::get('verify-email', EmailVerificationPromptController::class)->name('verification.notice');
    // Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
    // Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    //             ->middleware('throttle:6,1')
    //             ->name('verification.send');
    // Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password.confirm');

    // Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    // Route::put('password', [PasswordController::class, 'update'])->name('password.update');
    // admin.dashboard

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Riwayat
    Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat');
    Route::post('/riwayat/upload-invoice/{id}', [RiwayatController::class, 'uploadInvoice'])->name('riwayat.upload.invoice');

    // routes kalender yang baru dibuat
    Route::get('/events-all', [EventController::class, 'listAllEvents'])->name('events.all'); // route baru untuk filter penambahan
    Route::get('/events/list', [EventController::class, 'listEvent'])->name('events.list');
    Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');
    Route::resource('events', EventController::class);
    // Route::get('kalender', [KalenderController::class, 'index'])->name('kalender.index');
    // routes kalender list eventnya
    // Route::get('/kalenders/list',[KalenderController::class, 'listKalender'])->name('kalenders.list');
    // Route::get('/kalenders/create', [KalenderController::class, 'create'])->name('kalenders.create');
    // Route::post('/kalenders/store', [KalenderController::class, 'store'])->name('kalenders.store');

    Route::get('/verifikasi', [VerifyController::class, 'index'])->name('verifikasi');
    Route::post('/verifikasi/{id}/onProgress', [VerifyController::class, 'onProgress'])->name('verifikasi.onProgress');
    // Route untuk menandai verifikasi sebagai selesai
    Route::post('/verifikasi/{id}/finish', [VerifyController::class, 'finish'])->name('verifikasi.finish');
    Route::post('/verifikasi/cancel/{id}', [VerifyController::class, 'cancel'])->name('verifikasi.cancel');
    Route::get('/verifikasi', [VerifyController::class, 'index'])->name('verifikasi');
    Route::post('/verifikasi/{id}/approve', [VerifyController::class, 'approve'])->name('verifikasi.approve');
    Route::post('/verifikasi/{id}/reject', [VerifyController::class, 'reject'])->name('verifikasi.reject');

    Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
    Route::get('/projects.index', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/projects/add', [ProjectController::class, 'store'])->name('projects.store');
    Route::delete('/projects/{project}/delete', [ProjectController::class, 'destroy'])->name('projects.destroy');

    // routes kalender events
    // Route::get('/events/list', [EventController::class, 'listEvent'])->name('events.list');
    // Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    // Route::post('/events/store', [EventController::class, 'store'])->name('events.store');
    // Route::resource('events', EventController::class);

    Route::get('/instagram', [InstagramEmbedController::class, 'index'])->name('instagram.index');
    Route::post('/instagram', [InstagramEmbedController::class, 'store'])->name('instagram.store');
    Route::get('/instagram/{embed}/edit', [InstagramEmbedController::class, 'edit'])->name('instagram.edit');
    Route::put('/instagram/{embed}', [InstagramEmbedController::class, 'update'])->name('instagram.update');
    Route::delete('/instagram/{embed}', [InstagramEmbedController::class, 'destroy'])->name('instagram.destroy');

    Route::post('logout', [LoginController::class, 'destroy'])
        ->name('admin.logout');
});