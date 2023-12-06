<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Movie;
use App\Models\Actor;

class AdminController extends Controller
{
    public function show()
    {
        $movies = $this->getMovies();
        $actors = $this->getActors();

        return View::make('adminPage', [
            'movies' => $movies,
            'actors' => $actors
        ]);
    }

    public function getMovies()
    {
        $movies = Movie::all()->toArray();

        return $movies;
    }

    public function getActors()
    {
        $actors = Actor::all()->toArray();

        return $actors;
    }

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
            // 'actors' => 'nullable|string',
            'rating' => 'required|string',
            // Add validation for other fields if necessary
        ]);

        Movie::create($request->all());

        return redirect('/adminPage')->with('success', 'Movie added successfully.');
    }
    public function removeMovie($id)
    {
        Movie::destroy($id);

        return redirect('/adminPage')->with('success', 'Movie deleted successfully.');
    }
}
