<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'Samiullah',
            'last_name' => 'Gulzar',
            'father_name' => 'Najibullah',
            'phone_number' => '0708315297',
            'id_card_number' => '14785236912',
            'salary' => 15000,
            'bio' => 'nothing',
            'gender' => 1,
            'marital_status' => 0,
            'status' => 1,
            'role_id' => 1,
            'email' => 'samigulzar178@gmail.com',
            'password' => bcrypt('sms@1234'),
        ]);
        
    }
}
