<?php

namespace App\Http\Controllers;
use App\Models\nhanvien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;

class admin_controller extends Controller
{
   public function index(Request $request){
   
   
    return view('admin.index');
   }
    public function getdangnhap(){
        return view('admin.login');
    }
    public function quen_matkhau(Request $request){
        $data=$request->email;
        dd($data);
        // $random= Str::random(9);
        // $forget = array(
        //     'hoten' => $data->hovaten,
        //     'email' => $data->email,
        //     'tendangnhap' => $data->tendangnhap,
        //     'matkhau' => $random,
        // );
        

        // Mail::to($data->email)->queue(new reset_matkhau_email($reset));

    }
    public function profile(){
        return view('admin.profile');
    }
    // public function filter_by_date(Request $request){
    //     $data = $request->all();
    //     $from_date = $data['from_date'];
    //     $to_date = $data['to_date'];

    //     $get = thongke::whereBetween('ngaydathang',[$from_date,$to_date])->orderBy('ngaydathang','ASC')->get();
    //         foreach($get as $key -> $val){
    //             $chart_data[] = array(
    //                 'thoigian'=> $val->ngaydathang,
    //                 'tong_donhang'=> $val->tong_donhang,
    //                 'doanh_so'=> $val->doanh_so,
    //                 'loi_nhuan'=> $val->loi_nhuan,
    //                 'soluong_ban'=> $val->soluong_ban
    //             );
    //         }
    //         echo $data = json_encode($chart_data);
    // }
   
   

}
