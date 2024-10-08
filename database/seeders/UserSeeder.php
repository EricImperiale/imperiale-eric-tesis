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
            [
                'full_name' => 'Eric Imperiale',
                'email' => 'ericimperiale@hotmail.com',
                'password' => Hash::make('123'),
                'has_permission' => true,
                'is_employee' => true,
            ],
            [
                'full_name' => 'Marcos Gonzales',
                'email' => 'user@user.com',
                'password' => Hash::make('123'),
                'has_permission' => false,
                'is_employee' => false,
            ],
        ]);
    }
}
