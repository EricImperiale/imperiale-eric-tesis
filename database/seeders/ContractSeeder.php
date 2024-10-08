<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ContractSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('contracts')->insert([
            [
                'rental_price' => 50000,
                'description' => 'Alquiler de un departamento céntrico en Buenos Aires.',
                'start_date' => Carbon::parse(now())->format('d-m-Y'),
                'end_date' => Carbon::parse(now())->addMonths(13)->addDays(15)->format('d-m-Y'),
                'security_deposit' => 100000,
                'owner_fk_id' => 1,
                'tenant_fk_id' => 2,
                'property_fk_id' => 1,
                'guarantor_fk_id' => 2,
                'currency_type_fk_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
