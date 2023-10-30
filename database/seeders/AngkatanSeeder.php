<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AngkatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('angkatan')->insert([
            'angkatan' => '48',
            'tahun_pembelajaran' => '2023 - 2024'
        ]);

        DB::table('angkatan')->insert([
            'angkatan' => '49',
            'tahun_pembelajaran' => '2024 - 2025'
        ]);
    }
}
