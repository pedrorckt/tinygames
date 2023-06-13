<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

use App\Services\TwitchApiService;

class GameController extends Controller
{

    private $twitch;

    public function __construct(TwitchApiService $twitch)
    {
        $this->twitch = $twitch;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $games = Game::with(['categories','platforms'])->paginate(8);
        return $games;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $game = Game::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        return $game->load(['categories','platforms','images']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Game $game)
    {
        $game->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        $game->delete();
    }

    public function search(Request $request)
    {
        $games = Game::search($request)->paginate(8);
        return $games;
    }

    public function twitchTopGames()
    {
        // Cache for 1 hour
        $ttl = 60 * 60 * 1;
        $twitch = $this->twitch;
        $games = \Cache::remember('twitch_top_games', $ttl, function () use ($twitch)  {
            return $twitch->getTopGames();
        });
        return $games;
    }

}
