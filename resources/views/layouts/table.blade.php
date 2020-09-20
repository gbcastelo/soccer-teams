<div class="container mt-5">
    <table id="main-table" class="table table-hover">
        <caption>O número máximo de jogadores é 25!</caption>
        <thead>
            <tr class="table-warning"></tr>
                <th scope="col">#</th>
                <th scope="col">Jogador</th>
                <th scope="col">Level</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody id="row-result">
            @foreach ($players as $player)
                <tr id="player-row">
                    <td class="pt-3" scope="row">{{$loop->iteration}}</td>
                    <td class="pt-3">{{$player->name}} {{$player->goalkeeper == 1 ? "(Goleiro)" : ""}}</td>
                    <td class="pt-3">{{$player->level}}</td>
                    <td>
                        <a href="{{route('player.edit', $player->id)}}" type="button" class="btn btn-outline-dark w-button"><i class="fas fa-edit"></i></a>
                        <a id="button-delete" data-id="{{$player->id}}" type="button" class="btn btn-outline-dark w-button"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
                <script>
                </script>
            @endforeach
        </tbody>
    </table>
</div>
<script>
    $(document).on('click', '#button-delete', function(event) {
        event.preventDefault();
        Swal.fire({
            title: 'Você tem certeza?',
            text: "Isso excluirá o cadastro permanentemente!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Deletar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                let url = '/player/' + $(this).data('id');
                console.log(url);
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
