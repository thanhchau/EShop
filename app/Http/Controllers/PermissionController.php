<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PermissionController extends Controller
{
    //
    public function viewroles(Request $request)
    {
        $rolelist = DB::table('roles')->orderByDesc('id')->get();
        return view('permission.index',[
            'roleList'=>$rolelist,
            'index'=>0,
            'title'=>'Danh Sách Role'
        ]);
    }
    public function viewsettings(Request $request)
    {
        $routes =  DB::table('routes')->get();
        $permissions = DB::table('permissions')
                                ->where('role_id', $request->id)->get();
        $list=[];

        foreach ($routes as $item){
            $status =0;
                foreach($permissions as $item1){
                    if($item1->route_id == $item->id){
                        $status =1;
                    }
                }
                $list[] = [
                    'route_id'    => $item->id,
                    'route_title' => $item->route_title,
                    'route_name'  => $item->route_name,
                    'status'      => $status
                ];
        }
        return view('permission.setting',[
            'index'=>0,
            'permissionList' => $list,
            'role_id'        => $request->id,
            'title'=>'Phân Quyến'
        ]);

    }
    public function savesetting(Request $request)
    {
        dd($request);

    }
}
