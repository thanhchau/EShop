<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiCategoryController extends Controller
{
    //
    public function index(){
        $data = DB::table('category')->get();
        return json_decode($data);
    }
    public function store(Request $request){
        $catName = $request->input('name');
        if($catName == ""){
            return response()->json([
                'error'=>true,
               'message'=>'Please enter a category name'
            ]);
        }else{
            $rs = DB::table('category')->insert([
                'name' => $catName
            ]);
            return response()->json([
                'error'=>false,
                'message'=>'Category added successfully'
            ]);
        }
    }
}
