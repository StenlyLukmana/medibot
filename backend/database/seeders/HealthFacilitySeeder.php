<?php

namespace Database\Seeders;

use App\Models\HealthFacility;
use Illuminate\Database\Seeder;
use App\Models\HealthFacilityType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HealthFacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hospital = HealthFacilityType::where('type', 'Hospital')->first()->id;
        $puskesmas = HealthFacilityType::where('type', 'Puskesmas')->first()->id;

        HealthFacility::insert([
            [
                'name' => 'RS North Blue',
                'email' => 'info@rsnorthblue.com',
                'password' => bcrypt('password'),
                'address' => 'Jl. North Blue',
                'contact_number' => '081234567890',
                'health_facility_type_id' => $hospital,
            ],
            [
                'name' => 'Puskesmas Drum Island',
                'email' => 'puskesmas@drumisland.go.id',
                'password' => bcrypt('password'),
                'address' => 'Jl. Drum Island',
                'contact_number' => '0812345679',
                'health_facility_type_id' => $puskesmas,
            ],
        ]);
    }
}
