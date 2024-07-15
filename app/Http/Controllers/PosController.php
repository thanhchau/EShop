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
    public function index(){
        return view('pos.index',[
            'datalist' => $this->posServices->getAllProducts(),

        ]);
    }
}
