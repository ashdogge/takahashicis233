<?php

use App\Http\Controllers\ProfileController;
use App\Models\TvMazeAPI;
use Illuminate\Support\Facades\Route;
use App\Models\Episode;
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

Route::get('/load-episodes', function () {
    $showNumber = intval(request()->query('showNumber'));
    //Default to 1 if shownumber is invalid
    $showNumber = $showNumber < 1 ? 1 : $showNumber;
    $episodes = TvMazeAPI::fetch($showNumber);
    $showName = TvMazeAPI::fetchShowName($showNumber);
    return view('episodes/index', ['episodes' => $episodes, 'showName' => $showName]);

});

Route::get('/view-episodes', function () {
    $showNumber = intval(request()->query('showNumber'));
    $showNumber = $showNumber < 1 ? 1 : $showNumber;
    // Eloquent Model database lookup that loads all the episodes from 
    // the database where show number field is equal to the showNumber value from the query string.
    $episodes = Episode::where('show_number', $showNumber)->get();
    $showName = TvMazeAPI::fetchShowName(showNumber: $showNumber);
    return view('episodes/index', ['episodes' => $episodes, 'showName' => $showName, 'showNumber' => $showNumber]);

});