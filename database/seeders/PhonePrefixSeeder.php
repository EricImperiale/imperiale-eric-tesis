<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhonePrefixSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('phone_prefixes')->insert([
            ['prefix' => '+54', 'name' => 'Argentina'],
            ['prefix' => '+55', 'name' => 'Brasil'],
            ['prefix' => '+56', 'name' => 'Chile'],
            ['prefix' => '+57', 'name' => 'Colombia'],
            ['prefix' => '+58', 'name' => 'Venezuela'],
            ['prefix' => '+59', 'name' => 'Guyan'],
            ['prefix' => '+52', 'name' => 'México'],
            ['prefix' => '+53', 'name' => 'Cuba'],
            ['prefix' => '+51', 'name' => 'Perú'],
            ['prefix' => '+50', 'name' => 'Bolivia'],
        ]);
    }
}
