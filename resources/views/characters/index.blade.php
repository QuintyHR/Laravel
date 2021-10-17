@php
/**
 * @var \App\Models\Character[] $characters
*/
@endphp

<x-layout>
    <h1>{{$title}}</h1>

    <section class="search">
        <form>
            <div class="tag-buttons">
                <h3>Filter by tag</h3>
                <div>
                    <input name="tags[]" type="checkbox" id="t1" value="Assasin" autocomplete="off">
                    <label for="t1">Assasin</label>
                </div>
                <div>
                    <input name="tags[]" type="checkbox" id="t2" value="Fighter" autocomplete="off">
                    <label for="t2">Fighter</label>
                </div>
                <div>
                    <input name="tags[]" type="checkbox" id="t3" value="Mage" autocomplete="off">
                    <label for="t3">Mage</label>
                </div>
                <div>
                    <input name="tags[]" type="checkbox" id="t4" value="Marksman" autocomplete="off">
                    <label for="t4">Marksman</label>
                </div>
                <div>
                    <input name="tags[]" type="checkbox" id="t5" value="Support" autocomplete="off">
                    <label for="t5">Support</label>
                </div>
                <div>
                    <input name="tags[]" type="checkbox" id="t6" value="Tank" autocomplete="off">
                    <label for="t6">Tank</label>
                </div>
            </div>
            <div>
                <input type="submit" value="Filter">
            </div>
        </form>

        <form>
            <div class="searchbar">
                <div>
                    <input placeholder="Search" name="search" type="text" value="" id="search">
                    <label class="hide-text" for="search">Search on words</label>
                </div>

                <div>
                    <input type="submit" value="Search">
                </div>
            </div>
        </form>
    </section>

    <section class="box-container">
        @foreach($characters as $character)
            <div class="character">
                <h2>{{$character->name}}</h2>

                <div>
                    <img class="index-image" src="{{asset('storage/character/')}}/{{$character->image}}">
                </div>

                <br>

                @guest

                @else
                    <form action="/unFavourite" method="post"  enctype="multipart/form-data">
                        @csrf
                        <div class="unFavourite">
                            <input type="hidden" id="character_id" name="character_id" value="{{$character->id}}">
                            <input type="submit" value="{{$unFavourite}}">
                        </div>
                    </form>

                    <form action="/favourite" method="post"  enctype="multipart/form-data">
                        @csrf
                        <div class="favourite">
                            <input type="hidden" id="character_id" name="character_id" value="{{$character->id}}">
                            <input type="submit" value="{{$favourite}}">
                        </div>
                    </form>
                @endguest
                <div class="links">
                    <div class="link-button"><a href="/detail/{{$character->id}}">Info</a></div>
                </div>
            </div>
        @endforeach
    </section>
</x-layout>
