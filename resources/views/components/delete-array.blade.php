<div class="flex flex-row h-104 white-space-nowrap overflow-x-auto p-20 pb-5 pt-0">
    @foreach($models as $model)
        <div class="flex-shrink-0 p-3 w-48 h-96 flex flex-col items-stretch">
            @if (!empty($model['title']))
            <a href="{{ 'editMoviePage/' . $model['id']}}">
                <img class="object-cover w-26 h-64" src="{{ asset('pictures/' . $model['imageReference']) }}" alt="movie poster">
            </a>
            <div class="text-white flex-grow" style="white-space: normal; word-break: break-word; max-width: 300px;">
                {{ $model['title'] }}
                <br>
                {{ $model['descriptionShort'] }}
            </div>
            @elseif (!empty($model['name']))
            <a href="{{ 'actor/' . $model['id']}}">
                <img class="object-cover w-26 h-64" src="{{ asset('pictures/' . $model['imageReference']) }}" alt="movie poster">
            </a>
            <div class="text-white flex-grow" style="white-space: normal; word-break: break-word; max-width: 300px;">
                {{ $model['name'] }}
                <br>
                {{ $model['birthday'] }}
            </div>
            @endif
            <form action="/adminPage/{{ $model['id'] }}" method="post" style="display: inline;">
                @csrf
                @method('delete')
                <x-primary-button>{{ __('Delete') }}</x-primary-button>
            </form>
        </div>
    @endforeach
</div>
