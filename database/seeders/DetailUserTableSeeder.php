<?php

namespace Database\Seeders;

use App\Models\Detailuser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetailUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $detail_user = [
            [
                'users_id'            => 1,
                'photo'               => '',
                'role'                => 'Wensite Developer',
                'contact_number'      => '',
                'biography'           => '',
                'created_at'          => date('Y-m-d h:i:s'),
                'updated_at'          => date('Y-m-d h:i:s'),
            ],
            [
                'users_id'            => 2,
                'photo'               => '',
                'role'                => 'UI Designer',
                'contact_number'      => '',
                'biography'           => '',
                'created_at'          => date('Y-m-d h:i:s'),
                'updated_at'          => date('Y-m-d h:i:s'),
            ],
        ];

        DetailUser::insert($detail_user);
    }
}
