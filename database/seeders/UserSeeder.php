<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
            "id" => 1,
            "name" => 'nguyen van A',
            "email" => "admin@gmail.com",
            "password" => Hash::make('admin'),
            "group_id" => 1,
            "avatar" => "12345",
            ],
    ]);
    }
}
