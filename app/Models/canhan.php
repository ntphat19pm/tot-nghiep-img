<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class canhan extends Model
{
    use HasFactory;
    protected $table='canhan';
    public $timestamps = false;
    protected $fillable=['id','tenhinh','mota','avatar'];
}
