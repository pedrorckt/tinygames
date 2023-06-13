<?php

namespace App\Http\Controllers;

use App\Models\Platform;
use Illuminate\Http\Request;

class PlatformController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $platforms = Platform::paginate(20);
        return $platforms;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $platform = Platform::create($request->all());
        return $platform;
    }

    /**
     * Display the specified resource.
     */
    public function show(Platform $platform)
    {
        $games = $platform->games()->paginate(8);
        $platform->games = $games;
        return $platform;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Platform $platform)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Platform $platform)
    {
        //
    }
}
