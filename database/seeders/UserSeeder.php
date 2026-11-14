<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::insert([
            [
                'name'       => 'Guru',
                'email'      => 'kalinna@gmail.com',
                'password'   => Hash::make('kalinmnbvcxz'),
                'role'       => 'Guru',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Siswa',
                'email'      => 'robet@gmail.com',
                'password'   => Hash::make('robetkyut'),
                'role'       => 'Siswa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}