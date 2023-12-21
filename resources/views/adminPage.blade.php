<x-app-layout>
<div class="flex justify-center">
<h1 class="text-white text-3xl justify-center mt-4" >Movies</h1>
</div>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<x-delete-array :models="$movies"/>
<div class="flex justify-center">

<h1 class="text-white text-3xl justify-center mt-4" >Actors</h1>
</div>
<x-delete-array :models="$people"/>

<h2 class="text-white">Add Movie</h2>
<x-add-movie/>
</x-app-layout>
