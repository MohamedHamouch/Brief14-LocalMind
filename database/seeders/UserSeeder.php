<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        // Create a default admin user
        DB::table('users')->insert([
            'name' => 'Admin User',
            'email' => 'admin@localmind.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create some regular users
        $users = [
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Sarah Smith',
                'email' => 'sarah@example.com',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Mike Johnson',
                'email' => 'mike@example.com',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Lisa Brown',
                'email' => 'lisa@example.com',
                'password' => Hash::make('password123'),
            ],
        ];

        foreach ($users as $user) {
            DB::table('users')->insert([
                'name' => $user['name'],
                'email' => $user['email'],
                'email_verified_at' => now(),
                'password' => $user['password'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

    }
}
