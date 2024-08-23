<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $testStudent = User::where('email', 'student@test.test')->first();
        $testPartner = User::where('email', 'partner@test.test')->first();
        $testDirector = User::where('email', 'director@test.test')->first();
        $testCoordinator = User::where('email', 'coordinator@test.test')->first();

        $testStudent->roles()->attach(1);
        $testPartner->roles()->attach(2);
        $testDirector->roles()->attach(3);
        $testCoordinator->roles()->attach(4);

    }
}
