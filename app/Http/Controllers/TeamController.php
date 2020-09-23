<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Player;

class TeamController extends Controller
{

    /**
     * Show the form for creating a new team.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('pages.team.create');
    }

    /**
     * Sort the teams with the requested parameters, and evaluate them.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sortTeams(Request $request) {
        $validatedData = $request->validate([
            'times' => 'required',
            'jogadores' => 'required'
        ]);

        $teamSort = new Team;

        return $teamSort->sortTeams($request);
    }

    /**
     * Reset all data from the player table on database.
     *
     * @return \Illuminate\Http\Response
     */
    public function resetAll() {
        if (Player::truncate()) {
            return redirect()->route('home')->with('success_reset', 'Os cadastros foram resetados!');
        }
        return redirect()->back()->with('error_reset', 'Ocorreu um erro ao resetar!');
    }
}
