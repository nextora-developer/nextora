<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Create Admin User
        User::updateOrCreate(
            ['email' => 'admin@admin.com'], // unique
            [
                'name' => 'Admin',
                'password' => bcrypt('password'), // change later
                'is_admin' => true,
                'email_verified_at' => now(),
            ]
        );

        // Create Normal User
        User::updateOrCreate(
            ['email' => 'user@user.com'],
            [
                'name' => 'Normal User',
                'password' => bcrypt('password'),
                'is_admin' => false,
                'email_verified_at' => now(),
            ]
        );
    }
}
