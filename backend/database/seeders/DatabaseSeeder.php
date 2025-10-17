<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\DoctorSeeder;
use Database\Seeders\RewardSeeder;
use Database\Seeders\PartnerSeeder;
use Database\Seeders\DepartmentSeeder;
use Database\Seeders\AppointmentSeeder;
use Database\Seeders\HealthFacilitySeeder;
use Database\Seeders\AppointmentStatusSeeder;
use Database\Seeders\HealthFacilityTypeSeeder;
use Database\Seeders\HealthFacilityDepartmentSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            HealthFacilityTypeSeeder::class,
            HealthFacilitySeeder::class,
            DepartmentSeeder::class,
            HealthFacilityDepartmentSeeder::class,
            DoctorSeeder::class,
            PartnerSeeder::class,
            RewardSeeder::class,
            AppointmentStatusSeeder::class,
            AppointmentSeeder::class,
        ]);
    }
}
