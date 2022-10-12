<?php

namespace App\Http\Controllers;

use App\Models\canhan;
use Illuminate\Http\Request;
use Carbon\Carbon;
use File;
use Toastr;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;

class canhan_controller extends Controller
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
            $data=canhan::all();
            return view('admin.canhan.index',compact('data'));
        }
        else
        {
            Toastr::warning('Bạn không có quyền truy cập vào bảng hình ảnh cá nhân','Hạn chế truy cập');
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
        //
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
            $file_name=time().'-canhan'.'.'.$ex;
            $file->move(public_path('uploads/canhan'),$file_name);
          
        }
        $request->merge(['avatar'=>$file_name]);
        

        if(canhan::create($request->all())){
            Toastr::success('Thêm hình ảnh thành công','Thêm hình ảnh');
            return redirect('admin/canhan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\canhan  $canhan
     * @return \Illuminate\Http\Response
     */
    public function show(canhan $canhan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\canhan  $canhan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = canhan::find($id);
		return view('admin.canhan.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\canhan  $canhan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->has('file_uploads')){
            $file=$request->file_uploads;
            $ex=$request->file_uploads->extension();
            $file_name=time().'-canhan'.'.'.$ex;
            $file->move(public_path('uploads/canhan'),$file_name);

            $data=canhan::find($id);
            File::delete('public/uploads/canhan/'.$data->avatar);
            $request->merge(['avatar'=>$file_name]); 
        }
    
        if(canhan::find($id)->update($request->all())){
            Toastr::success('Cập nhật hình ảnh thành công','Cập nhật hình ảnh');
            return redirect('admin/canhan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\canhan  $canhan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=canhan::find($id);
        $duongdan = 'public/uploads/canhan';
        File::delete($duongdan.'/'.$data->avatar);
        $data->delete();
        if( $data){
            Toastr::success('Xóa bài viết thành công','Xóa bài viết');
            return redirect('admin/canhan');
        }
    }
}
