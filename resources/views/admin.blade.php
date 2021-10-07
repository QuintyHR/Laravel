@php
    /**
     * @var \App\Models\Character[] $characters
    */
@endphp

<x-layout>
    <h1>{{$title}}</h1>
    <table>
        <table>
            <tr>
                <th>Character</th>
                <th>Active</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach($characters as $character)
                <tr>
                    <td>{{$character->name}}</td>
                    <td>Switch</td>
                    <td><a href="/edit/{{$character->id}}">Edit</a></td>
                    <td><a href="/delete/{{$character->id}}">Delete</a></td>
                </tr>
            @endforeach
        </table>
    </table>
</x-layout>
