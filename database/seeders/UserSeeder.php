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
        'name' => 'arfa aniq sabila',
        'email' => 'admin2@gmail.com ',
        'password' => Hash::make('admin123'),
    ]);
}
}