<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jurusan')->insert([
            'gambar_jurusan' => 'rpl.png',
            'nama_jurusan' => 'RPL',
        ]);

        DB::table('jurusan')->insert([
            'gambar_jurusan' => 'eind.png',
            'nama_jurusan' => 'EIND',
        ]);

        DB::table('jurusan')->insert([
            'gambar_jurusan' => 'iop.jpeg',
            'nama_jurusan' => 'IOP',
        ]);

        DB::table('jurusan')->insert([
            'gambar_jurusan' => 'meka.jpg',
            'nama_jurusan' => 'MEKA',
        ]);

        DB::table('jurusan')->insert([
            'gambar_jurusan' => 'pspt.png',
            'nama_jurusan' => 'PSPT',
        ]);

        DB::table('jurusan')->insert([
            'gambar_jurusan' => 'sija.png',
            'nama_jurusan' => 'SIJA',
        ]);

        DB::table('jurusan')->insert([
            'gambar_jurusan' => 'tek.jpeg',
            'nama_jurusan' => 'TEK',
        ]);

        DB::table('jurusan')->insert([
            'gambar_jurusan' => 'toi.jpeg',
            'nama_jurusan' => 'TOI',
        ]);

        DB::table('jurusan')->insert([
            'gambar_jurusan' => 'tp.jpeg',
            'nama_jurusan' => 'TPTU',
        ]);
    }
}
