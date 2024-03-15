<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class BusinessTargetsSeeder extends Seeder
{

    public function run(): void
    {
        $data = [
            [
                'business_id' => '1',
                'product_id' => '2',
                'name' => 'Ads promo buah instagram feeds',
                'category' => 'Qualitative',
                'weight' => '80',
                'start_date' => now(),
                'end_date' => '2024-03-29',
                'status' => 'To do'
            ],
            [
                'business_id' => '1',
                'product_id' => '18',
                'name' => 'Ads promo buah twitter feeds',
                'category' => 'Quantitative',
                'weight' => '90',
                'start_date' => now(),
                'end_date' => '2024-04-05',
                'status' => 'To do'
            ],
            [
                'business_id' => '1',
                'product_id' => '22',
                'name' => 'Campaign all social media',
                'category' => 'Qualitative',
                'weight' => '100',
                'start_date' => now(),
                'end_date' => '2024-04-10',
                'status' => 'To do'
            ],
        ];
        DB::table('business_targets')->insert($data);
    }
}
