<!DOCTYPE html>

<?php 
    use App\Http\Controllers\MoviepageController;
?> 

<x-app-layout>
<html>
    <body >
        <div style="float:left; width: 50%" class="text-gray-200 dark:text-gray-200 pt-10 pl-20 text-2xl">
            <section id="moviePoster" style="margin-top: 15px;">
                <div style="float:left; margin-right: 15px;">
                    <img class="flex object-cover h-72 min-w-full" src="{{ asset('pictures/' . $movie['imageReference']) }}" alt="movie poster">
                </div>
            </section>
            <section id="movieInfo" >
                <h1 style="font-size:1.25em;font-weight:bold; margin-top: 15px;"> {{ $movie['title'] }} </h1>
                <div> {{ $movie['duration'] }} </div>
                <div> {{ $movie['releaseYear']}} </div>
                <h1 style="font-size:1.25em;font-weight:bold;  margin-top: 15px;">Rating</h1>
                <div> {{$movie['rating']}} </div>
                <h1 style="font-size:1.25em;font-weight:bold;  margin-top: 15px;">Biography</h1>
                <div> {{$movie['descriptionLong']}} </div>
            </section>
            <br><br><br>

        <?php
        if(isset($_GET['submit'])){
            MoviepageController::insertComment($id, $_GET['comment']);
            $url =  $movie->{'id'};
            header('Location: http://localhost:8000/movie/'. $url);
            exit;
        } 
        ?>

        @if (Route::has('login'))
        @auth
        <form method="get">
            <label for="coment">Join the discussion</label>
            <br>
            <input id="comment" name="comment" type="text" placeholder="Comment" size="60%" style="color: black">
            <input type="submit" name="submit" value="Submit">
        </form>
        @endauth
        @endif

        <div>
                <?php foreach ($comments as &$value): ?>
                    <h3 style="font-size: 15px;">                    
                    {{ $value->commentor->name;}}      {{$value["created_at"]}} </h3>
                    <div class="p-2 box-border h-auto w-auto p-1 border-2 bg-gray-200 rounded" style="margin-bottom: 5 px">
                        <?php $comment = $value[0]; ?>
            
                        <p class="text-gray-700 text-xl">{{ $value["comment"]; }}</p>                       
                    </div>
                <?php endforeach; ?>
        </div>
    </div>
        
        <div style="float: right; width: 50%" class="vl; text-gray-200 dark:text-gray-200 pt-10 pl-20 text-2xl">

                <div style="margin-top: 15px; width: 100%"> Directors:
                <?php foreach ($directors as &$value): ?>
                    <div style="margin-top: 15px; width: 100%;">
                        <?php $director = $value[0]; ?>
            
                        <div style="float:left; width: 100%;">
                            <img style="float:left; margin-bottom:15px;" width="120px" height="120px" src="{{ asset('pictures/' . $director['imageReference']) }}"/>
                            <div style="font-weight:bold;">{{ $director["name"]; }}</div>
                            <div>Birthday: {{ $director["birthday"]; }}</div>
                            <div>{{ $director["nationality"];}}</div>
                        </div>
                       
                    </div>
                <?php endforeach; ?>
                </div>

                <div style="margin-top: 15px; width: 100%"> Producers:
                <?php foreach ($producers as &$value): ?>
                    <div style="margin-top: 15px; width: 100%;">
                        <?php $producer = $value[0]; ?>
            
                        <div style="float:left; width: 100%;">
                            <img style="float:left; margin-bottom:15px;" width="120px" height="120px" src="{{ asset('pictures/' . $producer['imageReference']) }}"/>
                            <div style="font-weight:bold;">{{ $producer["name"]; }}</div>
                            <div>Birthday: {{ $producer["birthday"]; }}</div>
                            <div>{{ $producer["nationality"];}}</div>
                        </div>
                       
                    </div>
                <?php endforeach; ?>
                </div>

                <div style="margin-top: 15px; width: 100%"> Actors:
                <?php foreach ($actors as &$value): ?>
                    <div style="margin-top: 15px; width: 100%;">
                        <?php $actor = $value; ?>
            
                        <div style="float:left; width: 100%;">
                            <img style="float:left; margin-bottom:15px;" width="120px" height="120px" src="{{ asset('pictures/' . $actor['imageReference']) }}"/>
                            <div style="font-weight:bold;">{{ $actor["name"]; }}</div>
                            <div>Birthday: {{ $actor["birthday"]; }}</div>
                            <div>{{ $actor["nationality"];}}</div>
                        </div>
                       
                    </div>
                <?php endforeach; ?>
                </div>
        </div>
    </body>
</html>
</x-app-layout>

