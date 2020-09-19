<form class="player-create">
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
        <button id="back-button" type="button" class="btn btn-link mr-5">Voltar</button>
        <button type="submit" class="btn btn-warning mb-3 w-50">
            <span id="button-text">Cadastrar</span>
            <img id="loading" width="25%" src="{{asset('/images/loading.gif')}}" alt="Loading">
        </button>
    </div>
</form>
<span id="messages"></span>
<script>
$(() => {
    $('#loading').hide();
    $('#back-button').click((event) => {
        event.preventDefault();
        $.get('{{route("welcome")}}', (response) => {
            $('#content').html(response);
        })
    });
    $('form[class="player-create"]').submit(function(event) {
        event.preventDefault();
        $("#button-text").hide();
        $("#loading").show();
        $.ajax({
            url: "{{route('player.store')}}",
            type: "post",
            data: $(this).serialize(),
            dataType: 'json',
            success: (response) => {
                if (response.success === true) {
                    $("#loading").hide();
                    $("button-text").show();
                    $(".player-create").remove();
                    $("#messages").html("<li class='alert alert-success'>"+response.message+"</li>");
                    setTimeout(() => {
                        $('#messages').fadeOut('slow');
                        $.get('/welcome', (response) => {
                            $('#content').html(response);
                        });
                    }, 3000);
                    $.get("{{route('player.index')}}", (response) => {
                        $("#main-table").show();
                        $("#row-result").empty();
                        for (const [index, value] of response.entries()) {
                            if (value.goalkeeper == 1) {
                                $("#row-result").append(
                                    '<tr>' +
                                        '<td class="pt-3" scope="row">' + (index + 1) + '</td>' +
                                        '<td class="pt-3">' + value.name + ' (Goleiro)</td>' +
                                        '<td class="pt-3">' + value.level + '</td>' +
                                        '<td>' +
                                            '<input id="hidden-id" type="hidden" value='+ value.id +'>' +
                                            '<button id="button-edit" value='+ value.id +' type="button" class="btn btn-outline-dark w-button"><i class="fas fa-edit"></i></button>' +
                                            '<button id="button-delete" value='+ value.id +' type="button" class="btn btn-outline-dark w-button"><i class="fas fa-trash-alt"></i></button>' +
                                        '</td>' +
                                    '</tr>'
                                );
                            } else {
                                $("#row-result").append(
                                    '<tr>' +
                                        '<td class="pt-3" scope="row">' + (index + 1) + '</td>' +
                                        '<td class="pt-3">' + value.name + '</td>' +
                                        '<td class="pt-3">' + value.level + '</td>' +
                                        '<td>' +
                                            '<input id="hidden-id" type="hidden" value='+ value.id +'>' +
                                            '<button id="button-edit" type="button" class="btn btn-outline-dark w-button"><i class="fas fa-edit"></i></button>' +
                                            '<button id="button-delete" type="button" class="btn btn-outline-dark w-button"><i class="fas fa-trash-alt"></i></button>' +
                                        '</td>' +
                                    '</tr>'
                                );
                            }
                        };
                    });
                } else {
                    $("#loading").hide();
                    $("#button-text").show();
                    $("#messages").html("<li class='alert alert-warning'>Algo deu errado!</li>");
                }
            },
            error: (error) => {
                $.each(error.responseJSON.errors, (key, value) => {
                    $("#loading").hide();
                    $("#button-text").show();
                    $('#messages').html("<li class='alert alert-warning'>"+value+"</li>").show();
                    setTimeout(() => {
                        $('#messages').fadeOut('slow');
                    }, 3000);
                });
            }
        })
    });
});
</script>
