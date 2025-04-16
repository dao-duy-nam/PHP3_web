<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('customer')->insert([
            ['name' => 'Nguyen Van A', 'email' => 'a@example.com', 'phone' => '0123456789', 'address' => 'Hanoi', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tran Thi B', 'email' => 'b@example.com', 'phone' => '0987654321', 'address' => 'Saigon', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
