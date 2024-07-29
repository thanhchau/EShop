<?php

namespace App\Helper\Menu;
use Illuminate\Support\Str;

class Helper
{
    public static function Menu($menus, $parentId = 0, $char = '')
    {
        $html ='';
        foreach ($menus as $key => $menu)
        {
            if($menu->parent_id == $parentId)
            {
                $html .= '
                <tr>
                    <td>'.$menu->id.'</td>
                    <td>'.$char.$menu->name.'</td>
                     <td>'.self::Active($menu).'</td>
                    <td>'.$menu->updated_at.'</td>
                    <td>
                      <a href="/admin/menus/edit/'.$menu->id.'" class="btn btn-success btn-sm"> <i class="fas fa-edit"></i> </a>
                      <a href="#" onclick="Remove('.$menu->id.',\'/admin/menus/destroy\')" class="btn btn-danger btn-sm"> <i class="fas fa-trash"></i> </a>
                    </td>
                </tr>';
                unset($menus[$key]);
                $html .= self::Menu($menus,$menu->id,$char.'|---------');
            }

        }
        return $html;
    }
    public static function Active($menu)
    {

        if($menu->active)
        {
            return '<a href="#" class="btn btn-success btn-xs">Yes</a>';
        }
        else
        {
            return '<a href="#" class="btn btn-danger btn-xs">No</a>';
        }

    }
    public static function ShowMenu($menus, $parentId = 0)
    {

        $html = '';
        foreach ($menus as $key => $menu){
            if($menu->parent_id == $parentId){
                $html .= '<li><a href="/danh-muc/'.$menu->id.'-'.str::slug($menu->name).'.html" style="font-family:sans-serif">'
                            .$menu->name.'</a>';
                unset($menus[$key]);

            }
            if(self::isChild($menus,$menu->id)){
                $html .= '<ul class="sub-menu">';
                $html .= self::ShowMenu($menus,$menu->id);
                $html .='</ul>';
            }
            $html .= '</li>';
        }
        return $html;
    }
    public static function isChild($menus, $menu_id) : bool
    {
        foreach ($menus as $menu){
            if($menu->parent_id == $menu_id){
                return true;

            }
        }
        return false;
    }

}
