<?php

use App\Http\Controllers\Api\V1\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('V1')->middleware(['auth:sanctom'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout']);
});

Route::prefix('V1')->middleware(['throttle:60,1'])->group(function () {
   Route::post('/register', [AuthController::class, 'register']);
   Route::post('/login', [AuthController::class, 'login']);
});
