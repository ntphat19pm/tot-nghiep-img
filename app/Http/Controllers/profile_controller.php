<?php

namespace App\Http\Controllers;

use App\Models\chucvu;
use App\Models\nhanvien;
use App\Models\gioitinh;
use App\Models\giaoviec;
use App\Models\baiviet;
use App\Models\video;
use App\Models\User;
use Carbon\Carbon;
use Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class profile_controller extends Controller
{
    public function index()
    {
        $chucvu=chucvu::all();
        $gioitinh=gioitinh::all();
        return view('admin.profile.index',compact('chucvu','gioitinh'));
        
    }
    public function edit($id)
    {
        $chucvu=chucvu::all();
        $gioitinh=gioitinh::all();
        $data=nhanvien::find($id);
        return view('admin.profile.edit',compact('data','chucvu','gioitinh'));  
        
    }
    public function show($id)
    {
        $data=nhanvien::find($id);
        $giaoviec_nv=giaoviec::where('nguoinhan',$id)->orderby('nguoinhan','DESC')->paginate(10);
        $nop_file=giaoviec::where('nguoinhan',$id)->where('trangthai',0)->orderby('nguoinhan','DESC')->paginate(10);
        return view('admin.profile.show',compact('data','giaoviec_nv','nop_file'));
    }
    public function update(Request $request, $id)
    {
        $data=nhanvien::find($id);
        $data->hovaten=$request->hovaten;
        $data->gioitinh_id=$request->gioitinh_id;
        $data->ngaysinh=$request->ngaysinh;
        $data->diachi=$request->diachi;
        $data->sdt=$request->sdt;
        $data->cmnd=$request->cmnd;
        $data->chucvu_id=$request->chucvu_id;
        $data->tendangnhap=$request->tendangnhap;
        if($request->password==$request->repassword)
        {   if(!empty($request->password))
            {
                $data->password = bcrypt($request->password);
            }
        }
        else
        {            
            $chucvu=chucvu::all();
            $gioitinh=gioitinh::all();
            $data=nhanvien::find(Auth::user()->id);
            Toastr::warning('Mật khẩu và nhập lại mật khẩu không khớp','Không khớp');
            return view('admin.profile.matkhau',compact('data','chucvu','gioitinh'));  
        }
            
		$data->save();
        $data->email=$request->email;
       if($data->save()) {
            Toastr::success('Cập nhật thông tin thành công','Cập nhật thông tin');
           return redirect('admin/profile');
       }
       
    }
    public function destroy($id)
    {
        if(nhanvien::find($id)->delete()){
            Toastr::success('Xóa nhân viên thành công','Xóa nhân viên');
            return redirect('dangnhap');
        }
            
    }

    public function postSua(Request $request, $id)
    {
        if($request->has('file_uploads')){
            $file=$request->file_uploads;
            $ex=$request->file_uploads->extension();
            $file_name=time().'-file_giaoviec'.'.'.$ex;
            $file->move(public_path('uploads/giaoviec'),$file_name);

            $data=giaoviec::find($id);
            File::delete('public/uploads/giaoviec/'.$data->file_nop);
            $request->merge(['file_nop'=>$file_name]); 
        }
    
        if(giaoviec::find($id)->update($request->all())){
            Toastr::success('Cập nhật file thành công','Cập nhật file');
            return redirect('admin/giaoviec');
        }
    }
    public function baiviet_canhan(Request $request)
    {
        $manv=Auth::user()->id;

        $baiviet_canhan=baiviet::where('nguoidang',$manv)->orderby('create_at','DESC')->get();

        $video_canhan=video::where('nguoidang',$manv)->orderby('ngaydang','DESC')->get();
        return view('admin.profile.baiviet',compact('baiviet_canhan','video_canhan'));
    }
    public function matkhau(Request $request)
    {
        $chucvu=chucvu::all();
        $gioitinh=gioitinh::all();
        $data=nhanvien::find(Auth::user()->id);
        return view('admin.profile.matkhau',compact('data','chucvu','gioitinh'));  
        
    }

    public function post_baiviet_canhan(Request $request)
    {
        if($request->has('file_uploads')){
            
            $file=$request->file_uploads;
            $ex=$request->file_uploads->extension();
            $file_name=time().'-baiviet'.'.'.$ex;
            $file->move(public_path('uploads/baiviet'),$file_name);

            $ngayviet=Carbon::now('Asia/Ho_Chi_Minh');
            $nguoiviet=Auth::user()->id;
          
        }
        $request->merge(['avatar'=>$file_name]);
        $request->merge(['create_at'=>$ngayviet]);
        $request->merge(['nguoidang'=>$nguoiviet]);
        

        if(baiviet::create($request->all())){
            Toastr::success('Thêm bài viết cá nhân thành công','Thêm bài viết cá nhân');
            return redirect()->route('profile.baiviet_canhan');
        }
    }

    public function post_video_canhan(Request $request)
    {
        $data=new video;
        $data->tenvideo=$request->tenvideo;
        $sub_link=substr($request->link,17);
        $data->link=$sub_link;
        $data->mota=$request->mota;
        $data->slug=str_slug($request->tenvideo);
        $data->ngaydang=Carbon::now('Asia/Ho_Chi_Minh');
        $data->nguoidang=Auth::user()->id;
        if($data->save()){
            $data=video::all();
            Toastr::success('Thêm video cá nhân thành công','Thêm video cá nhân');
            return redirect()->route('profile.baiviet_canhan');
        }
    }
}
