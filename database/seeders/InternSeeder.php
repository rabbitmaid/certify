<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Intern;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InternSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::firstOrCreate([
            'name' => 'Intern User',
            'email' => 'itern@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10)
        ]);

        $user->assignRole('intern');

        Intern::factory()->create([
           'user_id' => $user
        ]);
    }
}
