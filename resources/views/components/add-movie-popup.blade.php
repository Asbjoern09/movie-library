<x-primary-button id="addMovie" class="mt-2">{{ __('Add movie') }}</x-primary-button>
            <div id="addMovieDiv" class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 border-purple-dark-theme border-8 p-8 bg-purple-darker-theme hidden z-50">
            <div class="flex mb-5">
                <span id="closePopup" class="cursor-pointer text-xl"><x-primary-button>{{ __('Close') }}</x-primary-button></span>
            </div>
            <x-add-movie/>
        </div>

    <script src="{{ asset('js/add-movie-popup.js') }}"></script>


