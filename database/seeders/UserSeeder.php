<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
public function run()
{
    User::create([
        'name' => 'User Travelia',
        'email' => 'user@gmail.com',
        'role' => 'user',
        'password' => Hash::make('12345678'),
    ]);

    User::create([
        'name' => 'Admin Travelia',
        'email' => 'admin@gmail.com',
        'role' => 'admin',
        'password' => Hash::make('12345678'),
    ]);
}
}
