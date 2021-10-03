@php
/**
 * @var \App\Models\Character[] $characters
*/
@endphp

<x-layout>
    <h1>{{$title}}</h1>

    <section class="box-container">
        @foreach($characters as $character)
            <div class="character">
                <h2>{{$character->name}}</h2>

                <div class="image">

                </div>

                <div class="links">
                    <div class="link-button"><a href="/detail/{{$character->id}}">Info</a></div>
                </div>
            </div>
        @endforeach
    </section>
</x-layout>
