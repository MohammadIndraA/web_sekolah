<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdmin = User::create([
            'name' => 'Super Admin', 
            'email' => 'superadmin@example.com',
            'password' => Hash::make('password')
        ]);
        $superAdmin->assignRole('Super Admin');

        // Creating Admin User
        $admin = User::create([
            'name' => 'Kontributor', 
            'email' => 'admin@example.com',
            'password' => Hash::make('password')
        ]);

        $superAdmin->assignRole('Admin');
    }
}
