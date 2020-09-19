<h2>Bem vindo ao</h2>
<h1>Soccer Teams!</h1>
<div class="flex-inline mt-2">
    <button id="player-create" type="button" class="btn btn-warning mr-2">Cadastrar Jogador</button>
</div>
<script>
$(() => {
    $('#player-create').click((event) => {
        event.preventDefault();
        $.get("{{route('player.create')}}", (response) => {
            $('#content').html(response);
        });
    })
});
</script>
