<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController as AuthForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/forgot-password', [AuthForgotPasswordController::class, 'sendResetLinkEmail']);
Route::post('/password-reset', [ResetPasswordController::class, 'reset'])->name('password.reset');


Route::get('/user/{id}', [UserController::class, 'getUser']);
Route::put('/userUpdate/{id}', [UserController::class, 'update']);
Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);
Route::post('/user/{id_user}/upload-image', [UserController::class, 'uploadImage']);

// Route::get('/pemesanan/{id}', [PemesananController::class, 'show']);
Route::get('/pemesanans', [PemesananController::class, 'index']);
Route::post('/pemesanan', [PemesananController::class, 'store']);
Route::put('/pemesanan/{id}', [PemesananController::class, 'update']);
Route::delete('/pemesanan/{id}', [PemesananController::class, 'delete']);
Route::prefix('pemesanan')->group(function () {
          Route::get('/', [PemesananController::class, 'index']);
          Route::post('/', [PemesananController::class, 'store']);
          Route::get('/{id}', [PemesananController::class, 'show']);
          Route::put('/{id}', [PemesananController::class, 'update']);
          Route::delete('/{id}', [PemesananController::class, 'destroy']);
          Route::patch('/{id}/status', [PemesananController::class, 'updateStatus']);
          Route::get('/pemesanan/{id_user}', [PemesananController::class, 'getPemesananByUserId']); 
          Route::get('/pemesanankurir/{id_kurir}', [PemesananController::class, 'getPemesananByKurirId']); 
      });
Route::get('/payments/{id}', [PaymentController::class, 'show']);
Route::get('/payments', [PaymentController::class, 'index']);
Route::post('/payments', [PaymentController::class, 'store']);
Route::put('/payments/{id}', [PaymentController::class, 'update']);
Route::delete('/payments/{id}', [PaymentController::class, 'destroy']);