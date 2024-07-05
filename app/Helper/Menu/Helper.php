<?php

namespace App\Helper\Menu;

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
}
