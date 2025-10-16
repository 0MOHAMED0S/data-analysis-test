<?php

use App\Http\Controllers\SaleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/data-analysis', [SaleController::class, 'index']);

Route::middleware('api.token')->get('/data-analysis-secure', [SaleController::class, 'test']);
