<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Role::factory()->create([
            'name' => 'Student',
        ]);
        Role::factory()->create([
            'name' => 'Partner',
        ]);
        Role::factory()->create([
            'name' => 'Director',
        ]);
        Role::factory()->create([
            'name' => 'Coordinator',
        ]);

    }
}
