<?php

use App\Models\Idea;
// use Illuminate\Support\Facades\DB; !!siin ei kasuta db fasaadi
use Illuminate\Support\Facades\Route;

// index aka main page
Route::get('/ideas', function () {
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

    // laravel eloquent - https://laravel.com/docs/13.x/eloquent
    // $ideas = Idea::query()
    //     ->when(request('state'), function ($query, $state) {
    //         // dd($state);
    //         $query->where('state', $state);
    //     })
    //     ->get();

    $ideas = Idea::all();

    return view('ideas.index', [
        'ideas' => $ideas,
    ]);
});

// show aka single idea
Route::get('/ideas/{idea}', function (Idea $idea) {
    // dd($id);
    // $idea = Idea::findOrFail($id); // kui midagi ei leia siis tagastab null, aga seda saab teha ka üleval vahetades id to idea

    // return $idea; // et kontrollida jsonis kas tuleb tagasi

    // dd($idea);

    return view('ideas.show', [
        'idea' => $idea,
    ]);
});

// edit aka form for idea
Route::get('/ideas/{idea}/edit', function (Idea $idea) {
    return view('ideas.edit', [
        'idea' => $idea,
    ]);
});

// update aka form saatmine ehk toimub peale nupu vajutamist
Route::patch('/ideas/{idea}', function (Idea $idea) {
    $idea->update([
        'description' => request('description'),
    ]);

    return redirect("/ideas/{$idea->id}");
});

// store
Route::post('/ideas', function () {
    // dd('Hello!');
    // dd(request()->all());

    // $idea = request('idea');

    // session()->push('ideas', $idea); ei kasuta sessiooni enam

    Idea::create([
        'description' => request('description'),
        'state' => 'pending',
    ]);

    return redirect('/ideas');
});

// destroy
Route::delete('/ideas/{idea}', function (Idea $idea) {

    $idea->delete();

    return redirect('/ideas');
});

// temporary to try it out
// Route::get('/delete-ideas', function () {
//     // session()->forget('ideas');
//     Idea::truncate();

//     return redirect('/ideas');
// });
