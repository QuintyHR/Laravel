<x-layout>
    <h1>{{$title}}</h1>
    <section class="Box">
        <form action="{{ route('characters.store') }}" method="post" enctype="multipart/form-data">
            <!-- Add CSRF Token -->
            @csrf
            <div>
                <label for="name">Character Name</label>
                <input type="text" name="name" id="name" required>
            </div>

            <div>
                <label for="description">Character Description</label>
                <input type="text" name="description" id="description" required>
            </div>

            <div>
                <label for="file">Character Image</label>
                <input type="file" name="file" id="file" required>
            </div>

            <div>
                <label for="creator">Character Creator</label>
                <input type="text" name="creator" id="creator" required>
            </div>

            <div>
                <label for="tag">Character Tag</label>
                <input type="text" name="tag" id="tag" required>
            </div>

            <div>
                <button type="submit">Submit</button>
            </div>
        </form>
    </section>
</x-layout>
