<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    public function cate_movies()
    {
        return $this->belongsToMany(Category::class, 'cate_movie', 'id_movie', 'id_cate');
    }
    public function tran_movies()
    {
        return $this->belongsToMany(Translate::class, 'tran_movie', 'id_movie', 'id_tran');
    }
    public function actor_movies()
    {
        return $this->belongsToMany(Actor::class, 'actor_movie', 'id_movie', 'id_actor');
    }
    /**
     * Movie has many Movie_episode.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function movie_episode()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = movie_id, localKey = id)
        return $this->hasMany(Episode::class,'id_movie','id');
    }
    /**
     * Movie belongs to Nationals.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function nationals()
    {
        // belongsTo(RelatedModel, foreignKey = nationals_id, keyOnRelatedModel = id)
        return $this->belongsTo(National::class,'id_national','id');
    }
    /**
     * Movie belongs to Release.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function release()
    {
        // belongsTo(RelatedModel, foreignKey = release_id, keyOnRelatedModel = id)
        return $this->belongsTo(ReleaseTime::class,'id_release_time','id');
    }
   /**
    * Query scope .
    *
    * @param  \Illuminate\Database\Eloquent\Builder
    * @return \Illuminate\Database\Eloquent\Builder
    */
   public function scopeSort($query,$req)
   {
        if ($req->sort=='new') {   
            return $query->orderby('movies.created_at','desc');
        }else{
            return $query->orderby('movies.view_count','desc');
        }
   }
   public function scopeType($query,$req)
   {
        if ($req->type!='') {   
            return $query->where('movies.type',$req->type);
        }
   }
    public function scopeStatus($query,$req)
   {
        if ($req->status!='') {   
            return $query->where('movies.status',$req->status);
        }
   }
   public function scopeNational($query,$req)
   {
        if ($req->id_national!='') {   
            return $query->where('movies.id_national',$req->id_national);
        }
   }
   public function scopeRelease($query,$req)
   {
        if ($req->release!='') {   
            return $query->where('movies.id_release_time',$req->release);
        }
   }
   public function scopeCate($query,$req)
   {
        if ($req->id_cate!='') {   
            return $query->where('categories.id',$req->id_cate);
        }
   }
}
