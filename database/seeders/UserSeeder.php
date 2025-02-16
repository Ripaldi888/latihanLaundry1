<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $array = [
            ['name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin'
        ],
        [
            'name'=> 'owner',
            'email' => 'owner@gmail.com',
            'password' => bcrypt('owner123'),
            'role' => 'owner'
        ]
        ];

        User::insert($array);
    }
}
