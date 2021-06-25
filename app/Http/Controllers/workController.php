<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class workController extends Controller
{
    public function BasicController()
    {
        echo "làm việc với collection nhé"; 
        // $all = new Collection([1,2,3]);
        // $AddArray = [
        //     'thongtin'=>[
        //         ['hoten'=>'ngo bao chau','diachi'=>'phu xuyen'],
        //         ['hoten'=>'ong van thanh','diachi'=>'yen dung'],
        //         ['gioitinh'=>'nam','diachi'=>'yen dung'],
        //     ]
        // ];
        // $all->push(4,5,'ngo huy ich','pro nhe',$AddArray);
        // $TraveKey = collect($all);
        // $TraveKey1 =$TraveKey->pluck('thongtin','');
        // dd($TraveKey1->where('thongtin.hoten','')->all());
        
        //* Hàm where *//
        // $collection = collect([
        //     ['product' => 'Desk', 'price' => 200],
        //     ['product' => 'Chair', 'price' => 100],
        //     ['product' => 'Bookcase', 'price' => 150],
        //     ['product' => 'Door', 'price' => 100],
        // ]);
        // $filtered = $collection->where('price', '>',100);
        // dd($filtered->all());

        //* Hàm Values *//
        // $collection = collect([
        //     10 => ['product' => 'Desk', 'price' => 200],
        //     11 => ['product' => 'Desk', 'price' => 200]
        // ]);
         
        // $values = $collection->values();
         
        // dd($values->all());

        //* Hàm Chumk *//
        // $collection = collect([
        //     ['product' => 'Desk', 'price' => 200],
        //     ['product' => 'Chair', 'price' => 100],
        //     ['product' => 'Bookcase', 'price' => 150],
        //     ['product' => 'Door', 'price' => 100],
        // ]);
        // $chunks = $collection->chunk(2);
        // dd($chunks);

            



    }


}
