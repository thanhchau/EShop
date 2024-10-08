<?php

namespace App\Http\Services\Pos;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PosServices
{

    public function getAllProducts(Request $request)
    {

         $datalist = DB::table('products')->leftJoin('category', 'products.category_id', '=', 'category.id')
            ->select('products.*', 'category.name as category_name')
            ->orderByDesc('id');
            $datalist = $datalist->paginate(3);
         if(isset($request->s)){
             $key = $request->s;

             $datalist = DB::table('products')
                 ->leftJoin('category', 'products.category_id', '=', 'category.id')
                 ->select('products.*', 'category.name as category_name')
                 ->where('products.name', 'like', '%'.$key.'%')
                 ->paginate(3);
         }

         return $datalist;
    }
    public function saveOrder(Request $request)
    {
        try{
            $cartlist = json_decode($request->data, true);
            $totalmoney = $request->totalMoney;
            $customerid =1;

           $r = Order::create([
                'customer_id' => $customerid,
                'total_money' => $totalmoney,
                'order_date' => date('Y-m-d'),
            ]);

           foreach($cartlist as $cart){
               DB::table('oder_detail')->insert([
                   'order_id' => $r->id,
                   'product_id' => $cart['id'],
                   'price'=> $cart['price'],
                   'amount' => $cart['num'],
                   'total_money'=>$cart['price'] * $cart['num'],
                   'created_at'  => date('Y-m-d H:i:s'),
                   'updated_at'  => date('Y-m-d H:i:s')
               ]);
           }
            //dd($r);
            return "ok";
        }catch (\Exception $exception){
            return $exception->getMessage();
        }

    }
}
