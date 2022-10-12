<?php

namespace App\Http\Controllers;
use App\Models\nhanvien;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\chucvu;
use App\Models\gioitinh;
use App\Models\province;
use App\Models\thuchien_chitieu;
use App\Models\chitieu;
use App\Rules\captcha_admin; 
use Validator;
use App\Models\User;
use Toastr;
use Nexmo;
use App\Mail\reset_matkhau_email;
use App\Notifications\sms_notification;
use App\Mail\forget_pass_email;
use Illuminate\Support\Facades\Mail;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class nhanvien_controller extends Controller
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
            $data=nhanvien::all();
            return view('admin.nhanvien.index',compact('data'));
        }
        else
        {
            Toastr::warning('Bạn không có quyền truy cập vào bảng nhân viên','Hạn chế truy cập');
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
        $chucvu=chucvu::all();
        $gioitinh=gioitinh::all();
        return view('admin.nhanvien.create',compact('chucvu','gioitinh'));  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$request->validate([
		//	'hovaten' => 'required|string|max:100',
		//	'tendangnhap' => 'required|string|max:100|unique:nhanvien,tendangnhap,' . $request->id,
		//	'email' => 'required|string|email|max:255|unique:nhanvien,email,' . $request->id,
		//	'password' => 'required|min:6|confirmed'
		//]);
        $data=new nhanvien;
        $data->hovaten=$request->hovaten;
        $data->gioitinh_id=$request->gioitinh_id;
        $data->ngaysinh=$request->ngaysinh;
        $data->diachi=$request->diachi;
        $data->sdt=$request->sdt;
        $data->cmnd=$request->cmnd;
        $data->chucvu_id=$request->chucvu_id;
        $sub_link=substr($request->email,0,-10);
        $data->tendangnhap=$sub_link;
        $data->password=bcrypt($request->password);
        //$data->password=$request->password;
        $data->email=$request->email;
       if($data->save()) {
            Toastr::success('Thêm nhân viên thành công','Thêm nhân viên');
           return redirect('admin/nhanvien');
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\nhanvien  $nhanvien
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $chucvu=chucvu::all();
        $gioitinh=gioitinh::all();
        $data=nhanvien::find($id);
        return view('admin.nhanvien.show',compact('data','chucvu','gioitinh'));  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\nhanvien  $nhanvien
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $chucvu=chucvu::all();
        $gioitinh=gioitinh::all();
        $data=nhanvien::find($id);
        return view('admin.nhanvien.edit',compact('data','chucvu','gioitinh'));  
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\nhanvien  $nhanvien
     * @return \Illuminate\Http\Response
     */
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
        $data->trangthai=$request->trangthai;

        $sub_link=substr($request->email,0,-10);
        $data->tendangnhap=$sub_link;

        if(!empty($request->password)) $data->password = bcrypt($request->password);
		$data->save();
        $data->email=$request->email;
        
       if($data->save()) {
            Toastr::success('Cập nhật nhân viên thành công','Cập nhật nhân viên');
           return redirect('admin/nhanvien');
       }
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\nhanvien  $nhanvien
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(nhanvien::find($id)->delete()){
            Toastr::success('Xóa nhân viên thành công','Xóa nhân viên');
            return redirect('admin/nhanvien');
        }
            
    }

    public function getdangnhap(){
        return view('admin.login');
    }
    public function quen_matkhau(Request $request){
        $email_nhap=$request->email;

        $nhanvien=nhanvien::where('email','=',$email_nhap)->get();
        foreach($nhanvien as $item)
        {
            $nhanvien_id=$item->id;
        }
        if($nhanvien)
        {
            $count_nv=$nhanvien->count();
            if($count_nv==0)
            {
                Toastr::error('Email chưa được đăng ký để khôi phục mật khẩu','Thất bại');
                return redirect()->route('get.dangnhap');
            }
            else
            {
                $random= Str::random();
                $nhanvien=nhanvien::find($nhanvien_id);
                $nhanvien->token=$random;
                $nhanvien->save();

                $to_mail=$email_nhap;
                $link_reset= url('/update-new-pass?email='.$to_mail.'&token='.$random);

                $forget = array(
                    'link_reset' => $link_reset,
                    'email' => $email_nhap,
                    'hoten' => $nhanvien->hovaten,
                );
                Mail::to($email_nhap)->queue(new forget_pass_email($forget));

                Toastr::success('Vui lòng check mail.','Gửi mail thành công');
                return redirect()->route('get.dangnhap');
            }
        }
    }

    public function reset_new_pass(Request $request){
        if($request->password==$request->repassword)
        {
            $data=$request->all();
            $random= Str::random();
            $nhanvien=nhanvien::where('email','=',$data['email'])->where('token','=',$data['token'])->get();

            $count_nv=$nhanvien->count();
            if($count_nv>0)
            {
                foreach($nhanvien as $item)
                {
                    $nhanvien_id=$item->id;
                }
                $reset=nhanvien::find($nhanvien_id);
                $reset->password = bcrypt($request->password);
                $reset->token = $random;
                $reset->save();
                Toastr::success('Mật khẩu đã được cập nhật.','Đăng nhập lại');
                return redirect()->route('get.dangnhap');
            }
            else
            {
                Toastr::warning('Vui lòng nhập lại email vì link đã hết hạn','Khôi phục mật khẩu lỗi');
                return redirect()->route('get.dangnhap');
            }
        }
        else
        {
            Toastr::warning('Mật khẩu và nhập lại mật khẩu không khớp','Mật khẩu không khớp');
            return redirect('/update-new-pass?email='.$request->email.'&token='.$request->token);
        }
        
    }
    public function update_new_pass(){
        return view('admin.new_pass');
    }
    public function profile(){
        return view('admin.profile');
    }
   
    public function postdangnhap(Request $request){
        $arr=[
            'tendangnhap'=>$request->tendangnhap,
            'password'=>$request->password,
            
        ];
        $data = $request->validate([
           'g-recaptcha-response' => new captcha_admin(), 		//dòng kiểm tra Captcha
        ]);
        if(Auth::attempt($arr))
        {
            if(Auth::user()->trangthai==0)
            {
                // $KH = chitieu::select('doanhthu_dichvu','tytrong_dichvu','doanhthu_tong','tytrong_tong','kenhtruyen','tytrong_kenhtruyen','duan','tytrong_duan','giaoduc','tytrong_giaoduc','yte','tytrong_yte')->first();
                // $TH = thuchien_chitieu::select('doanhthu_dichvu','doanhthu_tong','kenhtruyen','duan','giaoduc','yte')->first();
                
                // $ptTH_dv = $TH->doanhthu_dichvu/$KH->doanhthu_dichvu ;
                // $ptTH_tong = $TH->doanhthu_tong/$KH->doanhthu_tong ;
                // $ptTH_kt = $TH->kenhtruyen/$KH->kenhtruyen ;
                // $ptTH_da = $TH->duan/$KH->duan ;
                // $ptTH_gd = $TH->giaoduc/$KH->giaoduc ;
                // $ptTH_yt = $TH->yte/$KH->yte ;
                
                // $diem_dv = 0 ;
                // $diem_tong = 0 ;
                // $diem_kt = 0 ;
                // $diem_da = 0 ;
                // $diem_gd = 0 ;
                // $diem_yt = 0 ;

                // if($ptTH_dv < 120 )
                // {
                //     $diem_dv = $ptTH_dv * $KH->tytrong_dichvu;
                // }
                // else
                // {
                //     $diem_dv = (120/100) * $KH->tytrong_dichvu;
                // }

                // if($ptTH_tong < 120 )
                // {
                //     $diem_tong = $ptTH_tong * $KH->tytrong_tong;
                // }
                // else
                // {
                //     $diem_tong = (120/100) * $KH->tytrong_tong;
                // }

                // if($ptTH_kt < 120 )
                // {
                //     $diem_kt = $ptTH_kt * $KH->tytrong_kenhtruyen;
                // }
                // else
                // {
                //     $diem_kt = (120/100) * $KH->tytrong_kenhtruyen;
                // }

                // if($ptTH_da < 120 )
                // {
                //     $diem_da = $ptTH_da * $KH->tytrong_duan;
                // }
                // else
                // {
                //     $diem_da = (120/100) * $KH->tytrong_duan;
                // }
                // if($ptTH_gd < 120 )
                // {
                //     $diem_gd = $ptTH_gd * $KH->tytrong_giaoduc;
                // }
                // else
                // {
                //     $diem_gd = (120/100) * $KH->tytrong_giaoduc;
                // }
                // if($ptTH_yt < 120 )
                // {
                //     $diem_yt = $ptTH_yt * $KH->tytrong_yte;
                // }
                // else
                // {
                //     $diem_yt = (120/100) * $KH->tytrong_yte;
                // }

                Toastr::success('Đăng nhập thành công','Thành công');
                // return view('admin.index',['user'=>Auth::user()]);
                return redirect()->route('admin.index', ['user'=>Auth::user()]);

            }
            else
            {
                Toastr::warning('Tài khoản của bạn đã vô hiệu hoá','Vô hiệu hoá tài khoản');
                return view('admin.login');
            }
            
        }
        else{
            Toastr::error('Đăng nhập thất bại','Thất bại');
            return view('admin.login');

        }

        
    }
    public function dangxuat(){
        Auth::logout();
        return redirect('admin/dangnhap');
    }

    public function active($id)
    {
        $data=nhanvien::find($id);
        $data->trangthai=0;

        if($data->save()) {
            Toastr::success('Cập nhật trạng thái tài khoản thành công','Cập nhật trạng thái tài khoản');
            return redirect('admin/nhanvien');
        }
    }

    public function unactive($id)
    {
        $data=nhanvien::find($id);
        $data->trangthai=1;

        if($data->save()) {
            Toastr::success('Cập nhật trạng thái tài khoản thành công','Cập nhật trạng thái tài khoản');
            return redirect('admin/nhanvien');
        }
    }
    public function reset_matkhau($id)
    {
        $random= Str::random(9);
        $data=nhanvien::find($id);
        $data->password = bcrypt($random);

        $reset = array(
            'hoten' => $data->hovaten,
            'email' => $data->email,
            'tendangnhap' => $data->tendangnhap,
            'matkhau' => $random,
        );
        

        Mail::to($data->email)->queue(new reset_matkhau_email($reset));

        if($data->save()) {
            Toastr::success('Reset mật khẩu thành công','Reset mật khẩu');
            return redirect('admin/nhanvien');
        }
    }
}
