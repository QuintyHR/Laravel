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

        <br>

        <h1>{{$title}}</h1>

        <section class="box-container">
            @foreach($characters as $character)
                <div class="character">
                    <h2>{{$character->name}}</h2>

                    <div class="image">

                    </div>

                    <div class="links">
                        <a href="/detail">Info</a>
                    </div>
                </div>
            @endforeach
        </section>
    </body>
</html>
