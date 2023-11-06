<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@demo.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Dtnthievbn2653'),
            'locale_id' => null,
            'role' => 'admin',
            'remember_token' => Str::random(10)
        ]);
    }
}
