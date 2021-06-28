<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class customers extends Model
{
    use HasFactory;

    protected $table = 'customers';
    public function invoices()
    {
        return $this->hasMany(invoices::class,'customer_id','id');
    }
    public function invoice_lines()
    {
        return $this->hasManyThrough(
            invoice_lines::class,invoices::class,
            'customer_id','invoice_id','id','id');
    }
    static public function Customer_NumberInvoice()
    {
        return DB::table('customers')
            ->select('name',DB::raw("count(invoices.customer_id) as NumberInvoice"))
            ->join('invoices','invoices.customer_id','=','customers.id')
            ->groupBy('name')
            ->get();

        ;
    }
    static public function No_Purchase()
    {
        $month = Carbon::now()->month;
        return DB::table('customers')
            ->select('name')
            ->join('invoices','invoices.customer_id','=','customers.id')
            ->where(DB::raw("datediff(current_date,date)"),'>','180')
            ->get();

        ;
    }
}
