<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Student Test',
            'email' => 'student@test.test',
            'password' => 'test',
            'role' => 'Student'
        ]);

        User::factory()->create([
            'name' => 'Director Test',
            'email' => 'director@test.test',
            'password' => 'test',
            'role' => 'Director'
        ]);

        User::factory()->create([
            'name' => 'Coordinator Test',
            'email' => 'coordinator@test.test',
            'password' => 'test',
            'role' => 'Coordinator'
        ]);

        User::factory()->create([
            'name' => 'Partner Test',
            'email' => 'partner@test.test',
            'password' => 'test',
            'role' => 'Partner'
        ]);

        User::factory()->create([
            'name' => 'None Test',
            'email' => 'none@test.test',
            'password' => 'test',
            'role' => 'None'
        ]);

    }
}
