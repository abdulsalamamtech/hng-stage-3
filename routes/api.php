<?php

use App\Http\Controllers\AiAgentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');




// AI agent
Route::apiResource('agents', AiAgentController::class);
