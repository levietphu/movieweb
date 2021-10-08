<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\National;
use DB;
use Log;
use App\Http\Requests\AddNationalRequest;
use App\Http\Requests\UpdateNationalRequest;

class NationalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $national = National::all();
        return view('backend.national.index',compact('national'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.national.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddNationalRequest $req)
    {
        try{
            DB::beginTransaction();
            $national = new National;
            $national->name = $req->name;
            $national->slug = $req->slug;
            $national->status = $req->status;
            $national->save();
            DB::commit();

        }catch(\Exception $exception){
            Log::error('message:'.$exception->getMessage().'Line:'.$exception->getLine());
            DB::rollback();
        }
        return redirect()->route('national.index')->with('success','Thêm thành công');
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
        $edit = National::find($id);
        return view('backend.national.edit',compact('edit'));
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
            $national = National::find($id);
            $national->name = $req->name;
            $national->slug = $req->slug;
            $national->status = $req->status;
            $national->save();
            DB::commit();

        }catch(\Exception $exception){
            Log::error('message:'.$exception->getMessage().'Line:'.$exception->getLine());
            DB::rollback();
        }
        return redirect()->route('national.index')->with('success','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        National::find($id)->delete();
        return redirect()->back()->with('success','Xóa thành công');
    }
}
