<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PanduanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('panduan')->insert([
            'file_panduan' => '1701148682_Jadwal Tes TOEIC Tk 12 dan Guru TA 2023-2024 (1).pdf',            
            'nama_panduan' => 'Panduan Tata Cara Menggunakan Aplikasi PKL',
            'deskripsi' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolores autem odio unde velit, quibusdam iure minus commodi consectetur voluptatem error!',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
