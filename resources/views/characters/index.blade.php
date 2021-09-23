@php
/**
 * @var \App\Models\Character[] $characters
*/
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Character Collection</title>

        <link href="{{asset('css/style.css')}}" rel="stylesheet">

    </head>

    <body>
        <nav>
            <div><a href="/">Home</a></div>
            <div>Character Collection</div>
            <div><a href="/about">About</a></div>
        </nav>

        <h1>{{$title}}</h1>

        <section class="Box-Container">
            <div class="Box">
                @foreach($characters as $character)
                    <h2>{{$character->name}}</h2>
                @endforeach
            </div>
        </section>
    </body>
</html>
