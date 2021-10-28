<x-layout>
    <h1>{{$title}}</h1>

    <a href="/editProfile/{{$id}}" class="edit-profile">Edit Profile</a>

    @if($user->role == "admin")
        <a href="/admin" class="admin">Admin page</a>
    @endif

    <br>

    <section class="favourites">
        <h2 class="myFavourites">My favourites</h2>
        <div class="favourites">
            @foreach($favouriteCharacters as $favouriteCharacter)
                <div class="character">
                    <h2>{{$favouriteCharacter->name}}</h2>

                    <div>
                        <img class="index-image" src="{{asset('storage/character/')}}/{{$favouriteCharacter->image}}">
                    </div>

                    <br>

                    <form action="/unFavourite" method="post"  enctype="multipart/form-data">
                        @csrf
                        <div class="unFavourite">
                            <input type="hidden" id="character_id" name="character_id" value="{{$favouriteCharacter->id}}">
                            <input type="submit" value="Remove from favourites" class="favourite-button">
                        </div>
                    </form>

                    <br>

                    <div class="links">
                        <div class="link-button"><a href="/detail/{{$favouriteCharacter->id}}" class="link-button">Info</a></div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <br>

    <section class="creations">
        <h2 class="myCreations">My creations</h2>
        <div class="creations">
            @foreach($myCharacters as $myCharacter)
                <div class="character-created">
                    <h2>{{$myCharacter->name}}</h2>

                    <div>
                        <img class="index-image" src="{{asset('storage/character/')}}/{{$myCharacter->image}}">
                    </div>

                    <br>

                    <div class="links">
                        <div class="link-button"><a href="/detail/{{$myCharacter->id}}" class="link-button">Info</a></div>
                    </div>

                    <br>

                    <div class="links">
                        <div class="link-button"><a href="/edit/{{$myCharacter->id}}" class="link-button">Edit</a></div>
                    </div>

                    <br>

                    <div class="links">
                        <div class="link-button"><a href="/delete/{{$myCharacter->id}}" class="link-button">Delete</a></div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</x-layout>
