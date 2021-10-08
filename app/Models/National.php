<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class National extends Model
{
    use HasFactory;
    /**
     * National has many National_movie.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function national_movie()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = national_id, localKey = id)
        return $this->hasMany(Movie::class,'id_national','id');
    }
}
