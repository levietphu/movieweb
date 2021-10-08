<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Episode;
use App\Models\Translate;
use DB;
use Log;
use App\Http\Requests\AddEpisodeRequest;
use App\Http\Requests\UpdateEpisodeRequest;

class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_movie)
    {
        $episode = Episode::where('id_movie',$id_movie)->get();
        return view('backend.episode.index',compact('episode','id_movie'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_movie)
    {
        $tran = Translate::where('type',0)->get();
        return view('backend.episode.create',compact('id_movie','tran'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddEpisodeRequest $req,$id_movie)
    {
        try{
            DB::beginTransaction();
            $episode = new Episode;
            $episode->description_name = $req->description_name;
            $episode->name = $req->name;
            $episode->slug = $req->slug;
            $episode->id_movie = $id_movie;
            $episode->id_tran = $req->id_tran;
            $episode->link = $req->link;
            $episode->status = $req->status;
            $episode->save();
            DB::commit();

        }catch(\Exception $exception){
            Log::error('message:'.$exception->getMessage().'Line:'.$exception->getLine());
            DB::rollback();
        }
        return redirect()->route('episode.index',$id_movie)->with('success','Thêm thành công');
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
    public function edit($id_movie,$id_episode)
    {
        $edit = Episode::find($id_episode);
        $tran = Translate::where('type',0)->get();
        return view('backend.episode.edit',compact('id_movie','tran','edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEpisodeRequest $request,$id_movie, $id_episode)
    {
        try{
            DB::beginTransaction();
            $episode = Episode::find($id_episode);
            $episode->description_name = $req->description_name;
            $episode->name = $req->name;
            $episode->slug = $req->slug;
            $episode->id_movie = $id_movie;
            $episode->id_tran = $req->id_tran;
            $episode->link = $req->link;
            $episode->status = $req->status;
            $episode->save();
            DB::commit();

        }catch(\Exception $exception){
            Log::error('message:'.$exception->getMessage().'Line:'.$exception->getLine());
            DB::rollback();
        }
        return redirect()->route('episode.index',$id_movie)->with('success','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_movie,$id_episode)
    {
        Episode::find($id_episode)->delete();
        return redirect()->back()->with('success','Xóa thành công');
    }
}
