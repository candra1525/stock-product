<?php

use App\Http\Controllers\ProductResourceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/allproduct', [ProductResourceController::class ,'index']);
Route::get('/addproduct', [ProductResourceController::class ,'addprod']);
Route::post('/saveproduct', [ProductResourceController::class ,'store']);
Route::get('/product/{id}', [ProductResourceController::class ,'show']);
Route::get('/editprod/{id}', [ProductResourceController::class ,'showForEdit']);
Route::patch('/updateproduct/{id}', [ProductResourceController::class ,'update']);
Route::delete('/deleteproduct/{id}', [ProductResourceController::class ,'destroy']);