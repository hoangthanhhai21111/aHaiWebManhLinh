<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HangSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('hangs')->insert([
            [
            "id" => 1,
            "ten_hang" => 'Số Tự Động',
            "ky_hieu" => 'B1.1',
            ],
            [
                "id" => 2,
                "ten_hang" => 'Số Tự Động',
                "ky_hieu" => 'B2',
            ],
    ]);
    }
}
