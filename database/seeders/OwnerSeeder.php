<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('owners')->insert([
            [
                'name' => 'Juan',
                'last_name' => 'Pérez',
                'dni' => 12345678,
                'cuit' => 20123456789,
                'email' => 'juan.perez@example.com',
                'address' => 'Calle Falsa',
                'address_number' => 123,
                'city' => 'Buenos Aires',
                'country' => 'Argentina',
                'state' => 'Buenos Aires',
                'neighborhood' => 'Palermo',
                'zip_code' => 1414,
                'phone_number' => 1123456789,
                'birth_date' => '1980-01-01',
                'phone_prefix_fk_id' => 1,
            ],
            [
                'name' => 'Ana',
                'last_name' => 'Gómez',
                'dni' => 87654321,
                'cuit' => 20345678901,
                'email' => 'ana.gomez@example.com',
                'address' => 'Avenida Siempre viva',
                'address_number' => 742,
                'city' => 'Córdoba',
                'country' => 'Argentina',
                'state' => 'Córdoba',
                'neighborhood' => 'Centro',
                'zip_code' => 5000,
                'phone_number' => 3512345678,
                'birth_date' => '1990-05-15',
                'phone_prefix_fk_id' => 2,
            ],
            [
                'name' => 'Martina',
                'last_name' => 'Zarate',
                'dni' => 41587844,
                'cuit' => 20154875487,
                'email' => 'martina@hotmail.com',
                'address' => 'Avenida Siempre viva',
                'address_number' => 742,
                'city' => 'Córdoba',
                'country' => 'Argentina',
                'state' => 'Córdoba',
                'neighborhood' => 'Centro',
                'zip_code' => 5000,
                'phone_number' => 3512345678,
                'birth_date' => '1990-05-15',
                'phone_prefix_fk_id' => 2,
            ],
            [
                'name' => 'Carlos',
                'last_name' => 'Gonzales',
                'dni' => 85489587,
                'cuit' => 2054896587,
                'email' => 'carlos@hotmail.com',
                'address' => 'Avenida Siempre viva',
                'address_number' => 742,
                'city' => 'Córdoba',
                'country' => 'Argentina',
                'state' => 'Córdoba',
                'neighborhood' => 'Centro',
                'zip_code' => 5000,
                'phone_number' => 3512345678,
                'birth_date' => '1990-05-15',
                'phone_prefix_fk_id' => 2,
            ],
        ]);
    }
}
