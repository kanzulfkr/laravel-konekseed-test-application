<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $data = [

            [
                'name' => 'Apel',
                'description' => 'Buah apel malang',
                'price' => '4500',
                'quantity' => '30',
                'created_at' => now()
            ],
            [
                'name' => 'Pisang Ambon',
                'description' => 'Pisang khas ambon legit',
                'price' => '19750',
                'quantity' => '25',
                'created_at' => now()
            ],
            [
                'name' => 'Alpukat',
                'description' => 'Alpukat Mentega',
                'price' => '14000',
                'quantity' => '40',
                'created_at' => now()
            ],
            [
                'name' => 'Mangga',
                'description' => 'Mangga Harum Manis',
                'price' => '10000',
                'quantity' => '35',
                'created_at' => now()
            ],
            [
                'name' => 'Jeruk',
                'description' => 'Jeruk Siam',
                'price' => '6000',
                'quantity' => '45',
                'created_at' => now()
            ],
            [
                'name' => 'Anggur',
                'description' => 'Anggur Merah',
                'price' => '25000',
                'quantity' => '15',
                'created_at' => now()
            ],
            [
                'name' => 'Semangka',
                'description' => 'Semangka Merah',
                'price' => '5000',
                'quantity' => '60',
                'created_at' => now()
            ],

            [
                'name' => 'Bayam',
                'description' => 'Bayam hijau segar',
                'price' => '3000',
                'quantity' => '20',
                'created_at' => now()
            ],
            [
                'name' => 'Kangkung',
                'description' => 'Kangkung segar dari ladang',
                'price' => '2500',
                'quantity' => '25',
                'created_at' => now()
            ],
            [
                'name' => 'Wortel',
                'description' => 'Wortel oranye segar',
                'price' => '4000',
                'quantity' => '30',
                'created_at' => now()
            ],
            [
                'name' => 'Tomat',
                'description' => 'Tomat merah segar',
                'price' => '6000',
                'quantity' => '35',
                'created_at' => now()
            ],
            [
                'name' => 'Terong',
                'description' => 'Terong ungu segar',
                'price' => '3500',
                'quantity' => '40',
                'created_at' => now()
            ],
            [
                'name' => 'Kentang',
                'description' => 'Kentang import berkualitas',
                'price' => '4500',
                'quantity' => '45',
                'created_at' => now()
            ],
            [
                'name' => 'Labu',
                'description' => 'Labu kuning segar',
                'price' => '5000',
                'quantity' => '50',
                'created_at' => now()
            ],
            [
                'name' => 'Brokoli',
                'description' => 'Brokoli hijau segar',
                'price' => '5500',
                'quantity' => '55',
                'created_at' => now()
            ],
            [
                'name' => 'Cabe',
                'description' => 'Cabe merah segar',
                'price' => '7000',
                'quantity' => '60',
                'created_at' => now()
            ],
            [
                'name' => 'Bawang Putih',
                'description' => 'Bawang putih impor',
                'price' => '8000',
                'quantity' => '65',
                'created_at' => now()
            ],
            [
                'name' => 'Beras',
                'description' => 'Beras premium',
                'price' => '10000',
                'quantity' => '50',
                'created_at' => now()
            ],
            [
                'name' => 'Tepung Terigu',
                'description' => 'Tepung terigu serbaguna',
                'price' => '8000',
                'quantity' => '40',
                'created_at' => now()
            ],
            [
                'name' => 'Gula Pasir',
                'description' => 'Gula pasir halus',
                'price' => '12000',
                'quantity' => '60',
                'created_at' => now()
            ],
            [
                'name' => 'Minyak Goreng',
                'description' => 'Minyak goreng kualitas terbaik',
                'price' => '15000',
                'quantity' => '35',
                'created_at' => now()
            ],
            [
                'name' => 'Telur Ayam',
                'description' => 'Telur ayam segar',
                'price' => '2000',
                'quantity' => '70',
                'created_at' => now()
            ]
        ];
        DB::table('products')->insert($data);
    }
}
