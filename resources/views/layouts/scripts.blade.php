{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
{{-- Font Awesome --}}
<script src="https://kit.fontawesome.com/e6496a0736.js"></script>

{{-- Project Scripts --}}
@if (Session::has('success_insert'))
    <script>
        Swal.fire({
            title: '{{Session::get('success_insert')}}',
            text: 'Não se esqueça de confirmar a presença!',
            icon: 'success'
        });
    </script>
@endif
@if (Session::has('error_insert'))
    <script>
        Swal.fire({
            title: '{{Session::get('error_insert')}}',
            icon: 'error'
        });
    </script>
@endif
@if (Session::has('success_edit'))
    <script>
        Swal.fire({
            title: '{{Session::get('success_edit')}}',
            icon: 'success'
        });
    </script>
@endif
@if (Session::has('error_edit'))
    <script>
        Swal.fire({
            title: '{{Session::get('error_edit')}}',
            icon: 'error'
        });
    </script>
@endif
@if (Session::has('success_reset'))
    <script>
        Swal.fire({
            title: '{{Session::get('success_reset')}}',
            icon: 'success'
        });
    </script>
@endif
@if (Session::has('error_reset'))
    <script>
        Swal.fire({
            title: '{{Session::get('error_reset')}}',
            icon: 'error'
        });
    </script>
@endif
@if ($errors->any())
    <script>
        errors = {!! json_encode($errors->messages()) !!};
            outText = '';
            for (var message in errors) {
                outText += errors[message];
                outText += '<br>'
            }
        Swal.fire(
            'Erro!',
            outText,
            'error',
        );
    </script>
@endif
