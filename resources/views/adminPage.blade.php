<x-app-layout>

<h1>Movies</h1>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<ul>
    @foreach($movies as $movie)
        <li>
            {{ $movie['title']}} - {{ $movie['descriptionShort'] }}
            <form action="/adminPage/{{ $movie['id'] }}" method="post" style="display: inline;">
                @csrf
                @method('delete')
                <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </li>
    @endforeach
</ul>

<h2>Add Movie</h2>
<x-add-movie/>
</x-app-layout>
