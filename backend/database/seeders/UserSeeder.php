<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Arthur Pendragon',
            'email' => 'Arthur@example.com',
            'password' => bcrypt('password'),
            'phoneNumber' => '081234567800',
        ]);
    }
}
