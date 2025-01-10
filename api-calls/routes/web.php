<?php

use App\Http\Controllers\ProfileController;
use App\Models\TvMazeAPI;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/episodes', function () {
    $showNumber = intval(request()->query(('showNumber')));
    $shownumber = $showNumber < 1 ? 10 : $showNumber;
    $episodes = TvMazeAPI::fetch($showNumber);
    return view('episodes/index', ['episodes' => $episodes]);

});