<?php

namespace App\Http\Controllers;

use App\Http\Requests\IdeaRequest;
use App\Models\Idea;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class IdeaController extends Controller
{
    /**
     * index Display a listing of the resource.
     */
    public function index()
    {

        // dd('hello'); sanity check to see if it reaches controller

        // enne kui modelis on lisatud seos useri ja idee vahel
        // $ideas = Idea::query()->where([
        //     'User_id' => Auth::id(),
        // ])->get();

        // inlined järgmise sisse otse
        // $ideas = Auth::user()->ideas;

        return view('ideas.index', [
            'ideas' => Auth::user()->ideas,
        ]);
    }

    /**
     * Create - form for creating a new resource.
     */
    public function create()
    {
        // !!! NÄIDIS et ainult admin saab luua ideid
        // peab olema Idea::class mitte $idea sest veel ei ole loodud ideed, aga gate peab teadma millise policiga see kokku läheb
        // Gate::authorize('create', Idea::class);

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

        // Idea::create([
        //     'description' => request('description'),
        //     'state' => 'pending',
        //     'user_id' => Auth::id(),
        // ]);

        // mingid versioonid mida chat pakkus
        // /** @var User $user */
        // $user = Auth::user();

        // $user->ideas()->create([
        //     'description' => request('description'),
        //     'state' => 'pending',
        // ]);

        // $request->user()->ideas()->create([
        //     'description' => $request->description,
        //     'state' => 'pending',
        // ]);

        Auth::user()->ideas()->create([
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
        Gate::authorize('update', $idea);

        // läheb kokku selle teise asjaga, mis oli @can ja smth like that
        // if (Auth::user()->cannot('update', $idea)) {
        //     dd('go away BOB!!!');
        // // siin saab siis nt auth erroreid panna või logida midagi vms
        // }

        return view('ideas.show', [
            'idea' => $idea,
        ]);
    }

    /**
     * Edit - form for editing the specified resource.
     */
    public function edit(Idea $idea)
    {
        Gate::authorize('update', $idea);

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

        Gate::authorize('update', $idea);

        $idea->update([
            'description' => request('description'),
        ]);

        return redirect("/ideas/{$idea->id}");
    }

    /**
     * Destroy - Remove the specified resource from storage.
     */
    public function destroy(Idea $idea)
    {
        Gate::authorize('update', $idea);

        $idea->delete();

        return redirect('/ideas');
    }
}
