<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ContactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('contacts')->insert([
            [
                'name'=>'SP001',
                'email'=>'abc@gmail.com',
                'dien_thoai'=>'iphone 17',
                'noi_dung'=>'áo đẹp',
                'created_at'=>now(),
            ],
            [
                'name'=>'SP001',
                'email'=>'abc@gmail.com',
                'dien_thoai'=>'iphone 17',
                'noi_dung'=>'áo đẹp',
                'created_at'=>now(),
            ],
        ]);
    }
}
