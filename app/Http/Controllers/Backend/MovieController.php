<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Log;
use App\Models\Movie;
use App\Models\Category;
use App\Models\National;
use App\Models\ReleaseTime;
use App\Models\Translate;
use App\Models\Seri;
use App\Models\Actor;
use App\Http\Requests\AddMovieRequest;
use App\Http\Requests\UpdateMovieRequest;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movie = Movie::orderby('created_at','desc')->get();
        
        return view('backend.movie.index',compact('movie'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate = Category::all();
        $national = National::all();
        $release = ReleaseTime::all();
        $translate = Translate::all();
        $seri = Seri::all();
        $actor = Actor::all();
        return view('backend.movie.create',compact('cate','national','release','translate','seri','actor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddMovieRequest $req)
    {
        $image = str_replace(url('public/uploads'),'',$req->image);
        try{
            DB::beginTransaction();
            $movie = new Movie;
            $movie->substitute_name = $req->substitute_name;
            $movie->name = $req->name;
            $movie->slug = $req->slug;
            $movie->type = $req->type;
            $movie->status = $req->status;
            $movie->id_release_time = $req->id_release_time;
            $movie->id_national = $req->id_national;
            $movie->id_seri = $req->id_seri;
            $movie->director = $req->director;
            $movie->IMDb = $req->IMDb;
            $movie->all_episode = $req->all_episode;
            $movie->movie_duration = $req->movie_duration;
            $movie->image = $image;
            $movie->content = $req->content;
            $movie->save();

            $movie->cate_movies()->attach($req->id_cate);
            $movie->tran_movies()->attach($req->id_tran);
            $movie->actor_movies()->attach($req->id_actor);
            DB::commit();
            return redirect()->route('movie.index')->with('success','Thêm thành công');

        }catch(\Exception $exception){
            Log::error('message:'.$exception->getMessage().'Line:'.$exception->getLine());
            DB::rollback();
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit= Movie::find($id);
        $cate = Category::all();
        $national = National::all();
        $release = ReleaseTime::all();
        $translate = Translate::all();
        $seri = Seri::all();
        $actor = Actor::all();
        return view('backend.movie.edit',compact('cate','national','release','translate','seri','actor','edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMovieRequest $req, $id)
    {
        $image = str_replace(url('public/uploads'),'',$req->image);
        try{
            DB::beginTransaction();
            $movie = Movie::find($id);
            $movie->substitute_name = $req->substitute_name;
            $movie->name = $req->name;
            $movie->slug = $req->slug;
            $movie->type = $req->type;
            $movie->status = $req->status;
            $movie->id_release_time = $req->id_release_time;
            $movie->id_national = $req->id_national;
            $movie->id_seri = $req->id_seri;
            $movie->director = $req->director;
            $movie->IMDb = $req->IMDb;
            $movie->all_episode = $req->all_episode;
            $movie->movie_duration = $req->movie_duration;
            $movie->image = $image;
            $movie->content = $req->content;
            $movie->save();

            $movie->cate_movies()->sync($req->id_cate);
            $movie->tran_movies()->sync($req->id_tran);
            $movie->actor_movies()->sync($req->id_actor);
            DB::commit();
            return redirect()->route('movie.index')->with('success','Cập nhật thành công');

        }catch(\Exception $exception){
            Log::error('message:'.$exception->getMessage().'Line:'.$exception->getLine());
            DB::rollback();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Movie::find($id)->delete();
        return redirect()->back()->with('success','Xóa thành công');
    }
}
