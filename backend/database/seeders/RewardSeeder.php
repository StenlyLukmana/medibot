<?php

namespace Database\Seeders;

use App\Models\Reward;
use App\Models\Partner;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RewardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tommorrowKovee = Partner::where('name', 'Tommorow Kovee')->first();
        $crabFood = Partner::where('name', 'CrabFood')->first();

        Reward::insert([
            [
                'name' => 'Voucher Diskon Tommorow Kovee',
                'discount' => 10000,
                'expiryDate' => now()->addMonths(3),
                'partnerID' => $tommorrowKovee->id,
            ],
            [
                'name' => 'Voucher Diskon CrabFood',
                'discount' => 15000,
                'expiryDate' => now()->addMonths(2),
                'partnerID' => $crabFood->id,
            ],
        ]);
    }
}
