<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CreateProductFormRequest;
use App\Http\Services\Product\ProductService;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected ProductService $productService;
    public function __construct(ProductService $_productService)
    {
        $this->productService = $_productService;
    }

    public function index()
    {
        //
        return view('admin.product.list',[
           ProductController::class,
           'title'=>'Danh Sách Sản Phẩm',
           'products'=>$this->productService->get(),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.product.add',[
            'title'=>'Tạo mới sản phẩm',
            'menus'=>$this->productService->getMenu(),
            'categories'=>$this->productService->getCategory()


        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateProductFormRequest $request)
    {
        //
        //$this->productService->store($request);
        $this->productService->create($request);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //

        return view('admin.product.edit',[
            'title'=>'Cập Nhật Sản Phẩm',
            'product'=>$product,
            'menus'=>$this->productService->getMenu()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
