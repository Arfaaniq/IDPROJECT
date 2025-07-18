<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\KalenderController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\VerifyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\InstagramEmbedController;

// Admin Authentication Routes (Guest)
Route::middleware('guest:admin')->group(function () {
    Route::prefix('admin')->group(function () {
        // Login Routes
        Route::get('login', [LoginController::class, 'create'])->name('admin.login');
        Route::post('login', [LoginController::class, 'store']);
        
        // Registration Routes (jika diperlukan)
        Route::get('register', [RegisteredUserController::class, 'create'])->name('admin.register');
        Route::post('register', [RegisteredUserController::class, 'store']);
    });
});

// Admin Authenticated Routes
Route::prefix('admin')->middleware('auth:admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Profile Management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Verification Routes
    Route::get('/verifikasi', [VerifyController::class, 'index'])->name('verifikasi');
    Route::post('/verifikasi/{id}/onProgress', [VerifyController::class, 'onProgress'])->name('verifikasi.onProgress');
    Route::post('/verifikasi/{id}/finish', [VerifyController::class, 'finish'])->name('verifikasi.finish');
    Route::post('/verifikasi/cancel/{id}', [VerifyController::class, 'cancel'])->name('verifikasi.cancel');
    Route::post('/verifikasi/{id}/approve', [VerifyController::class, 'approve'])->name('verifikasi.approve');
    Route::post('/verifikasi/{id}/reject', [VerifyController::class, 'reject'])->name('verifikasi.reject');
    
    // History Routes
    Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat');
    Route::post('/riwayat/upload-invoice/{id}', [RiwayatController::class, 'uploadInvoice'])->name('riwayat.upload.invoice');
    
    // Event Management
    Route::get('/events-all', [EventController::class, 'listAllEvents'])->name('events.all');
    Route::get('/events/list', [EventController::class, 'listEvent'])->name('events.list');
    Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');
    Route::resource('events', EventController::class);
    
    // Project Management
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
    Route::get('/projects.index', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/projects/add', [ProjectController::class, 'store'])->name('projects.store');
    Route::delete('/projects/{project}/delete', [ProjectController::class, 'destroy'])->name('projects.destroy');
    
    // Instagram Embed Management
    Route::get('/instagram', [InstagramEmbedController::class, 'index'])->name('instagram.index');
    Route::post('/instagram', [InstagramEmbedController::class, 'store'])->name('instagram.store');
    Route::get('/instagram/{embed}/edit', [InstagramEmbedController::class, 'edit'])->name('instagram.edit');
    Route::put('/instagram/{embed}', [InstagramEmbedController::class, 'update'])->name('instagram.update');
    Route::delete('/instagram/{embed}', [InstagramEmbedController::class, 'destroy'])->name('instagram.destroy');
    
    // Logout
    Route::post('logout', [LoginController::class, 'destroy'])->name('logout');
});