<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AppointmentStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AppointmentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AppointmentStatus::insert([
            [
                'name' => 'Pending',
            ],
            [
                'name' => 'Confirmed',
            ],
            [
                'name' => 'Completed',
            ],
            [
                'name' => 'Cancelled',
            ],
        ]);
    }
}
