<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'reifanazkia',
            'email' => 'reifanazkia@gmail.com',
            'password' => Hash::make('hexagon'),
            'role' => 'admin',
        ]);
    }
}
