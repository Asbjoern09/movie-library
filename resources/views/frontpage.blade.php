<x-app-layout>
    <!DOCTYPE html>
    <head>
        <title>Frontpage</title>
    </head>
    <body>
        <div class="contentsContainer">
            <div class="text-gray-200 dark:text-gray-200 pt-10 pl-20 text-2xl">
                Top movies:
            </div>
            <x-movie-image-array :movies="$movies" />
            <div class="actors">
                <div class="text-gray-200 dark:text-gray-200 pt-10 pl-20 text-2xl">
                    Actors:
                </div>
                <div class="movies flex flex-row w-500 white-space-nowrap overflow-x-auto p-20 pb-5 pt-5">
                    <x-actor-image-array />
                </div>
            </div>
        </div>
    </body>
</x-app-layout>
