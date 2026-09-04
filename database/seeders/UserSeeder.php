<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin rumahEat',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Dapur rumahEat',
            'email' => 'dapur@gmail.com',
            'password' => Hash::make('dapur123'),
            'role' => 'dapur',
        ]);

        User::create([
            'name' => 'Pemilik rumahEat',
            'email' => 'pemilik@gmail.com',
            'password' => Hash::make('pemilik123'),
            'role' => 'pemilik',
        ]);
    }
}
