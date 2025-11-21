<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Reward;
use App\Models\Appointment;
use App\Models\HealthFacility;
use Illuminate\Database\Seeder;
use App\Models\AppointmentStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();
        $doctor = Doctor::first();
        $reward = Reward::first();
        $appointmentStatusID = AppointmentStatus::where('name', 'Pending')->first();
        $facility = HealthFacility::first();
        $start = now()->setTime(9, 0);
        $end   = $start->copy()->addHours(2);

        Appointment::create([
            'date' => now()->addDays(3)->toDateString(),
            'start_time' => $start->format('H:i:s'),
            'end_time' => $end->format('H:i:s'),
            'reason' => 'Routine checkup',
            'user_id' => $user->id,
            'doctor_id' => $doctor->id,
            'appointment_status_id' => $appointmentStatusID->id,
            'reward_id' => $reward->id,
            'health_facility_id' => $facility->id,
        ]);
    }
}
