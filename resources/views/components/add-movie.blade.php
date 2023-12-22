<form action="/adminPage" method="post" class="space-y-4">
    @csrf
    <div class="flex flex-row">
    <div class="flex flex-col space-y-2 mr-5">
        <label class="text-white" for="title">Title:</label>
        <textarea name="title" class="p-2 border border-gray-300 rounded-md"></textarea>
    </div>

    <div class="flex flex-col space-y-2">
        <label class="text-white" for="imageReference">Image:</label>
        <textarea name="imageReference" class="p-2 border border-gray-300 rounded-md"></textarea>
    </div>
    </div>
    <div class="flex flex-row">
    <div class="flex flex-col space-y-2 mr-5">
        <label class="text-white" for="duration">Duration:</label>
        <textarea name="duration" class="p-2 border border-gray-300 rounded-md"></textarea>
    </div>

    <div class="flex flex-col space-y-2">
        <label class="text-white" for="releaseYear">Release Year:</label>
        <textarea name="releaseYear" class="p-2 border border-gray-300 rounded-md"></textarea>
    </div>
    </div>
    <div class="flex flex-row">
    <div class="flex flex-col space-y-2 mr-5">
        <label class="text-white" for="descriptionShort">Short Description:</label>
        <textarea name="descriptionShort" class="p-2 border border-gray-300 rounded-md"></textarea>
    </div>

    <div class="flex flex-col space-y-2">
        <label class="text-white" for="actors">Actors:</label>
        <textarea name="actors" class="p-2 border border-gray-300 rounded-md"></textarea>
    </div>
    </div>
    <div class="flex flex-row">
    <div class="flex flex-col space-y-2 mr-5">
        <label class="text-white" for="directors">Directors:</label>
        <textarea name="directors" class="p-2 border border-gray-300 rounded-md"></textarea>
    </div>

    <div class="flex flex-col space-y-2">
        <label class="text-white" for="producers">Producers:</label>
        <textarea name="producers" class="p-2 border border-gray-300 rounded-md"></textarea>
    </div>
    </div>
    <div class="flex flex-row">
    <div class="flex flex-col space-y-2 mr-5">
        <label class="text-white" for="rating">Rating:</label>
        <textarea name="rating" class="p-2 border border-gray-300 rounded-md"></textarea>
    </div>

    <div class="flex flex-col space-y-2">
        <label class="text-white" for="descriptionLong">Long description:</label>
        <textarea name="descriptionLong" class="p-2 border border-gray-300 rounded-md"></textarea>
    </div>
    </div>
    <x-primary-button type="submit">{{ __('Add movie') }}</x-primary-button>
</form>