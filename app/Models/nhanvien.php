<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class nhanvien extends Model
{
    use HasFactory;
    protected $table='nhanvien';
    public $timestamps = false;
    protected $fillable = [
		'id', 'hovaten', 'gioitinh_id','ngaysinh', 'diachi', 'sdt', 
        'cmnd','chucvu_id','tendangnhap', 'password','email','trangthai','token','created_at','updated_at'
	];
    public function chucvu(){
        return $this->hasOne(chucvu::class,'id','chucvu_id');
    }
    public function gioitinh(){
        return $this->hasOne(gioitinh::class,'id','gioitinh_id');
    }
    public function nhanvien(){
        return $this->hasMany(dathang::class,'nhanvien_id','id');
    }

    public function giaoviec(){
        return $this->hasMany(giaoviec::class,'nguoinhan','id');
    }
    public function baiviet(){
        return $this->hasMany(baiviet::class,'nguoidang','id');
    }
    public function video(){
        return $this->hasMany(video::class,'nguoidang','id');
    }
    public function lienhe_chuyendoi(){
        return $this->hasMany(lienhe_chuyendoi::class,'nhanvien_id','id');
    }
    public function thongtin(){
        return $this->hasMany(thongtin::class,'nhanvien_id','id');
    }
    public function scopeSearch($query)
    {
        if($tukhoa=request()->tukhoa){
            $query=$query->where('hovaten','like','%'.$tukhoa.'%');
        }
        return $query;
    }
    public function dathang(){
        return $this->hasMany(dathang::class,'nhanvien_id','id');
    }

}