<?php

namespace App\Http\Controllers;

use App\Models\lienhe;
use App\Models\nhanvien;
use File;
use Illuminate\Http\Request;
use Toastr;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class lienhe_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->chucvu_id==1)
        {
            $data=lienhe::all();
            return view('admin.lienhe.index',compact('data'));
        }
        else
        {
            Toastr::warning('Bạn không có quyền truy cập vào bảng thông tin hệ thống','Hạn chế truy cập');
            return redirect()->route('admin.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.lienhe.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->has('file_uploads')){
            
            $file=$request->file_uploads;
            $ex=$request->file_uploads->extension();
            $file_name=time().'-logo'.'.'.$ex;
            $file->move(public_path('uploads'),$file_name);
          
        }
        $request->merge(['logo'=>$file_name]);

        if(lienhe::create($request->all())){
            return redirect('admin/lienhe');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\lienhe  $lienhe
     * @return \Illuminate\Http\Response
     */
    public function show(lienhe $lienhe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\lienhe  $lienhe
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = lienhe::find($id);
		return view('admin.lienhe.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\lienhe  $lienhe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->has('file_uploads')){
            $file=$request->file_uploads;
            $ex=$request->file_uploads->extension();
            $file_name=time().'-logo'.'.'.$ex;
            $file->move(public_path('uploads'),$file_name);

            $data=lienhe::find($id);
            File::delete('public/uploads/'.$data->logo);
            $request->merge(['logo'=>$file_name]); 
        }
    
        if(lienhe::find($id)->update($request->all())){
            Toastr::success('Cập nhật liên hệ thành công','Cập nhật liên hệ');
            return redirect('admin/lienhe');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\lienhe  $lienhe
     * @return \Illuminate\Http\Response
     */
    public function destroy(lienhe $lienhe)
    {
        //
    }
}
