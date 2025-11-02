<?php


use App\Http\Controllers\AiAgentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});


// A chat bot that answers medical emergency related questions only, just tips on what to do based on described emergency.
// Name: Emergent Assistant Title: Emergency Tips
// Job: A chat bot that answers medical emergency related questions & help with tips!
Route::get('/agent', [AiAgentController::class, 'store']);









Route::get('/test', function () {
    return [
        'message' => 'testing application',
        'date' => now()
    ];
});




Route::get('/artisan', function () {
    Artisan::call('inspire');
    Artisan::call('optimize:clear');
    Artisan::call('migrate');
    Artisan::call('db:seed');
    Artisan::call('optimize');
    Artisan::call('inspire');
    return "Artisan commands executed successfully.";
});

Route::get('/fresh', function () {
    Artisan::call('inspire');
    Artisan::call('optimize:clear');
    Artisan::call('migrate:fresh');
    Artisan::call('db:seed');
    Artisan::call('optimize');
    Artisan::call('inspire');
    return "Database refreshed successfully.";
});


Route::get('/run', function (Request $request) {
    if (!$request->filled('query')) {
        return "No query parameter provided.";
    }
    $query = $request->input('query');
    Artisan::call($query);
    Artisan::call('inspire');
    return "command executed";
});
