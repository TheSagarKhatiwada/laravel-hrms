<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        if (!User::where('email', 'admin@hrmspro.com')->exists()) {
            User::create([
                'name' => 'Admin',
                'email' => 'admin@hrmspro.com',
                'password' => Hash::make('admin1234'),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                // Add role assignment logic if needed
            ]);
        }
    }
}
