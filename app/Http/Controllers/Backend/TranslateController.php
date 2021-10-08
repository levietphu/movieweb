<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Translate;
use DB;
use Log;
use App\Http\Requests\AddTranslateRequest;
use App\Http\Requests\UpdateTranslateRequest;

class TranslateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $translate = Translate::all();
        return view('backend.translate.index',compact('translate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.translate.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddTranslateRequest $req)
    {
        try{
            DB::beginTransaction();
            $translate = new Translate;
            $translate->name = $req->name;
            $translate->slug = $req->slug;
            $translate->type = $req->type;
            $translate->status = $req->status;
            $translate->save();
            DB::commit();

        }catch(\Exception $exception){
            Log::error('message:'.$exception->getMessage().'Line:'.$exception->getLine());
            DB::rollback();
        }
        return redirect()->route('translate.index')->with('success','Thêm thành công');
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
        $edit = Translate::find($id);
        return view('backend.translate.edit',compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTranslateRequest $req, $id)
    {
        try{
            DB::beginTransaction();
            $translate = Translate::find($id);
            $translate->name = $req->name;
            $translate->slug = $req->slug;
            $translate->type = $req->type;
            $translate->status = $req->status;
            $translate->save();
            DB::commit();

        }catch(\Exception $exception){
            Log::error('message:'.$exception->getMessage().'Line:'.$exception->getLine());
            DB::rollback();
        }
        return redirect()->route('translate.index')->with('success','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Translate::find($id)->delete();
        return redirect()->back()->with('success','Xóa thành công');
    }
}
