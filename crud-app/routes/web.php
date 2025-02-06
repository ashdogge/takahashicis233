<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminProductController;
Route::resource('products', ProductController::class)->only('index', 'show');


Route::get('/', function () {
    return view('welcome');
});
//Routes for all methods in ProductController
//It's beautiful...
Route::resource('products', ProductController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Create admincontroller 
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('products', AdminProductController::class);
    });
});


require __DIR__ . '/auth.php';
