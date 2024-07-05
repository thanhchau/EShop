<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Product\UploadService;

class UploadController extends Controller
{
    //
    protected $uploadservice;
    public function __construct(UploadService $uploadservice){
        $this->uploadservice = $uploadservice;
    }
    public function store(Request $request){
       $url = $this->uploadservice->store($request);
       if($url != false){
           return response()->json([
                'error' => false,
               'url' => $url
           ]);
       }
        return response()->json([
            'error' => true
        ]);
    }
}
