<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;
    /**
     * Episode belongs to Tran_episode.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tran_episode()
    {
        // belongsTo(RelatedModel, foreignKey = tran_episode_id, keyOnRelatedModel = id)
        return $this->belongsTo(Translate::class,'id_tran','id');
    }
    /**
     * Episode belongs to Episode_movie.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function episode_movie()
    {
        // belongsTo(RelatedModel, foreignKey = episode_movie_id, keyOnRelatedModel = id)
        return $this->belongsTo(Movie::class,'id_movie','id');
    }
}
