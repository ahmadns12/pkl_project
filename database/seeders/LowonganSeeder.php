<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class LowonganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('lowongan')->insert([
            'id_perusahaan' => '1',
            'id_angkatan' => '1',
            'jumlah_siswa' => '5',
            'id_jurusan' => '1',
            'posisi' => 'Backend',
            'tanggal_mulai' => Date::now(),
            'tanggal_selesai' => Date::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('lowongan')->insert([
            'id_perusahaan' => '5',
            'id_angkatan' => '1',
            'jumlah_siswa' => '3',
            'id_jurusan' => '4',
            'posisi' => 'Robot Maker',
            'tanggal_mulai' => Date::now(),
            'tanggal_selesai' => Date::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('lowongan')->insert([
            'id_perusahaan' => '7',
            'id_angkatan' => '1',
            'jumlah_siswa' => '4',
            'id_jurusan' => '5',
            'posisi' => 'Sutradara',
            'tanggal_mulai' => Date::now(),
            'tanggal_selesai' => Date::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
