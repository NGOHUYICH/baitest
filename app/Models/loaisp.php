<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loaisp extends Model
{
    use HasFactory;
    protected $table = 'loaisp';
    
    public function sanpham()
    {
        return $this->hasMany(sanpham::class,'id_loaisp','id');

    }
}
