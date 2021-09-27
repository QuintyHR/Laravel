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
            <div class="nav-left">
                <div class="nav"><a href="/">Home</a></div>
                <div class="nav"><a href="/characters">Character Collection</a></div>
                <div class="nav"><a href="/about">About</a></div>
                <div class="nav"><a href="/profile">Profile</a></div>
                <div class="nav"><a href="/create">Create Character</a></div>
            </div>
            <div class="nav-right">
                <div class="nav"><a href="/login">Login</a></div>
                <div class="nav"><a href="/register">Register</a></div>
            </div>
        </nav>

        <br>

    {{$slot}}

    </body>
</html>
