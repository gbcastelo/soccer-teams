@extends('layouts.app')
@section('content')
<h2>Bem vindo ao</h2>
<h1>Soccer Teams!</h1>
<div class="flex-inline mt-2">
    <a id="player-create" href="{{route('player.create')}}" type="button" class="btn btn-warning mr-2">Cadastrar Jogador</a>
    <a id="team-create" href="{{route('team.create')}}" type="button" class="btn btn-warning mr-2">Sortear Times</a>
</div>
@endsection
