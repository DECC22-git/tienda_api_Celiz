<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductsController;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('/products', \App\Http\Controllers\Api\ProductsController::class);
Route::apiResource('/categories', \App\Http\Controllers\Api\CategoriesController::class);
Route::apiResource('/clients', \App\Http\Controllers\Api\clientsController::class);

