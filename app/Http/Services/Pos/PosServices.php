<?php

namespace App\Http\Services\Pos;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class PosServices
{

    public function getAllProducts()
    {
        return DB::table('products')->leftJoin('category', 'products.category_id', '=', 'category.id')
            ->select('products.*', 'category.name as category_name')
            ->orderByDesc('id')
            ->paginate(3);
    }
}
