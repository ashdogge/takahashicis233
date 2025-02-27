<?php

use App\Http\Controllers\ProductsGet;
use App\Http\Controllers\SearchProductsGet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/products', ProductsGet::class);
Route::get('/search', SearchProductsGet::class);
