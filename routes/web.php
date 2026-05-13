<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\SessionsController;
use App\Http\Controllers\IdeaController;
use App\Models\Idea;
// use Illuminate\Support\Facades\DB; !!siin ei kasuta db fasaadi
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'Placeholder for home page';
});

Route::middleware('auth')->group(function () {
    // index aka main page
    Route::get('/ideas', [IdeaController::class, 'index'])->middleware('auth');

    // create aka form for creating idea
    Route::get('/ideas/create', [IdeaController::class, 'create']);

    // store
    Route::post('/ideas', [IdeaController::class, 'store']);

    // show aka single idea
    Route::get('/ideas/{idea}', [IdeaController::class, 'show']);

    // edit aka form for idea
    Route::get('/ideas/{idea}/edit', [IdeaController::class, 'edit']);

    // update aka form saatmine ehk toimub peale nupu vajutamist
    Route::patch('/ideas/{idea}', [IdeaController::class, 'update']);

    // destroy
    Route::delete('/ideas/{idea}', [IdeaController::class, 'destroy']);

    // temporary to try it out
    // Route::get('/delete-ideas', function () {
    //     // session()->forget('ideas');
    //     Idea::truncate();

    //     return redirect('/ideas');
    // });

    Route::delete('/logout', [SessionsController::class, 'destroy']);
});

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create']);
    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get('/login', [SessionsController::class, 'create'])->name('login');
    Route::post('/login', [SessionsController::class, 'store']);
});
