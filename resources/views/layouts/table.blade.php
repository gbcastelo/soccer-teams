<div class="container mt-5">
    <table id="main-table" class="table table-hover">
        <caption>Número total de jogadores confirmados: {{count($players_confirmed)}} ( <i class="fas fa-thumbs-up"></i> )</caption>
        <thead>
            <tr class="table-warning"></tr>
                <th scope="col">Jogador</th>
                <th scope="col">Level</th>
                <th scope="col">Confirmado?</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody id="row-result">
            @foreach ($players as $player)
                <tr id="player-row">
                    <td class="pt-3">{{$player->name}} {{$player->goalkeeper == 1 ? "(Goleiro)" : ""}}</td>
                    <td class="pt-3">{{$player->level}}</td>
                    <td>
                        <a id="button-confirm" data-id="{{$player->id}}" class="btn btn-outline-dark w-button" title="Confirmar presença">
                            {!! $player->confirmed == 1 ? '<i class="fas fa-thumbs-up"></i>' : '<i class="fas fa-thumbs-down"></i>'!!}
                        </a>
                    </td>
                    <td>
                        <a href="{{route('player.edit', $player->id)}}" class="btn btn-outline-dark w-button" title="Editar informações do jogador"><i class="fas fa-edit"></i></a>
                        <a id="button-delete" data-id="{{$player->id}}" class="btn btn-outline-dark w-button mt-1 mt-md-0" title="Deletar jogador"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
$(document).on('click', '#button-confirm', function(event) {
    event.preventDefault();
    let url = '/player/' + $(this).data('id') + '/confirmation';
    $.ajax({
        type: 'put',
        url: url,
        data: {
            _token: "{{ csrf_token() }}"
        },
        success: () => {
            location.reload(false);
        },
        error: (error) => {
            Swal.fire(
                'Ops!',
                error.responseText,
                'error'
            );
        }
    })
});
$(document).on('click', '#button-delete', function(event) {
    event.preventDefault();
    Swal.fire({
        title: 'Você tem certeza?',
        text: "Isso excluirá o cadastro permanentemente!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#ffc107',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Deletar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            let url = '/player/' + $(this).data('id');
            $.ajax({
                type: "delete",
                url: url,
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function (data) {
                    Swal.fire(
                        'Deletado!',
                        'O registro foi deletado com sucesso!',
                        'success'
                    ).then((result) => {
                        if (result.isConfirmed) {
                            location.reload(false);
                        }
                    })
                }
            });
        }
    });
});
</script>
