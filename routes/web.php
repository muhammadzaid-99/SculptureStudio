<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Models\Service;

// Routes for Visitors
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/services', [ServiceController::class, 'index'])->name('services');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');


// Route to dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
// Service Routes
Route::get('/dashboard/services/create', [ServiceController::class, 'create'])->middleware(['auth', 'verified'])->name('service.create');
Route::post('/dashboard/services/store', [ServiceController::class, 'store'])->middleware(['auth', 'verified'])->name('service.store');
Route::put('/dashboard/services/{service}', [ServiceController::class, 'update'])->middleware(['auth', 'verified'])->name('service.update');
Route::delete('/dashboard/services/{service}', [ServiceController::class, 'destroy'])->middleware(['auth', 'verified'])->name('service.destroy');

// Product Routes
Route::get('/dashboard/products/create', [ProductController::class, 'create'])->middleware(['auth', 'verified'])->name('product.create');
Route::post('/dashboard/products/store', [ProductController::class, 'store'])->middleware(['auth', 'verified'])->name('product.store');
Route::put('/dashboard/products/{product}', [ProductController::class, 'update'])->middleware(['auth', 'verified'])->name('product.update');
Route::delete('/dashboard/products/{product}', [ProductController::class, 'destroy'])->middleware(['auth', 'verified'])->name('product.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__ . '/auth.php';
