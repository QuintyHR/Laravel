<x-layout>
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 dark:text-white">
            <h1>{{$title}}</h1>
            <section class="Box">
                <div>
                    @foreach($characters as $character)
                        <h2>{{$character->name}}</h2>
                    @endforeach
                </div>
            </section>
        </div>
    </div>
</x-layout>
