<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('currency_types')->insert([
            [
                'name' => 'Pesos Argentinos',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dólares',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Euros',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
