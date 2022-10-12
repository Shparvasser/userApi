<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('account', [\App\Http\Controllers\api\AccountController::class, 'index'])->name('account');
    Route::post('payment ', [\App\Http\Controllers\api\PaymentController::class, 'store'])->name('payment');
    Route::post('logout', [\App\Http\Controllers\api\Auth\AuthController::class, 'logout'])->name('logout');
});

Route::post('sign-in', [\App\Http\Controllers\api\Auth\AuthController::class, 'login'])->name('sign-in');
Route::post('sign-up', [\App\Http\Controllers\api\Auth\AuthController::class, 'register'])->name('sign-up');
