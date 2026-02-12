<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ProfileController;

// Guest Routes (Belum Login)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/test', function () {
    return 'OK';
})->name('test');

// Authenticated Routes (Sudah Login)
Route::middleware(['auth'])->group(function () {
    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Dashboard
    Route::get('/', function () {
        return view('home');
    })->name('home');
    
    // CRUD Product (Resource)
    Route::resource('product', ProductController::class);
    
    // CRUD Category (Resource)
    Route::resource('category', CategoryController::class);
    
    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show'); // ✅ Tambahkan ini
    Route::get('/profile/create', [ProfileController::class, 'create'])->name('profile.create');
    Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

// Transaction Routes (Staff & Admin)
Route::middleware(['auth', 'staff'])->group(function () {
    Route::get('/transaction', [TransactionController::class, 'index'])->name('transaction.index');
    Route::get('/transaction/create', [TransactionController::class, 'create'])->name('transaction.create');
    Route::post('/transaction', [TransactionController::class, 'store'])->name('transaction.store');
    Route::get('/transaction/{id}', [TransactionController::class, 'show'])->name('transaction.show');
});