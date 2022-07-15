<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/front.css')}}">
    <title>Boolbnb</title>
</head>
<body>
    <div id="root">
        <div class="log-container">
            <h1>Sito in manutenzione</h1>
             @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/admin/houses') }}">Visualizza i tuoi appartamenti</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif
            {{-- <a href="/login"><button class="btn btn-primary">Login</button></a>
            <a href="/register"><button class="btn btn-primary">Register</button></a> --}}
        </div>
    </div>
    {{-- <script src="{{asset('js/front.js')}}"></script> --}}
</body>
</html>