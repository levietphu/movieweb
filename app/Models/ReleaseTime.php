<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReleaseTime extends Model
{
    use HasFactory;
    /**
     * ReleaseTime has many Release_movie.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function release_movie()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = releaseTime_id, localKey = id)
        return $this->hasMany(Movie::class,'id_release_time','id');
    }
}
