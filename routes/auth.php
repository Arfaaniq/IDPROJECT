<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\VerifyController;
use App\Http\Controllers\CustomerController;

// Web Authentication Routes (Guest)
Route::prefix('web')->middleware('guest:web')->group(function () {
    // Registration Routes
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
    
    // Login Routes
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

// Web Authenticated Routes
Route::prefix('web')->middleware('auth:web')->group(function () {
    // Order Service Routes
    Route::get('/orderservice', [VerifyController::class, 'showOrderForm'])->name('orderservice.form');
    Route::post('/orderservice', [VerifyController::class, 'order'])->name('orderservice');
    
    // Customer Status & Invoice Routes
    Route::get('/customer/status', [CustomerController::class, 'status'])->name('customer.status');
    Route::get('/invoice/download/{order}', [CustomerController::class, 'downloadInvoice'])->name('invoice.download');
    
    // Logout Routes (duplicate removed)
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});