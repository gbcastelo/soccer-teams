<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;

class PlayerController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:100',
            'level' => 'required|integer|min:1|max:5',
            'goleiro' => 'boolean'
        ]);

        if (!$request->goleiro) {
            $request->goleiro = 0;
        }

        $player = new Player;

        if ($request->id == null) {
            return $player->savePlayer($request);
        }
        return $player->updatePlayer($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.player.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $player = Player::where('id', $id)->first();

        return view('pages.player.edit')->with([
            'player' => $player
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Player::where('id', $id)->delete();
    }
    /**
     * Confirm/retrieve player presence.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function confirmOrRetrievePresence($id) {
        $player = new Player;

        return $player->confirmOrRetrievePresence($id);
    }

}
