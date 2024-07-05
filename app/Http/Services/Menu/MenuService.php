<?php

namespace App\Http\Services\Menu;

use App\Models\Menu;
use Illuminate\Support\Facades\Session;

class MenuService
{
    public function create($request){
        try {
            $rs =  Menu::create([
                'name' => (string)$request->input('name'),
                'parent_id' => (string)$request->input('parent_id'),
                'description' => (string)$request->input('description'),
                'content' => (string)$request->input('content'),
                'active' => (int)$request->input('active')

            ]);
            Session::flash('success', "Thêm mới Menu Thành Công");
        }catch (\Exception $exception){
            Session::flash('error', $exception->getMessage());
        }
    }
    public function getParent(){
        return Menu::where('parent_id',0)->get();
    }

    public function getAll()
    {
        return Menu::orderByDesc('id')->paginate(15);
    }
    public function remove($request)
    {
        $menu = Menu::where('id',$request->input('id'))->first();
        $id = $request->input('id');
        if($menu){
            return Menu::where('id',$id)->orWhere('parent_id',$id)->delete();
        }else{
            return  false;
        }
    }
    public function update($request,Menu $menu)
    {
        try
        {
            if($request->input('parent_id') != $menu->id)
            {
                $menu->fill($request->input());
                $menu->save();
                Session::flash('success', 'Cập nhật thành công');;
            }else
            {
                Session::flash('error', 'Chọn Danh Mục Không đúng, vui lòng kiểm tra lại ');;
            }



        }
        catch (\Exception $ex)
        {
            Session::flash('error', $ex->getMessage());
        }

    }


}
