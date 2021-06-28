<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class invoice_lines extends Model
{
    use HasFactory;
    protected $table = 'invoice_lines';
    public function products()
    {
        return $this->belongsTo(products::class,'product_id','id');
    }
    public function invoices()
    {
        return $this->belongsTo(invoices::class,'invoice_id','id');
    }
    static public function Sell_Month_Range()
    {
        return DB::table('invoice_lines')
            ->select('products.name',DB::raw("count(*) as Total"))
            ->join('invoices','invoices.id','=','invoice_lines.invoice_id')
            ->join('products','products.id','=','invoice_lines.product_id')
            ->where(DB::raw("Year(products.created_at)"),'=','2021')
            ->where([
                    [DB::raw("year(invoices.created_at)"),'2022'],
                    [DB::raw("month(invoices.created_at)"),'3']
                ])
            ->groupBy('name')
            ->get();
        ;
    }
}
