<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'AdminUser1',
            'email' => 'admin@example.com',
            'password' => Hash::make('Jvpc2010'),
            'role' => 'admin' //The default role for a user is user
        ]);
    }
}
