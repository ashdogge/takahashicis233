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
    $showNumber = intval(request()->query('showNumber'));
    //Default to 1 if shownumber is invalid
    $showNumber = $showNumber < 1 ? 1 : $showNumber;
    $episodes = TvMazeAPI::fetch($showNumber);
    $showName = TvMazeAPI::fetchShowName($showNumber);
    return view('episodes/index', ['episodes' => $episodes, 'showName' => $showName]);

});