<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Team extends Model
{
    use HasFactory;

    public function sortTeams($attributes) {
        $teamsNumber = $attributes->times;
        $playersRequested = $attributes->jogadores;
        $goalkeepersConfirmed = DB::select(DB::raw("SELECT * FROM soccer.players WHERE confirmed = 1 AND goalkeeper = 1 ORDER BY level ASC"));
        $playersConfirmed = DB::select(DB::raw("SELECT * FROM soccer.players WHERE confirmed = 1 AND goalkeeper = 0 ORDER BY level DESC"));

        $teamsSorted = [];
        $index = 0;

        for ($i=0; $i < $teamsNumber; $i++) {
            $teamsSorted[$i][0] = $goalkeepersConfirmed[$i];
        }

        for ($z=1; $z <= $playersRequested; $z++) {
            for ($i=0; $i < $teamsNumber; $i++) {
                $teamsSorted[$i][$z] = $playersConfirmed[$index];
                $index++;
            }
        }

        return view('pages.team.show')->with([
            'teamsSorted' => $teamsSorted
        ]);
    }
}
