<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ['name' => 'Forhad', 'email' => 'forhad@demo.com', 'password' => '123456'],
            ['name' => 'Hossain', 'email' => 'hossain@demo.com', 'password' => '123456'],
            ['name' => 'Riyad', 'email' => 'riyad@demo.com', 'password' => '123456'],
            ['name' => 'Jannat', 'email' => 'jannat@demo.com', 'password' => '123456'],
        ];

        User::insert($users);
    }
}
