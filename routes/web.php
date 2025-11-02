<?php


use App\Http\Controllers\AiAgentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// A chat bot that answers medical emergency related questions only, just tips on what to do based on described emergency.
// Name: Emergent Assistant Title: Emergency Tips
// Job: A chat bot that answers medical emergency related questions & help with tips!
Route::get('/agent', [AiAgentController::class, 'store']);
