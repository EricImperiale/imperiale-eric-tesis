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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('address', 125);
            $table->unsignedInteger('address_number');
            $table->string('city', 255)->nullable();
            $table->string('state', 255);
            $table->string('neighborhood', 255);
            $table->unsignedInteger('zip_code');
            $table->unsignedInteger('total_area');
            $table->unsignedInteger('covered_area');
            $table->text('description')->nullable('The property has no description.');
            $table->unsignedInteger('rental_price');
            $table->unsignedInteger('expenses')->nullable();
            $table->unsignedInteger('floor')->nullable();
            $table->string('apartment_number')->nullable();
            $table->boolean('is_for_professional_use')->nullable();
            $table->unsignedInteger('rooms');
            $table->unsignedInteger('bedrooms');
            $table->unsignedInteger('bathrooms');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
