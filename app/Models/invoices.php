<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class invoices extends Model
{
    use HasFactory;
    protected $table='invoices';
    public function customers()
    {
        return $this->belongsTo(customers::class,'customer_id','id');
    }
    public function products()
    {
        return $this->belongsToMany(products::class,invoice_lines::class,'product_id','invoice_id');
    }
    static function Customer_MaxTotal()
    {
        return DB::table('invoices')
        ->select('customers.name',DB::raw("sum(invoice_lines.qty*invoice_lines.unit_price) as Total"))
        ->join('customers','customers.id','=','invoices.customer_id')   
        ->join('invoice_lines','invoice_lines.invoice_id','=','invoices.id')
        ->groupby('customers.name')
        ->orderByDesc('customers.name')
        ->take(10)
        ->get();
    }
    static public function Total_MonthInvoice()
    {
        return DB::table('invoices')
            ->select(DB::raw("Month(date) as Month"),DB::raw("sum(qty*unit_price) as Total"))
            ->join('invoice_lines','invoice_lines.invoice_id','=','invoices.id')
            ->where(DB::raw("year(date)"),'=','2021')
            ->groupBy('Month')
            ->get();
    }
}
