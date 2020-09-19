@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img width="100%" height="100%" src="{{asset('images/player.png')}}" alt="" srcset="">
        </div>
        <div id="content" class="col-md-5 align-items-center d-flex justify-content-center flex-column">
            @component('pages.base.welcome')
            @endcomponent
        </div>
    </div>
</div>
<div class="container mt-5">
    <table class="table table-hover">
        <caption>O time que chegar a 100 pontos é o vencedor!</caption>
        <thead>
            <tr class="table-warning"></tr>
                <th scope="col">#</th>
                <th scope="col">Time</th>
                <th scope="col">Último Jogo</th>
                <th scope="col">Pontos</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
          <tr>
            <td scope="row">1</td>
            <td>Mark</td>
            <td>Otto</td>
            <td>Otto</td>
            <td>@mdo</td>
          </tr>
          <tr>
            <td scope="row">2</td>
            <td>Jacob</td>
            <td>tdornton</td>
            <td>tdornton</td>
            <td>@fat</td>
          </tr>
          <tr>
            <td scope="row">3</td>
            <td>Larry</td>
            <td>the Bird</td>
            <td>the Bird</td>
            <td>@twitter</td>
          </tr>
        </tbody>
    </table>
</div>
<script>
$(() => {
    $('#player-create').click((event) => {
        event.preventDefault();
        $.get("{{route('player.create')}}", (response) => {
            $('#content').html(response);
        });
    });
});
</script>
@endsection
