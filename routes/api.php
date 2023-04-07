<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;

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

Route::controller(UserController::class)->group(function () {
    Route::get('user', 'index');
    Route::get(config('global.userId'), 'show');
    Route::post('user', 'store');
    Route::put(config('global.userId'), 'update');
    Route::delete(config('global.userId'), 'destroy');
});

Route::controller(OrderController::class)->group(function () {
    Route::get('orders', 'index');
    Route::get(config('global.orderId'), 'show');
    Route::post('orders', 'store');
    Route::put(config('global.orderId'), 'update');
    Route::delete(config('global.orderId'), 'destroy');
});
