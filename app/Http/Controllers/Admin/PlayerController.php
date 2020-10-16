<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePlayerRequest;
use App\Http\Requests\UpdatePlayerRequest;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class PlayerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $players = Player::paginate(20);

        return View::make('players/index', [
            'players' => $players
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('players/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlayerRequest $request)
    {
        $player = new Player();

        $player->name = $request->get('name');
        $player->age = $request->get('age');
        $player->country = $request->get('country');
        $player->sports = $request->get('sports');

        $player->save();

        return Redirect::route('players.index')->with('message', 'Player ID: ' . $player->id . ' is succesvol aangemaakt.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $player = Player::findOrFail($id);
        return View::make('players/edit', [
            'player' => $player
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, UpdatePlayerRequest $request)
    {
        $player = Player::findOrFail($id);

        $player->name = $request->get('name');
        $player->age = $request->get('age');
        $player->country = $request->get('country');
        $player->sports = $request->get('sports');

        $player->save();

        return Redirect::route('players.index')->with('message', 'Player ID: ' . $id . ' is succesvol gewijzigd.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Player::destroy($id);
        return Redirect::route('players.index')->with('message', 'Player ID: ' . $id . ' is verwijderd.');
    }
}
