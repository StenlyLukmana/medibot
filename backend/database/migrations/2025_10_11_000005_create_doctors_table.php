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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();

            $table->string('email')->unique();
            $table->string('name');
            $table->string('contact')->nullable();
            $table->time('available_from')->nullable();
            $table->time('available_until')->nullable();

            $table->foreignId('health_facility_id')->constrained()->onDelete('cascade');
            $table->foreignId('health_facility_department_id')->constrained()->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
