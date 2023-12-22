<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DirectorsMovieRelation extends Model
{
    // use HasFactory;

    protected $table = 'directorsMovieRelations';

    protected $fillable = ['id', 'movieId', 'directorId'];

}