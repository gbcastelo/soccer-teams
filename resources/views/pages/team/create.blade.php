@extends('layouts.app')
@section('content')
<form class="team-create" method="POST" action="{{route('team.store')}}">
    @csrf
    <div class="form-group">
        <label for="team-size">Quantos times serão montados?</label>
        <input type="number" class="form-control" min="2" name="times" id="team-size" required>
        <p><small>Goleiros confirmados: {{count($goalkeepers)}}</small></p>
    </div>
    <div class="form-group" id="player-count-div">
        <label for="player-count">Quantos jogadores cada time terá na linha?</label>
        <input type="number" class="form-control" name="jogadores" id="player-count" required>
        <p><small>Jogadores de linha confirmados: {{count($players_confirmed_line)}}</small></p>
    </div>
    <div class="col-md-12 d-flex justify-content-end p-0">
        <a href="{{route('home')}}" type="button" class="btn btn-link mr-5">Voltar</a>
        <button id="button-sort" type="submit" class="btn btn-warning mb-3 w-50">
            <span id="button-text">Cadastrar</span>
        </button>
    </div>
</form>
<script>
$(() => {
    $("#button-sort").prop("disabled", true);
    $("#player-count-div").hide();
    $("#team-size").change(() => {
        let teamSize = parseInt($("#team-size").val());
        let totalGoalkeepers = {{count($goalkeepers)}};
        if (teamSize < 2) {
            Swal.fire(
                'Pra bola rolar precisamos de no mínimo 2 times!',
                'Mude para essa quantidade e continue.',
                'warning'
            )
        }
        if (teamSize >= 2) {
            if (teamSize > totalGoalkeepers) {
                Swal.fire({
                    title: 'Você precisa de mais goleiros!',
                    text: "Deseja cadastrar um novo? (Ou confirme um já cadastrado!)",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#ffc107',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ir para cadastro',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(location).attr('href', "{{route('player.create')}}");
                    } else {
                        location.reload(false)
                    }
                });
            }
        }
        if (totalGoalkeepers >= teamSize) {
            $("#player-count-div").show();
            $("#player-count").change(() => {
                let teamSize = parseInt($("#team-size").val());
                let playersCount = parseInt($("#player-count").val());
                let playersConfirmed = {{count($players_confirmed_line)}};
                let playersNeeded = teamSize * playersCount;
                let difference = playersNeeded - playersConfirmed;
                if (playersConfirmed < playersNeeded) {
                    Swal.fire({
                        title: 'A conta não fecha!',
                        text: "Precisamos de mais " + difference + " jogadores de linha.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#ffc107',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ir para cadastro',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $(location).attr('href', "{{route('player.create')}}");
                        }
                    });
                }
            })
        }
    });
})
</script>

@endsection
