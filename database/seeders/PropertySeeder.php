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
                'address_number' => 1001,
                'city' => 'Buenos Aires',
                'state' => 'CABA',
                'neighborhood' => 'Centro',
                'zip_code' => 1043,
                'total_area' => 85,
                'covered_area' => 75,
                'description' => 'Departamento luminoso en el centro de la ciudad.',
                'rental_price' => 45000,
                'expenses' => 8000,
                'floor' => null,
                'apartment_number' => null,
                'is_for_professional_use' => false,
                'rooms' => 3,
                'bedrooms' => 2,
                'bathrooms' => 1,
                'owner_fk_id' => 1,
                'property_type_fk_id' => 1
            ],
            [
                'address' => 'Calle Falsa',
                'address_number' => 456,
                'city' => 'Rosario',
                'state' => 'Santa Fe',
                'neighborhood' => 'Pichincha',
                'zip_code' => 2000,
                'total_area' => 150,
                'covered_area' => 140,
                'description' => 'Casa con amplio jardín y piscina.',
                'rental_price' => 80000,
                'expenses' => 12000,
                'floor' => 7,
                'apartment_number' => 'B',
                'is_for_professional_use' => false,
                'rooms' => 5,
                'bedrooms' => 3,
                'bathrooms' => 2,
                'owner_fk_id' => 2,
                'property_type_fk_id' => 2
            ],
            [
                'address' => 'Avenida de Mayo',
                'address_number' => 789,
                'city' => 'Buenos Aires',
                'state' => 'CABA',
                'neighborhood' => 'Monserrat',
                'zip_code' => 1084,
                'total_area' => 50,
                'covered_area' => 45,
                'description' => 'Monoambiente ideal para estudiantes.',
                'rental_price' => 30000,
                'expenses' => 5000,
                'floor' => null,
                'apartment_number' => null,
                'is_for_professional_use' => true,
                'rooms' => 1,
                'bedrooms' => 0,
                'bathrooms' => 1,
                'owner_fk_id' => 3,
                'property_type_fk_id' => 3
            ],
        ]);
    }
}
