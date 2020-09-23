@extends('layouts.app')
@section('content')
<div class="col-md-12 d-flex flex-row mt-5 flex-wrap">
    @foreach ($teamsSorted as $finalTeam)
        <div class="col-6 col-md-6 mb-3 w-100">
            @php
                $sumLevel = 0;
            @endphp
            <h4>Time {{$loop->iteration}}</h4>
            <hr>
            @foreach ($finalTeam as $player)
                <p>{{$player->goalkeeper == 0 ? $player->name : $player->name . ' (Goleiro)'}}</p>
                @php
                    $sumLevel += $player->level;
                @endphp
            @endforeach
            <hr>
            <p id="sum-result"><small>Nível total do time: {{$sumLevel}}</small></p>
        </div>
    @endforeach
    <div class="col-md-12">
        <div class="row d-flex justify-content-center">
            <a id="reset-all" type="button" class="btn btn-outline-dark mr-5" title="Reseta todos os jogadores(Cuidado!)">Resetar</a>
            <a href="{{route('home')}}" type="button" class="btn btn-outline-dark mr-5">Home</a>
        </div>
    </div>
</div>
<script>
$(() => {
    $("#reset-all").click((event) => {
        event.preventDefault();
        Swal.fire({
            title: 'Cuidado!',
            text: 'Essa ação deletará todos os jogadores!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ffc107',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Resetar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                $(location).attr('href', "{{route('team.reset')}}");
            } else {
                location.reload(false);
            }
        });
    })
})
</script>
@endsection
