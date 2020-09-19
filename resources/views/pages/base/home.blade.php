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
    $.get("{{route('player.index')}}", (response) => {
        if (response.length == 0) {
            $("#main-table").hide();
        } else {
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
        }
    });
});
</script>
@endsection
