<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ReleaseTime;
use DB;
use Log;
use App\Http\Requests\AddReleaseTimeRequest;
use App\Http\Requests\UpdateReleaseTimeRequest;

class ReleaseTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $release = ReleaseTime::all();
        return view('backend.release_time.index',compact('release'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.release_time.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddReleaseTimeRequest $req)
    {
        try{
            DB::beginTransaction();
            $release = new ReleaseTime;
            $release->name = $req->name;
            $release->slug = $req->slug;
            $release->status = $req->status;
            $release->save();
            DB::commit();

        }catch(\Exception $exception){
            Log::error('message:'.$exception->getMessage().'Line:'.$exception->getLine());
            DB::rollback();
        }
        return redirect()->route('release_time.index')->with('success','Thêm thành công');
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
        $edit = ReleaseTime::find($id);
        return view('backend.release_time.edit',compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        try{
            DB::beginTransaction();
            $release = ReleaseTime::find($id);
            $release->name = $req->name;
            $release->slug = $req->slug;
            $release->status = $req->status;
            $release->save();
            DB::commit();

        }catch(\Exception $exception){
            Log::error('message:'.$exception->getMessage().'Line:'.$exception->getLine());
            DB::rollback();
        }
        return redirect()->route('release_time.index')->with('success','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ReleaseTime::find($id)->delete();
        return redirect()->back()->with('success','Xóa thành công');
    }
}
