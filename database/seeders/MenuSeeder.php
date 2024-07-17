<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('menus')->insert(
            [
                'name'=>'Sản Phẩm Vệ Sinh',
                'parent_id'=> 0,
                'description'=>'Sản Phẩm Vệ Sinh',
                'content'=>'Sản Phẩm Vệ Sinh',
                'active'=>1,
                'created_at'=>now(),
                'updated_at'=>now()
            ]

        );
        DB::table('menus')->insert(
            [
                'name'=>'Văn phòng phẩm',
                'parent_id'=> 0,
                'description'=>'Văn phòng phẩm',
                'content'=>'Văn phòng phẩm',
                'active'=>1,
                'created_at'=>now(),
                'updated_at'=>now()
            ]

        );
    }
}
