<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(PhonePrefixSeeder::class);
        $this->call(PropertyTypeSeeder::class);
        $this->call(CurrencyTypeSeeder::class);

        $this->call(OwnerSeeder::class);
        $this->call(GuarantorSeeder::class);
        $this->call(TenantSeeder::class);
        $this->call(PropertySeeder::class);

        $this->call(ContractSeeder::class);
    }
}
