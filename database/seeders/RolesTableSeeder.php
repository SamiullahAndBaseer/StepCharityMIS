<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Admin',
            'description' => 'This person has all permission'
        ]);

        DB::table('roles')->insert([
            'name' => 'Teacher',
            'description' => 'This person do works of a teacher'
        ]);

        DB::table('roles')->insert([
            'name' => 'Student',
            'description' => 'This person has a little permission'
        ]);

        DB::table('roles')->insert([
            'name' => 'Finance',
            'description' => 'This person has all permission in the finance section'
        ]);
    }
}
