<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gioitinh extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table='gioitinh';
    protected $fillable=['id','gioitinh'];
    public function nhanvien(){
        return $this->hasMany(nhanvien::class,'gioitinh_id','id');
    }
    public function tuyendung(){
        return $this->hasMany(tuyendung::class,'gioitinh_id','id');
    }
}
