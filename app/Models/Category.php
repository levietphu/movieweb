<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public function movie_cates()
    {
        return $this->belongsToMany(Movie::class, 'cate_movie', 'id_cate', 'id_movie');
    }
}
