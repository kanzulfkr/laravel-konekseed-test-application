<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            UserSeeder::class,
            ProductSeeder::class,
            BusinessSeeder::class,
            BusinessTargetsSeeder::class,
        ]);

        // //seeder business manual
        // \App\Models\Business::factory()->create([
        //     'user_id' => 1,
        //     'name' => 'Grocery',
        //     'logo' => 'https://freedesignfile.com/upload/2020/07/GROCERY-STORE-logo-vector.jpg',
        //     'sector' => 'Makanan dan Produk Sehari-hari',
        //     'status' => 'Active',
        // ]);

        // $this->call(ProductSeeder::class);


        // \App\Models\BusinessTarget::factory()->create([
        //     'name' => 'Ads new product : Shampoo',
        //     'business_id' => 1,
        //     'product_id' => 1,
        //     'category' => 'Quantitative',
        //     'weight' => 10,
        //     'start_date' => '2024-03-11',
        //     'end_date' => '2024-03-31',
        //     'status' => 'To do',
        // ]);

        // \App\Models\BusinessTarget::factory()->create([
        //     'name' => 'Ads new product : Washer',
        //     'business_id' => 1,
        //     'product_id' => 3,
        //     'category' => 'Qualitative',
        //     'weight' => 10,
        //     'start_date' => '2024-03-11',
        //     'end_date' => '2024-03-31',
        //     'status' => 'To do',
        // ]);

        // \App\Models\BusinessTarget::factory()->create([
        //     'name' => 'Campaign use local product',
        //     'business_id' => 1,
        //     'product_id' => 2,
        //     'category' => 'Quantitative',
        //     'weight' => 10,
        //     'start_date' => '2024-03-11',
        //     'end_date' => '2024-03-31',
        //     'status' => 'To do',
        // ]);
    }
}
