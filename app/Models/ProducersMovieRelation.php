<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProducersMovieRelation extends Model
{
    // use HasFactory;

    protected $table = 'producersMovieRelations';

    protected $fillable = ['id', 'movieId', 'producerId'];

}