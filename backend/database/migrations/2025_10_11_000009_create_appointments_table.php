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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();

            $table->dateTime('dateTime');
            $table->text('reason')->nullable();

            $table->foreignId('userID')->constrained('users')->onDelete('cascade');
            $table->foreignId('doctorID')->constrained('doctors')->onDelete('cascade');
            $table->foreignId('appointmentStatusID')->constrained('appointment_statuses')->onDelete('cascade');
            $table->foreignId('rewardID')->nullable()->constrained('rewards')->onDelete('set null');
            $table->foreignId('healthFacilityID')->constrained('health_facilities')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
