<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\HealthFacility;
use Illuminate\Database\Seeder;
use App\Models\HealthFacilityType;
use App\Models\HealthFacilityDepartment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HealthFacilityDepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hospital = HealthFacility::where('name', 'RS North Blue')->first();
        $puskesmas = HealthFacility::where('name', 'Puskesmas Drum Island')->first();

        $hospitalDepartments = Department::whereIn('name', [
            'Umum',
            'Anak',
            'Kandungan',
            'Telinga Hidung Tenggorokan (THT)',
            'Gigi',
            'Mata',
            'Jantung',
            'Saraf',
            'Radiologi',
            'Laboratorium',
            'Farmasi',
            'Instansi Gawat Darurat (IGD)',
            'Rehabilitasi Medik',
            'Lansia',
            'Kesehatan Ibu dan Anak',
        ])->get();

        $puskesmasDepartments = Department::whereIn('name', [
            'Umum',
            'Kandungan',
            'Gigi',
            'Lansia',
            'Kesehatan Ibu dan Anak',
        ])->get();

        foreach ($hospitalDepartments as $dept) {
            HealthFacilityDepartment::create([
                'department_id' => $dept->id,
                'health_facility_id' => $hospital->id,
            ]);
        }

        foreach ($puskesmasDepartments as $dept) {
            HealthFacilityDepartment::create([
                'department_id' => $dept->id,
                'health_facility_id' => $puskesmas->id,
            ]);
        }
    }
}
