<?php

namespace App\Http\Services\Product;

use App\Models\Menu;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class ProductService
{
    public function getMenu()
    {
        return Menu::where('active', 1)->get();
    }
    public function getCategory()
    {
        return DB::table('category')->get();
    }
    public function create($request)
    {
        try
        {
//            Product::create([
//                'name'=>(string)$request->input('name'),
//                'description'=>(string)$request->input('description'),
//                'content'=>(string)$request->input('content'),
//                'menu_id'=>(int)$request->input('menu_id'),
//                'price'=>(int)$request->input('price'),
//                'price_sale'=>(int)$request->input('price_sale'),
//                'active'=>(int)$request->input('active')
//
//            ]);
            //dd($request->all());
            $request->except('_token');
            Product::create($request->all());
            Session::flash('success','Tạo sản phẩm thành công');

        }catch (\Exception $ex)
        {
            Session::flash('error',$ex->getMessage());
            Log::info($ex->getMessage());
        }
    }
    public function get()
    {
        return Product::With("menu")->orderByDesc('id')->paginate(3);
    }

}
