<?php

use App\Models\Idea;
// use Illuminate\Support\Facades\DB; !!siin ei kasuta db fasaadi
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // $ideas = session()->get('ideas', []);

    // dd($ideas);

    // $ideas = DB::table('ideas')->get();

    // return $ideas[0]->description;

    // võta üks idee modeli kaudu?
    // $idea = Idea::find(1);
    // dd($idea); //tagastab kogu info
    // return $idea; // tagastab jasoni objekti

    // $ideas = Idea::where('state', 'pending')->get(); // kui tahta vaadata neid mis tegemata

    // $ideas = Idea::all(); // kui tahad kõiki saada

    $ideas = Idea::query()
        ->when(request('state'), function ($query, $state) {
            // dd($state);
            $query->where('state', $state);
        })
        ->get();

    return view('ideas', [
        'ideas' => $ideas,
    ]);
});

Route::post('/ideas', function () {
    // dd('Hello!');
    // dd(request()->all());

    // $idea = request('idea');

    // session()->push('ideas', $idea); ei kasuta sessiooni enam

    Idea::create([
        'description' => request('idea'),
        'state' => 'pending',
    ]);

    return redirect('/');
});

// temporary to try it out
Route::get('/delete-ideas', function () {
    session()->forget('ideas');

    return redirect('/');
});
