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
            $data['success'] = true;
            $data['message'] = 'Cadasto realizado com sucesso!';

            return json_encode($data);
        }

        $data['success'] = false;
        $data['message'] = 'Erro ao salvar o jogador!';

        return json_encode($data);
    }
}
