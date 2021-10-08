<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\ViewCountMovie;
use App\Models\Movie;
use App\Models\Category;
use App\Models\Episode;
use Carbon\Carbon;
use DB;

class MovieController extends Controller
{
    public function movie($slug_movie)
    {
        $movie = Movie::where('slug',$slug_movie)->first();
        $name_movie = $movie->name;
        $cate = $movie->cate_movies()->inRandomOrder()->first();
        $can_view_movie = $cate->movie_cates()->where('slug','!=',$slug_movie)->limit(4)->get();
        event(new ViewCountMovie($movie));
        return view('frontend.pages.movies', compact('movie','can_view_movie','name_movie'));
    }
    public function playmovie($slug)
    {
        $episode = Episode::where('slug',$slug)->first();
        $name_episode = $episode->name;
        $all_episode = Episode::where('id_movie',$episode->id_movie)->get();
        $movie = Movie::find($episode->id_movie);
        $cate = $movie->cate_movies()->inRandomOrder()->first();
        $can_view_movie = $cate->movie_cates()->where('slug','!=',$movie->slug)->limit(4)->get();

        // Ngày
        $start_this_day = Carbon::now()->startOfDay();
        $end_this_day = Carbon::now()->endOfDay();
        $top_view_this_day = Movie::join('view_counts','view_counts.id_movie','=','movies.id')->whereBetween('view_counts.created_at',[$start_this_day,$end_this_day])->orderby(DB::raw('Count(view_counts.id_movie)'), 'desc')->groupBy('view_counts.id_movie')->limit(10)->get(array(DB::raw('count(view_counts.id_movie) as total_view'),'movies.*'));

        //Tuần
        $start_this_Week = Carbon::now()->startOfWeek();
        $end_this_Week = Carbon::now()->endOfWeek();
        $top_view_this_Week = Movie::join('view_counts','view_counts.id_movie','=','movies.id')->whereBetween('view_counts.created_at',[$start_this_Week,$end_this_Week])->orderby(DB::raw('Count(view_counts.id_movie)'), 'desc')->groupBy('view_counts.id_movie')->limit(10)->get(array(DB::raw('count(view_counts.id_movie) as total_view'),'movies.*'));

        // Tháng
        $start_this_Month = Carbon::now()->startOfMonth();
        $end_this_Month = Carbon::now()->endOfMonth();
        $top_view_this_Month = Movie::join('view_counts','view_counts.id_movie','=','movies.id')->whereBetween('view_counts.created_at',[$start_this_Month,$end_this_Month])->orderby(DB::raw('Count(view_counts.id_movie)'), 'desc')->groupBy('view_counts.id_movie')->limit(10)->get(array(DB::raw('count(view_counts.id_movie) as total_view'),'movies.*'));

        //all 
        $top_view_all = Movie::orderby('view_count','desc')->limit(10)->get();
        
        return view('frontend.pages.playmovie', compact('top_view_all','top_view_this_day','top_view_this_Week','top_view_this_Month','episode','all_episode','name_episode','can_view_movie'));
    }
}
