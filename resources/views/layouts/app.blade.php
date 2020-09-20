<!DOCTYPE html>
<html lang="pt-BR">
<head>
    @component('layouts.head')
    @endcomponent
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img width="100%" height="100%" src="{{asset('images/player.png')}}" alt="">
            </div>
            <div id="content" class="col-md-5 align-items-center d-flex justify-content-center flex-column">
                @yield('content')
            </div>
        </div>
    </div>

    @if (count($players) > 0)
        @component('layouts.table', [$players])
        @endcomponent
    @endif

    @component('layouts.scripts')
    @endcomponent
</body>
</html>
