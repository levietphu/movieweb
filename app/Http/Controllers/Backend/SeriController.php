<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seri;
use DB;
use Log;
use App\Http\Requests\AddSeriRequest;
use App\Http\Requests\UpdateSeriRequest;

class SeriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seri = Seri::all();
        return view('backend.seri.index',compact('seri'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.seri.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddSeriRequest $req)
    {
        try{
            DB::beginTransaction();
            $seri = new Seri;
            $seri->name = $req->name;
            $seri->slug = $req->slug;
            $seri->status = $req->status;
            $seri->save();
            DB::commit();

        }catch(\Exception $exception){
            Log::error('message:'.$exception->getMessage().'Line:'.$exception->getLine());
            DB::rollback();
        }
        return redirect()->route('seri.index')->with('success','Thêm thành công');
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
        $edit = Seri::find($id);
        return view('backend.seri.edit',compact('edit'));
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
            $seri = Seri::find($id);
            $seri->name = $req->name;
            $seri->slug = $req->slug;
            $seri->status = $req->status;
            $seri->save();
            DB::commit();

        }catch(\Exception $exception){
            Log::error('message:'.$exception->getMessage().'Line:'.$exception->getLine());
            DB::rollback();
        }
        return redirect()->route('seri.index')->with('success','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Seri::find($id)->delete();
        return redirect()->back()->with('success','Xóa thành công');
    }
}
