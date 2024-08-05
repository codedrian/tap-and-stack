<?php

namespace App\Http\Controllers;

use App\Http\Requests\BetRequest;
use App\Models\Bet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;


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
    public function create(BetRequest $request, Event $event)
    {
        /*TODO:
            1. Randomize the result */
        $validated = $request->validated();
        $available_balance = $validated['available_balance'];
        $new_balance = 0;
        $net_winnings = 0;

        if ($validated['bet'] == 'Low Risk') {
            $net_winnings = rand(-25, 100);
            $new_balance = $available_balance + $net_winnings;
        } elseif ($validated['bet'] == 'Moderate Risk') {
            $net_winnings = rand(-100, 1000);
            $new_balance = $available_balance + $net_winnings;
        } elseif ($validated['bet'] == 'High Risk') {
            $net_winnings = rand(-500, 2500);
            $new_balance = $available_balance + $net_winnings;
        } elseif ($validated['bet'] == 'Severe Risk') {
            $net_winnings = rand(-3000, 5000);
            $new_balance = $available_balance + $net_winnings;
        }
        /*Note: Save into db*/
        $bet = Bet::create([
            'user_id' => $validated['user_id'],
            'bet' => $validated['bet'],
            'net_winnings' => $net_winnings,
            'available_balance' => $validated['available_balance'],
            'new_balance' => $new_balance
        ]);
        $user = User::find($validated['user_id']);
        $user->balance = $bet->new_balance;
        $user->save();
        $result = $user->bets()->orderBy('id', 'desc')->get();

        return response()->json([
            'result' => $result,
            'new_balance' => $bet->new_balance
        ], 201);
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
