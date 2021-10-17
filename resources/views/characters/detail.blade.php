@php
    /**
     * @var \App\Models\Character[] $character
    */
@endphp

<x-layout>
    <div class="detail">
        <div>
            <h1>{{$character->name}}</h1>
            <section class="big-image">
                <div class="image">
                    <img class="detail-image" src="{{asset('storage/character/')}}/{{$character->image}}">

                    <br>
                </div>
            </section>

            <section class="info">
                <div>
                    <h2>Character description</h2>
                    <p>{{$character->description}}</p>
                    <br>
                </div>

                <div class="tag">
                    <h2>Champion role</h2>
                    <p>{{$character->tag}}</p>
                    <br>
                </div>
            </section>
        </div>
    </div>
</x-layout>
