<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nhanvien;
use App\Models\gioitinh;
use Illuminate\Support\Facades\DB;
use App\Helper\giohang;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Mail\tuyendung_email;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class home_controller extends Controller
{
    public function index(Request $request){
        return view('home');
    }

    public function home(Request $request){
        return view('home');
    }

    public function contact(){
        return view('contact');
    }
    public function about(){
        return view('about');
    }
    public function service(){
        return view('service');
    }
    public function banbe(){
        return view('banbe');
    }
    public function canhan(){
        return view('canhan');
    }
    public function nguoithan(){
        return view('nguoithan');
    }

    public function post_dangnhap(Request $request){
       
        $arr=[
            'tendangnhap'=>$request->tendangnhap,
            'password'=>$request->password
        ];

        if(Auth::guard('khachhang')->attempt($arr))
        {
            return redirect('/home');
        }
        else{
            return redirect('/dangnhap');

        }
  
    }
    public function get_dangky()
    {
        return view('regis_kh');
  
    }

    public function edit($id)
    {
        $gioitinh=gioitinh::all();
        $data=khachhang::find($id);
        return view('edit',compact('data','gioitinh'));  
        
    }
    public function update(Request $request, $id)
    {
        $data=khachhang::find($id);
        $data->hovaten=$request->hovaten;
        $data->gioitinh_id=$request->gioitinh_id;
        $data->ngaysinh=$request->ngaysinh;
        $data->diachi=$request->diachi;
        $data->sdt=$request->sdt;
        $data->cmnd=$request->cmnd;
        $data->tendangnhap=$request->tendangnhap;
        $data->email=$request->email;
       if($data->save()) {
           return redirect('/home');
       }
    }
    
    public function getDatHangDemo()
    {
        // Thêm Đơn hàng demo
        $dathang = dathang::create([
        'khachhang_id' => Auth::user()->id,
        'dienthoaigiaohang' => '0939011900',
        'diachigiaohang' => '18 Ung Văn Khiêm - TP. Long Xuyên - An Giang',
        ]);
        
        // Thêm Đơn hàng chi tiết demo
        dathang_chitiet::create([
        'dathang_id' => $dathang->id,
        'sanpham_id' => 2,
        'soluong' => 1,
        'dongia' => 5990000,
        ]);
        
        dathang_chitiet::create([
        'dathang_id' => $dathang->id,
        'sanpham_id' => 142,
        'soluong' => 1,
        'dongia' => 350000,
        ]);
        
        // Gởi email
        Mail::to( Auth::user()->email)->send(new tuyendung_email($tuyendung));
        
        return redirect()->route('completed');
    }
}
