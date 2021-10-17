<x-layout>
    <h1>{{$title}}</h1>
    <section class="favourites">
        <div>
            <p>My favourites</p>
            @foreach($favouriteCharacters as $favouriteCharacter)
                <div class="character">
                    <h2>{{$favouriteCharacter->name}}</h2>

                    <div>
                        <img class="index-image" src="{{asset('storage/character/')}}/{{$favouriteCharacter->image}}">
                    </div>

                    <br>

                    <div class="links">
                        <div class="link-button"><a href="/detail/{{$favouriteCharacter->id}}">Info</a></div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>


    <section class="creations">
        <div>
            <p>My creations</p>
            @foreach($myCharacters as $myCharacter)
                <div class="character">
                    <h2>{{$myCharacter->name}}</h2>

                    <div>
                        <img class="index-image" src="{{asset('storage/character/')}}/{{$myCharacter->image}}">
                    </div>

                    <br>

                    <div class="links">
                        <div class="link-button"><a href="/detail/{{$myCharacter->id}}">Info</a></div>
                    </div>

                    <div class="links">
                        <div class="link-button"><a href="/edit/{{$myCharacter->id}}">Edit</a></div>
                    </div>

                    <div class="links">
                        <div class="link-button"><a href="/delete/{{$myCharacter->id}}">Delete</a></div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</x-layout>
