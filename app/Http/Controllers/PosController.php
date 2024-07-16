<?php

namespace App\Http\Controllers;

use App\Http\Services\Pos\PosServices;
use App\Models\Product;
use Illuminate\Http\Request;


class PosController extends Controller
{
    protected PosServices  $posServices;
    public function __construct(PosServices $posServices){
        $this->posServices = $posServices;
    }
    //
    public function index(Request $request){
        return view('pos.index',[
            'datalist' => $this->posServices->getAllProducts($request),

        ]);
    }
    public function  saveorder(Request $request)
    {
        $rs =  $this->posServices->saveOrder($request);
       if($rs == 'ok'){
           return response()->json([
               'error' => false,
               'message' => 'Saved successfully',
           ]);
       }else{
           return response()->json([
               'error' => true,
               'message' => $rs,

           ]);
       }
    }
}
