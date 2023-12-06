<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class SiswaDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('siswadetail')->insert([
            'nama_bapak' => 'Asep',
            'nama_ibu' => 'Madiyah',
            'pekerjaan_bapak' => 'Programmer',
            'pekerjaan_ibu' => 'Vtuber',
            'nomor_telepon_bapak' => '089723123123',
            'nomor_telepon_ibu' => '0892361723',
            'umur' => '16',
            'umur_bapak' => '20',
            'umur_ibu' => '20',
            'agama' => 'Islam',
            'tempat_lahir' => 'Cimahi',
            'tanggal_lahir' => Date::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('siswadetail')->insert([
            'nama_bapak' => 'Ujang',
            'nama_ibu' => 'Sayumi',
            'pekerjaan_bapak' => 'Programmers',
            'pekerjaan_ibu' => 'Vtubers',
            'nomor_telepon_bapak' => '08972312312',
            'nomor_telepon_ibu' => '0892361724',
            'umur' => '19',
            'umur_bapak' => '40',
            'umur_ibu' => '40',
            'agama' => 'Islams',
            'tempat_lahir' => 'Cimahi2',
            'tanggal_lahir' => Date::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
