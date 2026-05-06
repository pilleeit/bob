<?php

namespace App\Http\Controllers;

use App\Http\Requests\IdeaRequest;
use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    /**
     * index Display a listing of the resource.
     */
    public function index()
    {
        // dd('hello'); sanity check to see if it reaches controller
        $ideas = Idea::all();

        return view('ideas.index', [
            'ideas' => $ideas,
        ]);
    }

    /**
     * Create - form for creating a new resource.
     */
    public function create()
    {
        return view('ideas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    // kuna storeIdeaReq extendib recuest classi siis saab selle välja vahetada ja validation tehakse automaatselt sest seee on classis defineeritud
    public function store(IdeaRequest $request)
    {
        // dd($request->all());

        // $request->validate([
        //     'description' => ['required', 'min:10'],
        // ]);

        Idea::create([
            'description' => request('description'),
            'state' => 'pending',
        ]);

        return redirect('/ideas');
    }

    /**
     * Show - Display the specified resource.
     */
    public function show(Idea $idea)
    {
        return view('ideas.show', [
            'idea' => $idea,
        ]);
    }

    /**
     * Edit - form for editing the specified resource.
     */
    public function edit(Idea $idea)
    {
        return view('ideas.edit', [
            'idea' => $idea,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(IdeaRequest $request, Idea $idea)
    {
        // kui kasutame klassi ideaRew siis seal see validation on juba sees
        // $idea->update([
        //     'description' => request('description'),
        // ]);

        return redirect("/ideas/{$idea->id}");
    }

    /**
     * Destroy - Remove the specified resource from storage.
     */
    public function destroy(Idea $idea)
    {

        $idea->delete();

        return redirect('/ideas');
    }
}
