<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('customers')->insert([
            [
                'name'=>'nam',
                'email'=>'nam@gmail.com',
                'so_dien_thoai'=>'01929383',
                'dia_chi'=>'ha nam',
                'created_at'=>now(),
            ],
            [
                'name'=>'nam',
                'email'=>'nam1@gmail.com',
                'so_dien_thoai'=>'011929383',
                'dia_chi'=>'ha nam',
                'created_at'=>now(),
            ],
        ]);
    }
}
