<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class sanpham extends Model
{
    use HasFactory;
    protected $table = 'sanpham';
    
    public function loaisp()
    {
        return $this->belongsTo(loaisp::class,'id_loaisp','id');
    }
    public function hienthi()
    {
       return $this::select('mota','sanpham.ten')
            ->join('loaisp','loaisp.id','=','sanpham.id_loaisp')
            ->get();
        
    }
}
