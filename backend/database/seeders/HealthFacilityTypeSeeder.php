<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HealthFacilityType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HealthFacilityTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HealthFacilityType::insert([
            ['type' => 'Hospital'],
            ['type' => 'Puskesmas'],
        ]);
    }
}
