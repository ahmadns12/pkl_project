<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('formulir')->insert([
            'nis' => '21115688',
            'nama_lengkap' => 'Ahmad Naufal Shiddiq',
            'alamat_siswa' => 'Patrol',
            'no_hp' => '089534302434',
            'no_ortu'=> '0892323231',
            'umur' => '17',
            'posisi' => 'Backend',
            'jurusan' => 'RPL',
            'nama_perusahaan' => 'PT JAYAABADI',
            'alamat_perusahaan' => 'Jaksel',
            'approve_hubin' => '0',
            'approve_kurikulum' => '0',
            'approve_kakom' => '0',
            'angkatan' => '48',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('formulir')->insert([
            'nis' => '21115689',
            'nama_lengkap' => 'Hilmy Rizky',
            'alamat_siswa' => 'Padagasuka',
            'no_hp' => '08953423231',
            'no_ortu'=> '08923220103',
            'umur' => '18',
            'posisi' => 'Frontend',
            'jurusan' => 'RPL',
            'nama_perusahaan' => 'PT MEKRABADI',
            'alamat_perusahaan' => 'Jakarta',
            'approve_hubin' => '0',
            'approve_kurikulum' => '0',
            'approve_kakom' => '0',
            'angkatan' => '48',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
