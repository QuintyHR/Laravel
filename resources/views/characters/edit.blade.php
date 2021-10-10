<x-layout>
    <h1>{{$title}}</h1>
    <section class="Box">
        <form action="/update/{{$character->id}}" method="post" enctype="multipart/form-data">
            <!-- Add CSRF Token -->
            @csrf
            @method('PUT')

            <div>
                <label for="name">Character Name</label>
                <input type="text" name="name" id="name" value="{{$character->name}}" required>
            </div>

            <div>
                <label for="description">Character Description</label>
                <input type="text" name="description" id="description" value="{{$character->description}}" rows="4" cols="50" required>
            </div>

            <div>
                <label for="file">Character Image</label>
                <input type="file" name="file" id="file" required>
            </div>

            <div>
                <label for="tag">Character Tag</label>
                <select name="tag" id="tag">
                    <option value="Assasin" selected>Assasin</option>
                    <option value="Fighter">Fighter</option>
                    <option value="Mage">Mage</option>
                    <option value="Marksman">Marksman</option>
                    <option value="Support">Support</option>
                    <option value="Tank">Tank</option>
                </select>
            </div>

            <br>

            <div>
                <button class="submit" type="submit">Submit</button>
            </div>
        </form>
    </section>
</x-layout>
