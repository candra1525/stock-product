<?php

use App\Http\Controllers\ProductApiController;
use App\Http\Controllers\SupplierApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/product', [ProductApiController::class ,'index']);
Route::post('/product', [ProductApiController::class ,'store']);
Route::get('/product/{id}', [ProductApiController::class ,'show']);
Route::put('/product/{id}', [ProductApiController::class ,'update']);
Route::delete('/product/{id}', [ProductApiController::class ,'destroy']);

Route::get('/supplier', [SupplierApiController::class ,'index']);
Route::post('/supplier', [SupplierApiController::class ,'store']);
Route::get('/supplier/{id}', [SupplierApiController::class ,'show']);
Route::put('/supplier/{id}', [SupplierApiController::class ,'update']);
Route::delete('/supplier/{id}', [SupplierApiController::class ,'destroy']);