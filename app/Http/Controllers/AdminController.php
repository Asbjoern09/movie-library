<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Movie;
use App\Models\Person;
use App\Models\ActorMovieRelation;
use App\Models\DirectorsMovieRelation;
use App\Models\ProducersMovieRelation;


class AdminController extends Controller
{
    public function show()
    {
        $movies = $this->getMovies();
        $people = $this->getActors();

        return View::make('adminPage', [
            'movies' => $movies,
            'people' => $people
        ]);
    }

    public function getMovies()
    {
        $movies = Movie::all()->toArray();

        return $movies;
    }

    public function getActors()
    {
        $people = Person::all()->toArray();

        return $people;
    }


    // adds movie to database and relation tables
    public function addMovie(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'imageReference' => 'required|string',
            'duration' => 'required|string',
            'releaseYear' => 'required|string',
            'descriptionShort' => 'required|string',
            'descriptionLong' => 'nullable|string',
            'directors' => 'nullable|string',
            'producers' => 'nullable|string',
            'actors' => 'nullable|string',
            'rating' => 'required|string',
        ]);

        $movie = Movie::create($request->except('directors', 'producers', 'actors'));
        $actors = explode(',', $request->input('actors'));
        foreach ($actors as $actorId) {
            ActorMovieRelation::create([
                'movieId' => $movie->id,
                'actorId' => $actorId,
            ]);
        }
        $directors = explode(',', $request->input('directors'));
        foreach ($directors as $directorId) {
            DirectorsMovieRelation::create([
                'movieId' => $movie->id,
                'directorId' => $directorId,
            ]);
        }
        $producers= explode(',', $request->input('producers'));
        foreach ($producers as $producerId) {
            ProducersMovieRelation::create([
                'movieId' => $movie->id,
                'producerId' => $producerId,
            ]);
        }

        return redirect('/adminPage')->with('success');
    }

    public function removeMovie($id)
    {

        ActorMovieRelation::where('movieId', $id)->delete();
        DirectorsMovieRelation::where('movieId', $id)->delete();
        ProducersMovieRelation::where('movieId', $id)->delete();

        Movie::destroy($id);

        return redirect('/adminPage')->with('success');
    }


    // loads the movie on the edit page
    public function editMovie($id)
    {
        $movie = Movie::find($id);

        $editing = true;

        $actorIds = ActorMovieRelation::where('movieId', $id)->pluck('actorId')->toArray();

        $directorIds = DirectorsMovieRelation::where('movieId', $id)->pluck('directorId')->toArray();

        $producerIds = ProducersMovieRelation::where('movieId', $id)->pluck('producerId')->toArray();

        // dd($actorIds);
         return View::make('editMoviePage', [
                'movie' => $movie,
                'actorIds' => $actorIds,
                'directorIds' => $directorIds,
                'producerIds' => $producerIds,
        ]);
    }


    // updates the movie when Update button is clicked / Put request is made
    public function updateMovie(Request $request, $id)
    {
        $updatedMovie = request()->all();
        // dd($updatedMovie)

        $movie = Movie::find($id);
        $movie->title = $updatedMovie['title'];
        $movie->imageReference = $updatedMovie['imageReference'];
        $movie->duration = $updatedMovie['duration'];
        $movie->releaseYear = $updatedMovie['releaseYear'];
        $movie->descriptionShort = $updatedMovie['descriptionShort'];
        $movie->descriptionLong = $updatedMovie['descriptionLong'];
        $movie->rating = $updatedMovie['rating'];

        $movie->save();

        $actorIds = ActorMovieRelation::where('movieId', $id)->pluck('actorId')->toArray();

        // dd($actorIds);

        $directorIds = DirectorsMovieRelation::where('movieId', $id)->pluck('directorId')->toArray();

        $producerIds = ProducersMovieRelation::where('movieId', $id)->pluck('producerId')->toArray();

        $updatedActorIds = explode(',',$updatedMovie['actors']);
        $updatedDirectorIds = explode(',',$updatedMovie['directors']);
        $updatedProducerIds = explode(',',$updatedMovie['producers']);

        
        $actorIdsToDelete = array_diff($actorIds, $updatedActorIds);
        //  dd($actorIdsToDelete);
        $directorIdsToDelete = array_diff($directorIds, $updatedDirectorIds);
        $producerIdsToDelete = array_diff($producerIds, $updatedProducerIds);
        
        ActorMovieRelation::where('movieId', $id)->whereIn('actorId', $actorIdsToDelete)->delete();
        DirectorsMovieRelation::where('movieId', $id)->whereIn('directorId', $directorIdsToDelete)->delete();
        ProducersMovieRelation::where('movieId', $id)->whereIn('producerId', $producerIdsToDelete)->delete();

        
        if (!$updatedActorIds[0] == 0) {
            $updatedActorIds = array_diff($updatedActorIds, $actorIds);
            // dd($updatedActorIds);
            foreach ($updatedActorIds as $updatedActorIdString) {
                $updatedActorId = (int)$updatedActorIdString;
                if ($updatedActorId != 0) {
                    ActorMovieRelation::create(['movieId' => $id, 'actorId' => $updatedActorId]);
                }
            }
        }
        if (!$updatedDirectorIds[0] == 0) {
            $updatedDirectorIds = array_diff($updatedDirectorIds, $directorIds);
            foreach ($updatedDirectorIds as $updatedDirectorIdString) {
                $updatedDirectorId = (int)$updatedDirectorIdString;
                if ($updatedDirectorId != 0) {
                    DirectorsMovieRelation::create(['movieId' => $id, 'directorId' => $updatedDirectorId]);
                }
            }
        }
        if (!$updatedProducerIds[0] == 0) {
            $updatedProducerIds = array_diff($updatedProducerIds, $producerIds);
            foreach ($updatedProducerIds as $updatedProducerIdString) {
                $updatedProducerId = (int)$updatedProducerIdString;
                if ($updatedProducerId != 0) {
                    ProducersMovieRelation::create(['movieId' => $id, 'producerId' => $updatedProducerId]);
                }
            }
        }
        
        return redirect()->route('admin.page.show');
    }
}
