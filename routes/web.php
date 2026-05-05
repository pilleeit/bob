<?php

use App\Http\Controllers\IdeaController;
use App\Models\Idea;
// use Illuminate\Support\Facades\DB; !!siin ei kasuta db fasaadi
use Illuminate\Support\Facades\Route;

// index aka main page
Route::get('/ideas', [IdeaController::class, 'index']);

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
