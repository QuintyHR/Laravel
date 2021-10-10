@php
    /**
     * @var \App\Models\Character[] $character
    */
@endphp

<x-layout>
    <div>
        <div>
            <h1>{{$character->name}}</h1>
            <section>
                <div class="image">
                    <img class="image" src="{{asset('storage/character/')}}/{{$character->image}}">

                    <br>
                </div>

                <div>
                    <h2>Character description</h2>
                    <p>{{$character->description}}</p>
                    <br>
                </div>

                <div class="tag">
                    <h2>Tags</h2>
                    <p>{{$character->tag}}</p>
                    <br>
                </div>
            </section>
        </div>
    </div>
</x-layout>
