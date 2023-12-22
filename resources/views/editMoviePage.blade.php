<x-app-layout>
    <div class=" flex justify-center">
    <form action="{{ route('admin.page.update', ['id' => $movie->id]) }}" class="space-y-4" method="POST">
    @csrf
    @method('put')
    <div class="flex flex-row">
    <div class="flex flex-col space-y-2 mr-5">
        <label class="text-white" for="title">Title:</label>
        <textarea name="title" class="p-2 w-96 border border-gray-300 rounded-md">{{$movie['title']}}</textarea>
    </div>

    <div class="flex flex-col space-y-2">
        <label class="text-white" for="imageReference">Image:</label>
        <textarea name="imageReference" class="p-2 w-96 border border-gray-300 rounded-md">{{$movie['imageReference']}}</textarea>
    </div>
    </div>
    <div class="flex flex-row">
    <div class="flex flex-col space-y-2 mr-5">
        <label class="text-white" for="duration">Duration:</label>
        <textarea name="duration" class="p-2 border w-96 border-gray-300 rounded-md">{{$movie['duration']}}</textarea>
    </div>

    <div class="flex flex-col space-y-2">
        <label class="text-white" for="releaseYear">Release Year:</label>
        <textarea name="releaseYear" class="p-2 border w-96 border-gray-300 rounded-md">{{$movie['releaseYear']}}</textarea>
    </div>
    </div>
    <div class="flex flex-row">
    <div class="flex flex-col space-y-2 mr-5">
        <label class="text-white" for="descriptionShort">Short Description:</label>
        <textarea name="descriptionShort" class="p-2 border w-96 border-gray-300 rounded-md">{{$movie['descriptionShort']}}</textarea>
    </div>

    <div class="flex flex-col space-y-2">
        <label class="text-white" for="actors">Actors:</label>
        <textarea name="actors" class="p-2 border w-96 border-gray-300 rounded-md">@foreach($actorIds as $actor){{$actor}},@endforeach</textarea>
    </div>
    </div>
    <div class="flex flex-row">
    <div class="flex flex-col space-y-2 mr-5">
        <label class="text-white" for="directors">Directors:</label>
        <textarea name="directors" class="p-2 border w-96 border-gray-300 rounded-md">@foreach($directorIds as $director){{$director}},@endforeach</textarea>
    </div>

    <div class="flex flex-col space-y-2">
        <label class="text-white" for="producers">Producers:</label>
        <textarea name="producers" class="p-2 border w-96 border-gray-300 rounded-md">@foreach($producerIds as $producer){{$producer}},@endforeach</textarea>
    </div>
    </div>
    <div class="flex flex-row">
    <div class="flex flex-col space-y-2 mr-5">
        <label class="text-white" for="rating">Rating:</label>
        <textarea name="rating" class="p-2 border w-96 border-gray-300 rounded-md">{{$movie['rating']}}</textarea>
    </div>

    <div class="flex flex-col space-y-2">
        <label class="text-white" for="descriptionLong">Long description:</label>
        <textarea name="descriptionLong" class="p-2 w-96 border border-gray-300 rounded-md">{{$movie['descriptionLong']}}</textarea>
    </div>
    </div>
    <x-primary-button type="submit">{{ __('Update movie') }}</x-primary-button>
</form>
</div>
</x-app-layout>
