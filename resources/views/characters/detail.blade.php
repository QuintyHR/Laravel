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
                <div>
                    <p>{{$character->description}}</p>
                </div>
            </section>
        </div>
    </div>
</x-layout>
