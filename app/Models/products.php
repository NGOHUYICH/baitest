<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class products extends Model
{
    use HasFactory;

    protected $table = 'products';
    public function invoice_line()
    {
        return $this->hasMany(invoice_lines::class,'product_id','id');
    }
    public function invoices()
    {
        return $this->belongsToMany(invoices::class,invoice_lines::class,'product_id','invoice_id');
    }
    static public function product_bestseller()
    {
        return DB::table('products')
            ->select('products.name',DB::raw("count(invoice_lines.product_id) as BestSeller"))
            ->join('invoice_lines','invoice_lines.product_id','=','products.id') 
            ->groupBy('name')
            ->orderByDesc('BestSeller')
            ->take(10)
            ->get();
    }





}
