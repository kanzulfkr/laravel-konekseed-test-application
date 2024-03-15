<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BusinessController;
use App\Http\Controllers\Api\BusinessTargetController;
use App\Http\Controllers\Api\ProductController;
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

// auth controller
Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/logout',  [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::get('/auth/user',  [AuthController::class, 'user'])->middleware('auth:sanctum');

// products controller
Route::get('/products',  [ProductController::class, 'index'])->middleware('auth:sanctum');

// bbusiness controller
Route::get('/business',  [BusinessController::class, 'index'])->middleware('auth:sanctum');
Route::post('/business/store',  [BusinessController::class, 'store'])->middleware('auth:sanctum');
Route::put('/business/update/{id}',  [BusinessController::class, 'update'])->middleware('auth:sanctum');
Route::put('/business/update-status/{id}', [BusinessController::class, 'updateStatus'])->middleware('auth:sanctum');
Route::delete('/business/delete/{id}',  [BusinessController::class, 'destroy'])->middleware('auth:sanctum');

// targets controller
Route::get('/targets',  [BusinessTargetController::class, 'index'])->middleware('auth:sanctum');
Route::post('/targets/store',  [BusinessTargetController::class, 'store'])->middleware('auth:sanctum');
Route::put('/targets/update/{id}',  [BusinessTargetController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/targets/delete/{id}',  [BusinessTargetController::class, 'destroy'])->middleware('auth:sanctum');
