<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customer')->insert([
                'fullname'=>'Nguyễn Văn A',
                'phone_number'=>'123456',
                'email'=>'chau@gmail.com',
                'address'=>'No1 Street',
                'birthday'=>date('Y-m-d'),
                'created_at'=>now(),
                'updated_at'=>now()
        ]);

    }
}
