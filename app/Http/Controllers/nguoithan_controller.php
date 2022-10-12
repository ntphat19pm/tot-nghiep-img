<?php

namespace App\Http\Controllers;

use App\Models\nguoithan;
use Illuminate\Http\Request;
use Carbon\Carbon;
use File;
use Toastr;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;

class nguoithan_controller extends Controller
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
            $data=nguoithan::all();
            return view('admin.nguoithan.index',compact('data'));
        }
        else
        {
            Toastr::warning('Bạn không có quyền truy cập vào bảng hình ảnh người thân','Hạn chế truy cập');
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
            $file_name=time().'-nguoithan'.'.'.$ex;
            $file->move(public_path('uploads/nguoithan'),$file_name);
          
        }
        $request->merge(['avatar'=>$file_name]);
        

        if(nguoithan::create($request->all())){
            Toastr::success('Thêm hình ảnh thành công','Thêm hình ảnh');
            return redirect('admin/nguoithan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\nguoithan  $nguoithan
     * @return \Illuminate\Http\Response
     */
    public function show(nguoithan $nguoithan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\nguoithan  $nguoithan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = nguoithan::find($id);
		return view('admin.nguoithan.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\nguoithan  $nguoithan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->has('file_uploads')){
            $file=$request->file_uploads;
            $ex=$request->file_uploads->extension();
            $file_name=time().'-nguoithan'.'.'.$ex;
            $file->move(public_path('uploads/nguoithan'),$file_name);

            $data=nguoithan::find($id);
            File::delete('public/uploads/nguoithan/'.$data->avatar);
            $request->merge(['avatar'=>$file_name]); 
        }
    
        if(nguoithan::find($id)->update($request->all())){
            Toastr::success('Cập nhật hình ảnh thành công','Cập nhật hình ảnh');
            return redirect('admin/nguoithan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\nguoithan  $nguoithan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=nguoithan::find($id);
        $duongdan = 'public/uploads/nguoithan';
        File::delete($duongdan.'/'.$data->avatar);
        $data->delete();
        if( $data){
            Toastr::success('Xóa hình ảnh thành công','Xóa hình ảnh');
            return redirect('admin/nguoithan');
        }
    }
}
