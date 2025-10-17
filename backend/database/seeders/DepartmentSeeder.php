<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $Departments = [
            'Umum',
            'Anak',
            'Kandungan',
            'Kulit dan Kelamin',
            'Telinga Hidung Tenggorokan (THT)',
            'Gigi',
            'Mata',
            'Jantung',
            'Saraf',
            'Jiwa',
            'Radiologi',
            'Laboratorium',
            'Farmasi',
            'Instansi Gawat Darurat (IGD)',
            'Rehabilitasi Medik',
            'Lansia',
            'Kesehatan Ibu dan Anak',
        ];


        foreach ($Departments as $department) {
            Department::create([
                'name' => $department
            ]);
        }
    }
}
