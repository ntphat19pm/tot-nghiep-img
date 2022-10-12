<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class banbe extends Model
{
    use HasFactory;
    protected $table='banbe';
    public $timestamps = false;
    protected $fillable=['id','tenhinh','mota','avatar'];
}
