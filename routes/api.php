<?php

use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\api\NoticiaApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('noticias', NoticiaApiController::class)
    ->middleware('auth:sanctum');

Route::post('/login', [AuthApiController::class, 'login']);

Route::post('/logout', [AuthApiController::class, 'logout'])
    ->middleware('auth:sanctum');

Route::apiResource('noticias', NoticiaApiController::class)->only(['index', 'show']);

Route::apiResource('noticias', NoticiaApiController::class)->only(['index', 'show'])->middleware('auth:sanctum');
