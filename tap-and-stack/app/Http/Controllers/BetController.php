<?php

namespace App\Http\Controllers;

use App\Http\Requests\BetRequest;
use App\Models\Bet;
use Illuminate\Http\Request;

class BetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource/bet.
     */
    public function create(BetRequest $request)
    {
        $validated = $request->validated();
        if ($validated['bet'] == 'Low Risk') {
            dd('Low risk it is');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Bet $bet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bet $bet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bet $bet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bet $bet)
    {
        //
    }
}
