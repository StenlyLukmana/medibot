<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Doctor;
use App\Models\HealthFacility;
use App\Models\HealthFacilityDepartment;

class DoctorSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedDoctorsForFacility('RS North Blue', '@rsnorthblue.com');
        $this->seedDoctorsForFacility('Puskesmas Drum Island', '@drumisland.go.id');
    }

    private function seedDoctorsForFacility(string $facilityName, string $emailDomain): void
    {
        $facility = HealthFacility::where('name', $facilityName)->first();

        $departments = HealthFacilityDepartment::where('healthFacilityID', $facility->id)->get();

        foreach ($departments as $department) {

            Doctor::create([
                'email' => 'dr' . strtolower(str_replace(' ', '', $department->department->name)) . $emailDomain,
                'name' => 'Dr. ' . $department->department->name,
                'contact' => '0812000' . rand(1000, 9999),
                'availableFrom' => '08:00:00',
                'availableUntil' => '16:00:00',
                'healthFacilityID' => $facility->id,
                'healthFacilityDepartmentID' => $department->id,
            ]);
        }
    }
}
