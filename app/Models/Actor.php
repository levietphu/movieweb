<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;
    public function movie_actor()
    {
        return $this->belongsToMany(Movie::class, 'actor_movie', 'id_actor', 'id_movie');
    }
}
