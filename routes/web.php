<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    ProfileController,
    VerifyController,
    CustomerController,
    AuthController,
    EventController,
    CommentController,
    CustomerProjectController,
    InstagramEmbedController,
    BlogAdminController
};
use App\Http\Controllers\Admin\{
    HomeUserController,
    AboutController,
    ServiceController,
    BlogController,
    BlogdetailController,
    ContactController
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Public Routes
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/home', [HomeUserController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/Service', [ServiceController::class, 'index'])->name('service');
Route::get('/Contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

// Blog Routes
Route::prefix('blog')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('blog');
    Route::get('/{id}', [BlogController::class, 'show'])->name('blog.show');
    Route::get('/search', [BlogController::class, 'search'])->name('blog.search');
    Route::post('/{blog}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::get('/detail', [BlogdetailController::class, 'index'])->name('blogdetail');
});

// Authentication Routes
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Authenticated User Routes
Route::middleware('auth:web')->group(function () {
    Route::prefix('orderservice')->group(function () {
        Route::get('/', [VerifyController::class, 'showOrderForm'])->name('orderservice.form');
        Route::post('/', [VerifyController::class, 'order'])->name('orderservice');
    });
    
    Route::get('/projects', [CustomerProjectController::class, 'index'])->name('customer.projects');
    Route::get('/customers/status', [CustomerController::class, 'status'])->name('customer/status');
});

// Language Route
Route::get('/lang/{locale}', function ($locale) {
    if (!in_array($locale, ['id', 'en'])) abort(400);
    session(['locale' => $locale]);
    return redirect()->back();
})->name('change.language');

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Public Admin Routes (login/register)
    Route::middleware('guest:admin')->group(function () {
        // These would typically be in admin-auth.php
    });

    // Authenticated Admin Routes
    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');
        
        Route::resource('blog', BlogAdminController::class);
        
        Route::prefix('instagram')->group(function () {
            Route::get('/', [InstagramEmbedController::class, 'index'])->name('instagram.index');
            Route::post('/', [InstagramEmbedController::class, 'store'])->name('instagram.store');
            Route::get('/{embed}/edit', [InstagramEmbedController::class, 'edit'])->name('instagram.edit');
            Route::put('/{embed}', [InstagramEmbedController::class, 'update'])->name('instagram.update');
            Route::delete('/{embed}', [InstagramEmbedController::class, 'destroy'])->name('instagram.destroy');
        });
        
        Route::put('/history/{id}/notes', [App\Http\Controllers\RiwayatController::class, 'updateNotes'])
            ->name('history.update.notes');
            
        Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
    });
});

// Include Auth Routes
require __DIR__ . '/auth.php';
require __DIR__ . '/admin-auth.php';