<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    public function savePlayer($attributes) {
        $this->name = $attributes->nome;
        $this->level = $attributes->level;
        $this->goalkeeper = $attributes->goleiro;

        if ($this->save()) {
            return redirect()->route('home')->with('success_insert', 'Jogador cadastrado com sucesso!');
        }
        return redirect()->route('home')->with('error_insert', 'Erro ao cadastrar jogador!');
    }

    public function updatePlayer($attributes) {
        $player = $this->where('id', $attributes->id)->first();

        $player->name = $attributes->nome;
        $player->level = $attributes->level;
        $player->goalkeeper = $attributes->goleiro;

        if ($player->save()) {
            return redirect()->route('home')->with('success_edit', 'Jogador editado com sucesso!');
        }
        return redirect()->route('home')->with('error_edit', 'Erro ao editar jogador!');
    }
}
