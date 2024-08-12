<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('owners', function (Blueprint $table) {
            $table->id('owner_id');
            $table->string('name', 150);
            $table->string('last_name', 150);
            $table->unsignedInteger('dni');
            $table->unsignedInteger('cuit');
            $table->string('email', 255)->unique();
            $table->string('address', 150);
            $table->unsignedInteger('address_number');
            $table->string('city', 150);
            $table->string('country', 150);
            $table->string('state', 150);
            $table->string('neighborhood', 150);
            $table->unsignedInteger('zip_code');
            $table->string('phone_number', 50);
            $table->date('birth_date');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('owners');
    }
};
