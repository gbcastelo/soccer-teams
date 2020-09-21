{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
{{-- Font Awesome --}}
<script src="https://kit.fontawesome.com/e6496a0736.js"></script>

{{-- Project Scripts --}}
@if (Session::has('success_insert'))
    <script>
        Swal.fire({
            title: 'Cadastrado com sucesso!',
            icon: 'success'
        });
    </script>
@endif
@if (Session::has('error_insert'))
    <script>
        Swal.fire({
            title: 'Ocorreu um erro ao salvar!',
            icon: 'error'
        });
    </script>
@endif
@if (Session::has('success_edit'))
    <script>
        Swal.fire({
            title: 'Editado com sucesso!',
            icon: 'success'
        });
    </script>
@endif
@if (Session::has('error_edit'))
    <script>
        Swal.fire({
            title: 'Ocorreu um erro ao editar!',
            icon: 'error'
        });
    </script>
@endif
@if (Session::has('success_confirmed'))
    <script>
        Swal.fire({
            title: 'Ocorreu um erro ao editar!',
            icon: 'error'
        });
    </script>
@endif
@if (Session::has('error_confirmed'))
    <script>
        Swal.fire({
            title: 'Ocorreu um erro ao editar!',
            icon: 'error'
        });
    </script>
@endif
@if ($errors->any())
    <script>
        errors = {!! json_encode($errors->messages()) !!};
            out = '';
            for (var p in errors) {
            out += errors[p] + '\n' ;
            }
        Swal.fire({
            title: 'Erro!',
            text : out,
            icon: 'error',
        });
    </script>
@endif
