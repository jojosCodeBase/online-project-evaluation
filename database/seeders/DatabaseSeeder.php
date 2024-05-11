<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Students;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make(12345678),
            'role' => 0,
        ]);

        User::create([
            'name' => 'Dr. Moumita Pramanik',
            'email' => 'moumitapramanik@gmail.com',
            'password' => Hash::make(12345678),
            'role' => 1,
        ]);

        $user = User::create([
            'name' => 'Kunsang Moktan',
            'email' => 'kunsang@gmail.com',
            'password' => Hash::make(12345678),
            'role' => 2,
        ]);

        Students::create([
            'user_id' => $user->id, // Assign the newly created user's ID
            'regno' => 202116033,
        ]);

        $user = User::create([
            'name' => 'Moyuk Rudra',
            'email' => 'moyuk@gmail.com',
            'password' => Hash::make(12345678),
            'role' => 2,
        ]);

        Students::create([
            'user_id' => $user->id, // Assign the newly created user's ID
            'regno' => 202116030,
        ]);

        $user = User::create([
            'name' => 'Ritik Roshan',
            'email' => 'ritik@gmail.com',
            'password' => Hash::make(12345678),
            'role' => 2,
        ]);

        Students::create([
            'user_id' => $user->id, // Assign the newly created user's ID
            'regno' => 202116038,
        ]);

    }
}
