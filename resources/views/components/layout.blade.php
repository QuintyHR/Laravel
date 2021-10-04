<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>LoL Character Collection</title>

    <link href="{{asset('css/style.css')}}" rel="stylesheet">

</head>
    <body>
        <nav>
            @guest
                <div class="nav-left">
                    <div class="nav"><a href="/">Home</a></div>
                    <div class="nav"><a href="/characters">Character Collection</a></div>
                    <div class="nav"><a href="/about">About</a></div>
                </div>
                <div class="nav-right">
                    @if (Route::has('login'))
                        <div class="nav"><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></div>
                    @endif

                    @if (Route::has('register'))
                        <div class="nav"><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></div>
                    @endif
                </div>
            @else
                <div class="nav-left">
                    <div class="nav"><a href="/">Home</a></div>
                    <div class="nav"><a href="/characters">Character Collection</a></div>
                    <div class="nav"><a href="/about">About</a></div>
                    <div class="nav"><a href="/profile">Profile</a></div>
                    <div class="nav"><a href="/characters/create">Create Character</a></div>
                </div>
                <div class="nav-right">
                    <div>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            @endguest
        </nav>

        <br>

    {{$slot}}

    </body>
</html>
