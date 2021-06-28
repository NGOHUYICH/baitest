<?php

namespace App\Http\Controllers;

use App\Models\customers;
use App\Models\invoice_lines;
use App\Models\invoices;
use App\Models\products;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WorkDatabase extends Controller
{
    //
    public function Work_Request_DB()
    {
        $request_One = customers::paginate(8);
        $request_Two = products::whereMonth('created_at','=',Carbon::now()->month)->get();
        $request_Three = customers::select(customers::raw("MONTH(created_at) as Month"),
            customers::raw("count(*) as Qty"))
            ->groupBy('created_at')
            ->get();
        $request_Four = invoices::
            select('customers.name',DB::raw("sum(qty*unit_price) as total"))
            ->join('invoice_lines','invoice_lines.invoice_id','=','invoices.id')
            ->join('customers','customers.id','=','invoices.customer_id')
            ->groupby('name')
            ->orderbyDesc('total')
            ->take(10)
            ->get();
        $request_Five = products::product_bestseller();
        $request_Six = customers::Customer_NumberInvoice();
        $request_Seven = invoices::Total_MonthInvoice();
        $request_Eight = invoice_lines::Sell_Month_Range();
        $request_Nice = customers::No_Purchase();
        // dd($request_Nice);
        return view('ListDatabase_Learn',
            [
                'request_One'=>$request_One,
                'request_Two'=>$request_Two,
                'request_Three'=>$request_Three,
                'request_Four'=>$request_Four,
                'request_Five'=>$request_Five,
                'request_Six'=>$request_Six,
                'request_Seven'=>$request_Seven,
                'request_Eight'=>$request_Eight,
                'request_Nice'=>$request_Nice        
            ]);
    }
}
