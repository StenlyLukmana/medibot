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
        Schema::create('health_facility_departments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('healthFacilityID')->constrained('health_facilities')->onDelete('cascade');
            $table->foreignId('departmentID')->constrained('departments')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('health_facility_departments');
    }
};
