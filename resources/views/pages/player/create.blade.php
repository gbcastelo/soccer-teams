@extends('layouts.app')
@section('content')
<form class="player-create" method="POST" action="{{route('player.store')}}">
    @csrf
    <div class="form-group">
        <label for="player-name">Nome do Jogador</label>
        <input type="text" class="form-control" name="nome" id="player-name" required>
    </div>
    <div class="form-group">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="select-level">Nível</label>
            </div>
            <select class="custom-select" id="select-level" name="level" required>
                <option disabled selected>Escolha...</option>
                <option value="1">1 (Pereba)</option>
                <option value="2">2 (Quase lá, pra menos)</option>
                <option value="3">3 (Nem bom, nem ruim)</option>
                <option value="4">4 (Quase lá, pra mais)</option>
                <option value="5">5 (Joga bola até na chuva)</option>
            </select>
        </div>
    </div>
    <div class="input-group mb-3">
        <div class="input-group-text">
            <input type="checkbox" id="goalkeeper" value="1" name="goleiro">
        </div>
        <label for="goalkeeper" class="ml-3 mt-2">É goleiro?</label>
    </div>
    <div class="col-md-12 d-flex justify-content-end p-0">
        <a href="{{route('home')}}" type="button" class="btn btn-link mr-5">Voltar</a>
        <button type="submit" class="btn btn-warning mb-3 w-50">
            <span id="button-text">Cadastrar</span>
        </button>
    </div>
</form>
@endsection
