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

        Appointment::create([
            'dateTime' => now()->addDays(3)->setTime(10, 0),
            'reason' => 'Routine checkup',
            'userID' => $user->id,
            'doctorID' => $doctor->id,
            'appointmentStatusID' => $appointmentStatusID->id,
            'rewardID' => $reward->id,
            'healthFacilityID' => $facility->id,
        ]);
    }
}
