<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Person;
use App\Models\Comment;
use App\Models\ActorMovieRelation;
use App\Models\DirectorsMovieRelation;
use App\Models\ProducersMovieRelation;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


class MoviepageController extends Controller
{
    public function show($id)
    {
        $movie = Movie::find($id);
        
        $actorIds = ActorMovieRelation::where('movieId', $id)->pluck('actorId')->toArray();
        $actors = Person::whereIn('id', $actorIds)->get();
        // dd($actors);

        $DirectorIds = DirectorsMovieRelation::where('movieId', $id)->get();
        $directors = array();
        foreach ($DirectorIds as &$value) {
            array_push($directors, Person::find($value));
        }

        $ProducerIds = ProducersMovieRelation::where('movieId', $id)->get();
        $producers = array();
        foreach ($ProducerIds as &$value) {
            array_push($producers, Person::find($value));
        }

        $comments = Comment::where('movieId', $id)->get();

        return view('moviepage', ['movie' => $movie, 'id' => $id, 'actors' => $actors, 'directors' => $directors, 'producers' => $producers, 'comments' => $comments]);
    }

    public static function insertComment($id, $inputValue) {
        Comment::insert([
            ['movieId' => $id, 'comment' => $inputValue, 'user' => Auth::user()->id, 'created_at' => now()],
        ]);
    }
}
