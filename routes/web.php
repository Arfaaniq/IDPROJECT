<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\IdProject;
use App\Http\Controllers\VerifyController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\HomeUserController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BlogdetailController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\BlogAdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CustomerProjectController;
use App\Http\Controllers\InstagramEmbedController;

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


Route::get('/', function () { return view('welcome'); })->name('welcome');
Route::get('/home', [HomeUserController::class, 'index'])->name('home');
Route::get('/About', [AboutController::class, 'index'])->name('about');
Route::get('/Service', [ServiceController::class, 'index'])->name('service');
Route::get('/Blog', [BlogController::class, 'index'])->name('blog');
Route::get('/BlogDetail', [BlogDetailController::class, 'index'])->name('blogdetail');
Route::get('/Contact', [ContactController::class, 'index'])->name('contact');
Route::get('/projects', [CustomerProjectController::class, 'index'])->name('customer.projects');



Route::prefix('admin')->middleware('auth:admin')->name('admin.')->group(function () {
    Route::resource('blog', BlogAdminController::class);
});
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/blog-search', [BlogController::class, 'search'])->name('blog.search');
Route::post('/comments/{blog}', [CommentController::class, 'store'])->name('comments.store');


Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Di routes/web.php
Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // ... route admin lainnya
});
// Route::get('/', function () {
//     Mail::to('arfaaniqsabila474@gmail.com')
//     ->send(new IdProject());
//     return view('auth.login');
// });

// Route untuk menampilkan form (GET)
Route::middleware('auth:web')->group(function () {
    Route::get('/orderservice', [VerifyController::class, 'showOrderForm'])->name('orderservice.form');
    Route::post('/orderservice', [VerifyController::class, 'order'])->name('orderservice');
});

//mail
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

//Embed IG
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/instagram', [InstagramEmbedController::class, 'index'])->name('instagram.index');
    Route::post('/instagram', [InstagramEmbedController::class, 'store'])->name('instagram.store');
    Route::get('/instagram/{embed}/edit', [InstagramEmbedController::class, 'edit']) ->name('instagram.edit');
    Route::put('/instagram/{embed}', [InstagramEmbedController::class, 'update'])->name('instagram.update');
    Route::delete('/instagram/{embed}', [InstagramEmbedController::class, 'destroy'])->name('instagram.destroy');
});

// Setelah login akan masuk ke halaman verifikasi

// Halaman welcome setelah login
Route::get('/orderservice', [AuthController::class, 'welcome'])->name('orderservice')->middleware('auth');

// bahasa
Route::get('/lang/{locale}', function ($locale) {
    if (! in_array($locale, ['id', 'en'])) abort(400);
    session(['locale' => $locale]);
    return redirect()->back();
})->name('change.language');



//Customer status
Route::get('/customers/status', [CustomerController::class, 'status'])->name('customer/status')->middleware('auth.login');

Route::put('/admin/history/{id}/notes', [App\Http\Controllers\RiwayatController::class, 'updateNotes'])->name('history.update.notes');

Route::get('/admin/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');

require __DIR__ . '/auth.php';
require __DIR__ . '/admin-auth.php';

// bismillah 12
