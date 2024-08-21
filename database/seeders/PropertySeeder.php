<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('properties')->insert([
            [
                'address' => 'Av. Corrientes',
                'address_number' => 1234,
                'city' => 'Buenos Aires',
                'province' => 'Buenos Aires',
                'neighborhood' => 'San Nicolás',
                'postal_code' => 1043,
                'total_area' => 85,
                'covered_area' => 75,
                'description' => 'Departamento amplio en el centro de la ciudad.',
                'rental_price' => 150000,
                'expenses' => 10000,
                'floor' => 5,
                'apartment_number' => '4D',
                'is_for_professional_use' => false,
                'rooms' => 3,
                'bedrooms' => 2,
                'bathrooms' => 2,
                'owner_fk_id' => 1,
                'property_type_fk_id' => 2,
            ],
            [
                'address' => 'Calle Belgrano',
                'address_number' => 4321,
                'city' => 'Córdoba',
                'province' => 'Córdoba',
                'neighborhood' => 'Nueva Córdoba',
                'postal_code' => 5000,
                'total_area' => 120,
                'covered_area' => 100,
                'description' => 'Casa con patio grande y pileta.',
                'rental_price' => 250000,
                'expenses' => 15000,
                'floor' => null,
                'apartment_number' => null,
                'is_for_professional_use' => true,
                'rooms' => 5,
                'bedrooms' => 3,
                'bathrooms' => 2,
                'owner_fk_id' => 2,
                'property_type_fk_id' => 1,
            ],
        ]);
    }
}
