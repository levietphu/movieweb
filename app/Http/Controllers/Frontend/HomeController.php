<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\ReleaseTime;
use App\Models\National;
use App\Models\Movie;
use App\Models\ViewCount;
use DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $movie_le=Movie::where('type',0)->orderby('created_at','desc')->get();
        $movie_bo=Movie::where('type',1)->orderby('created_at','desc')->get();
        $cate = Category::where('slug','chieu-rap')->first();
        $movie_chieu_rap = $cate->movie_cates;

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
        return view('frontend.pages.home',compact('movie_chieu_rap','movie_le','movie_bo','top_view_this_day','top_view_this_Week','top_view_this_Month','top_view_all'));
    }
}
