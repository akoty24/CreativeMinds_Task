<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LocationController;
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


Route::post('register', [AuthController::class, 'register']);
Route::post('verify-otp', [AuthController::class, 'verifyOtp']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
Route::get('profile', [AuthController::class, 'profile']);
// Route::post('/calculate-distance', [LocationController::class, 'calculateDistance']);
// Route::get('distance', [LocationController::class, 'getDistance']);
Route::get('nearest-representatives', [LocationController::class, 'nearestRepresentatives']);
});