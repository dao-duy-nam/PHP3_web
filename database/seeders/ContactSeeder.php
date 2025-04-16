<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        DB::table('contacts')->insert([
            ['name' => 'Contact 1','gioi_tinh' => 'nam', 'email' => 'contact1@example.com', 'message' => 'Hello, this is a message.', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Contact 2','gioi_tinh' => 'nam', 'email' => 'contact2@example.com', 'message' => 'Another message.', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
