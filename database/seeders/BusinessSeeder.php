<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class BusinessSeeder extends Seeder
{

    public function run(): void
    {
        $data = [
            [
                'user_id' => '1',
                'name' => 'Grocery',
                'logo' => 'https://freedesignfile.com/upload/2020/07/GROCERY-STORE-logo-vector.jpg',
                'sector' => 'Makanan dan Produk Sehari-hari',
                'status' => 'Active',
                'created_at' => now()
            ],
        ];
        DB::table('businesses')->insert($data);
    }
}
