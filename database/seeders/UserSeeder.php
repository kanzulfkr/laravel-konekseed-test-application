<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class UserSeeder extends Seeder
{

    public function run(): void
    {
        $data = [
            [
                'name' => 'Kanzul',
                'email' => 'kanzul@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'phone' => '081234567890',
                'created_at' => now()
            ],
            [
                'name' => 'Prisma',
                'email' => 'prisma@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'phone' => '081234567891',
                'created_at' => now()
            ],
            [
                'name' => 'tes',
                'email' => 'tes@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'phone' => '08129837458',
                'created_at' => now()
            ],
        ];
        DB::table('users')->insert($data);
    }
}
