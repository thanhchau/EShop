<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use App\Http\Services\Menu\MenuService;
use App\Models\Menu;
use http\Env\Response;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    protected MenuService $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    //
    public function create(){
        return view('admin.menu.add',[
            'title'=> "Thêm mới Menu",
            'menus'=> $this->menuService->getParent()
        ]);
    }
    public function store(CreateFormRequest $request)
    {
        $this->menuService->create($request);
        return redirect()->back();
    }
    public function index()
    {
        return view('admin.menu.list',[
            'title'=> "Danh Sách Menu",
            'menus'=>$this->menuService->getAll()
        ]);
    }
    public function destroy(Request  $request)
    {
        $rs = $this->menuService->remove($request);
        if($rs){
            return response()->json([
                'error' => false,
                'message' => 'Xoá thành công '

            ]);
        }
        return  response()->json([
                'error' => true,
            ]
        );
    }
    public function show(Menu $menu)
    {
        return view('admin.menu.edit',[
            'title'=> "Cập nhật Menu",
            'menu'=>$menu,
            'menus'=>$this->menuService->getAll()

        ]);
    }
    public function update(Menu $menu,CreateFormRequest $request)
    {
       $this->menuService->update($request, $menu);
       return redirect("/admin/menus/list");
    }

}
