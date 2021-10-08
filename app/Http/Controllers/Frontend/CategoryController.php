<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Movie;
use DB;
use Carbon\Carbon;

class CategoryController extends Controller
{
    public function cate($slug)
    {
        $cate = Category::where('slug',$slug)->first();
        $cate_name= $cate->name;
        $movie = $cate->movie_cates()->paginate(1);

        // phân trang
         if(isset($_GET['page'])&&$_GET['page']>$movie->lastPage()){
            return abort(404);
        }
        if (isset($_GET['page'])&&$_GET['page']<0) {
            return abort(404);
        }
        $page_limit = 4;
        $half_total_links = floor($page_limit / 2);
            $from = $movie->currentPage() - $half_total_links;
            $to = $movie->currentPage() + $half_total_links;
            if ($movie->currentPage() < $half_total_links) {
               $to += $half_total_links - $movie->currentPage();
            }
            if ($movie->lastPage() - $movie->currentPage() < $half_total_links) {
                $from -= $half_total_links - ($movie->lastPage()- $movie->currentPage());
            }

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
         return view('frontend.pages.category',compact('movie','to','from','top_view_all','top_view_this_day','top_view_this_Week','top_view_this_Month','cate_name'));
    }
}
