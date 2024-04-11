<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([

            // admin
            [
                'name' => 'admin',
                'password' => Hash::make('0000'),
                'role' => 2,
            ],

            // worker
            [
                'name' => 'worker',
                'password' => Hash::make('0000'),
                'role' => 1,
            ],

            // user1
            [
                'name' => 'user',
                'password' => Hash::make('0000'),
                'role' => 0,
            ],

            // user2
            [
                'name' => 'client',
                'password' => Hash::make('0000'),
                'role' => 0,
            ],
        ]);
    }
}
