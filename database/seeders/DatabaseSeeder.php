<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            WorkCenterSeeder::class,
            LotSeeder::class,
            ProductionSeeder::class,
        ]);

        // create default users
        User::create([
            'employee_id' => 'EMP001',
            'name' => 'Azkadina Hana Haura',
            'role' => 'admin',
            'password' => Hash::make('123')
        ]);

        User::create([
            'employee_id' => 'EMP002',
            'name' => 'Ilham Tri Rahayudi',
            'role' => 'supervisor',
            'password' => Hash::make('123')
        ]);

        User::create([
            'employee_id' => 'EMP003',
            'name' => 'Syagah Haidar',
            'role' => 'operator',
            'password' => Hash::make('123')
        ]);

<<<<<<< HEAD
=======
        for ($i = 4; $i <= 100; $i++) {
            User::create([
                'employee_id' => 'EMP00' . $i,
                'name' => 'Operator ' . $i,
                'role' => 'operator',
                'password' => Hash::make('123')
            ]);
        }

>>>>>>> dev-romi
        // Uncomment the following lines to create a default user
        // User::create([
        //     'name' => 'Admin',
        //     'email' => '
    }
}
