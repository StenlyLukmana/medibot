<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Partner::insert([
            [
                'name' => 'Tommorow Kovee',
                'contact' => '021-555-1234',
            ],
            [
                'name' => 'CrabFood',
                'contact' => '021-555-4321',
            ],
        ]);
    }
}
