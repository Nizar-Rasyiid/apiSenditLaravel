<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PaymentController;

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

Route::get('/user/{id}', [UserController::class, 'getUser']);
Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);

// Route::get('/pemesanan/{id}', [PemesananController::class, 'show']);
Route::get('/pemesanans', [PemesananController::class, 'index']);
Route::post('/pemesanan', [PemesananController::class, 'store']);
Route::put('/pemesanan/{id}', [PemesananController::class, 'update']);
Route::delete('/pemesanan/{id}', [PemesananController::class, 'delete']);

Route::get('/payment/{id}', [PaymentController::class, 'getPayment']);
Route::get('/payments', [PaymentController::class, 'index']);
Route::post('/payment', [PaymentController::class, 'create']);
Route::put('/payment/{id}', [PaymentController::class, 'update']);
Route::delete('/payment/{id}', [PaymentController::class, 'delete']);