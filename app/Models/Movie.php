<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    // use HasFactory;

    protected $movies = 'movies';

    protected $fillable = [
        'title',
        'imageReference',
        'duration',
        'releaseYear',
        'descriptionShort',
        'descriptionLong',
        'directors',
        'producers',
         'actors',
        'rating',
    ];

    public function comments() {
        return $this->hasMany(Comment::class, 'movieId');
    }
}
