<x-layout>
    <h1>{{$title}}</h1>

    <section class="Box">
        <form action="/update/{{$user->id}}" method="post" enctype="multipart/form-data">
            <!-- Add CSRF Token -->
            @csrf
            @method('PUT')

            <div>
                <label for="name">Your Name</label>
                <input type="text" name="name" id="name" value="{{$user->name}}" required>
            </div>

            <div>
                <button class="submit" type="submit">Submit</button>
            </div>
        </form>
    </section>
</x-layout>
