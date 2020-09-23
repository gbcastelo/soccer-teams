@extends('layouts.app')
@section('content')
@if (count($players) > 0)
    <h3>Soccer Teams</h3>
    <h5>Escolha sua ação:</h5>
    <div class="flex-inline mt-2">
        <a id="player-create" href="{{route('player.create')}}" type="button" class="btn btn-warning mr-2">Cadastrar Jogador</a>
        <a id="team-create" href="{{route('team.create')}}" type="button" class="btn btn-warning mr-2">Sortear Times</a>
    </div>
@else
    <h2>Bem vindo ao</h2>
    <h1>Soccer Teams!</h1>
    <div class="row d-flex justify-content-center">
        <div class="col-md-9">
            <p class="text-center"><small>Comece cadastrando um jogador. Tenha em mente que você precisa de pelo menos 2 times com 1 goleiro cada para jogar!</small></p>
        </div>
    </div>
    <div class="flex-inline mt-2">
        <a id="player-create" href="{{route('player.create')}}" type="button" class="btn btn-warning mr-2">Cadastrar Jogador</a>
    </div>
@endif
@endsection
