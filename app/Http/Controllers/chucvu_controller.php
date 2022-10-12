<?php

namespace App\Http\Controllers;

use App\Models\nhanvien;
use App\Models\chucvu;
use Illuminate\Http\Request;
use Toastr;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class chucvu_controller extends Controller
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
            $data=chucvu::all();
            return view('admin.chucvu.index',compact('data'));
        }
        else
        {
            Toastr::warning('Bạn không có quyền truy cập vào bảng chức vụ','Hạn chế truy cập');
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
        return view('admin.chucvu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=new chucvu;
        $data->tenchucvu=$request->tenchucvu;
        if($data->save()){
            return redirect('admin/chucvu');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\chucvu  $chucvu
     * @return \Illuminate\Http\Response
     */
    public function show(chucvu $chucvu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\chucvu  $chucvu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = chucvu::find($id);
        
		return view('admin.chucvu.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\chucvu  $chucvu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = chucvu::find($id);
        $data->tenchucvu=$request->tenchucvu;
        if($data->save())
            return redirect('admin/chucvu');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\chucvu  $chucvu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data= chucvu::find($id)->delete();
        if($data)
            return redirect('admin/chucvu');
    }
}
