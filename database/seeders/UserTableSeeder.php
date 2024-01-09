<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
            //Admin
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'superadmin@gmail.com',
            'password'=>hash::make('password'),
            'role' => 'admin',
            'status' => 'active',
            ],
            [
                //Manager
                'name' => 'Manager',
                'username' => 'manager',
                'email' => 'manager@gmail.com',
                'password'=>hash::make('password'),
                'role' => 'manager',
                'status' => 'active',
                ],
                [
                //User
                'name' => 'User',
                'username' => 'user',
                'email' => 'usertoto@gmail.com',
                'password'=>hash::make('password'),
                'role' => 'user',
                'status' => 'active',
                ],
    ]
        );
    }
}


