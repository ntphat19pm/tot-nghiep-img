<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nguoithan extends Model
{
    use HasFactory;
    protected $table='nguoithan';
    public $timestamps = false;
    protected $fillable=['id','tenhinh','mota','avatar'];
}
