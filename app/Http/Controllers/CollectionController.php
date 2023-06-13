<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Game;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $collections = $user->collections()->with(['games','games.categories','games.platforms'])->paginate(10);
        $user->collections = $collections;
        return $user;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        $collection = $user->collections()->create($request->all());
        return $collection;
    }

    /**
     * Display the specified resource.
     */
    public function show(Collection $collection)
    {
        return $collection->load(['games']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Collection $collection)
    {
        $collection->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Collection $collection)
    {
        $collection->delete();
    }

    public function addGame(Request $request, Collection $collection)
    {
        $user = auth()->user();
        if ($user->id !== $collection->user_id) {
            abort(403);
        }
        $collection->games()->attach($request->game_id);
    }

    public function removeGame(Request $request, Collection $collection, Game $game)
    {
        $user = auth()->user();
        if ($user->id !== $collection->user_id) {
            abort(403);
        }
        $collection->games()->detach($game);
    }
}
