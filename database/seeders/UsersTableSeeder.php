<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
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
            [
                'name'                    => 'Ridho',
                'email'                   => 'ridho@gmail.com',
                'password'                => Hash::make('Admin@12345'),
                'remember_token'          => NULL,
                'created_at'          => date('Y-m-d h:i:s'),
                'updated_at'          => date('Y-m-d h:i:s'),
            ],
            [
                'name'                    => 'Alfian',
                'email'                   => 'alfian@gmail.com',
                'password'                => Hash::make('Admin@12345'),
                'remember_token'          => NULL,
                'created_at'          => date('Y-m-d h:i:s'),
                'updated_at'          => date('Y-m-d h:i:s'),
            ],
        ];

        User::insert($users);
    }
}
