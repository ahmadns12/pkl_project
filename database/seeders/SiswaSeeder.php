<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('siswa')->insert([
            'nis' => '21115688',            
            'nama_siswa' => 'Vestia Zeta',
            'nomor_telepon' => '0895343302434',
            'id_siswadetail' => '1',
            'id_guru' => '1',
            'gambar_siswa' => 'zeta.jpg',
            'alamat' => 'Japanese',
            'jenis_kelamin' => 'p',
            'id_jurusan' => '1',
            'id_angkatan' => '1',
            'status' => '0',
            'sudah_memilih' => '0',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('siswa')->insert([
            'nis' => '2117283',
            'nama_siswa' => 'Doktah',
            'nomor_telepon' => '0895343302434',
            'gambar_siswa' => 'user.jpg',
            'id_siswadetail' => '2',
            'alamat' => 'Japanese',
            'jenis_kelamin' => 'l',
            'id_guru' => '1',
            'id_jurusan' => '2',
            'id_angkatan' => '2',
            'status' => '1',
            'sudah_memilih' => '0',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

	    // DB::table('siswa')->insert([
        //     'nis' => '2117284',
        //     'nama_siswa' => 'Abdul Kris',
        //     'nomor_telepon' => '0895343302434',
        //     'gambar_siswa' => 'user.jpg',
        //     'alamat' => 'Cibabat',
        //     'jenis_kelamin' => 'l',
        //     'id_guru' => '2',
        //     'jurusan' => 'SIJA',
        //     'angkatan' => '47',
        //     'status' => '1',
        //     'sudah_memilih' => '0',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now(),
        // ]);

	    // DB::table('siswa')->insert([
        //     'nis' => '2117285',
        //     'nama_siswa' => 'Muhammad Yusuf',
        //     'nomor_telepon' => '0895343302434',
        //     'gambar_siswa' => 'user.jpg',
        //     'alamat' => 'Cihanjuang',
        //     'jenis_kelamin' => 'l',
        //     'id_guru' => '3',
        //     'jurusan' => 'TPTU',
        //     'angkatan' => '47',
        //     'status' => '1',
        //     'sudah_memilih' => '0',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now(),
        // ]);
	
	    // DB::table('siswa')->insert([
        //     'nis' => '2117286',
        //     'nama_siswa' => 'Mutiara Lestari',
        //     'nomor_telepon' => '0895343302434',
        //     'gambar_siswa' => 'user.jpg',
        //     'alamat' => 'Gatsu',
        //     'jenis_kelamin' => 'p',
        //     'id_guru' => '4',
        //     'jurusan' => 'TEI',
        //     'angkatan' => '48',
        //     'status' => '1',
        //     'sudah_memilih' => '0',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now(),
        // ]);
	
	    // DB::table('siswa')->insert([
        //     'nis' => '2117287',
        //     'nama_siswa' => 'Elina Katsuya',
        //     'nomor_telepon' => '0895343302434',
        //     'gambar_siswa' => 'user.jpg',
        //     'alamat' => 'Gunung Batu',
        //     'jenis_kelamin' => 'p',
        //     'id_guru' => '5',
        //     'jurusan' => 'MEKA',
        //     'angkatan' => '46',
        //     'status' => '1',
        //     'sudah_memilih' => '0',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now(),
        // ]);

	    // DB::table('siswa')->insert([
        //     'nis' => '2117288',
        //     'nama_siswa' => 'Ahmad Rizal',
        //     'nomor_telepon' => '0895343302434',
        //     'gambar_siswa' => 'user.jpg',
        //     'alamat' => 'Gunung Bohong',
        //     'jenis_kelamin' => 'l',
        //     'id_guru' => '6',
        //     'jurusan' => 'TOI',
        //     'angkatan' => '48',
        //     'status' => '1',
        //     'sudah_memilih' => '0',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now(),
        // ]);

	    // DB::table('siswa')->insert([
        //     'nis' => '2117289',
        //     'nama_siswa' => 'Nisa Sabrina',
        //     'nomor_telepon' => '0895343302434',
        //     'gambar_siswa' => 'user.jpg',
        //     'alamat' => 'Gunung Bohong',
        //     'jenis_kelamin' => 'p',
        //     'id_guru' => '7',
        //     'jurusan' => 'RPL',
        //     'angkatan' => '46',
        //     'status' => '1',
        //     'sudah_memilih' => '0',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now(),
        // ]);

	    // DB::table('siswa')->insert([
        //     'nis' => '2117290',
        //     'nama_siswa' => 'Dwi Harumi',
        //     'nomor_telepon' => '0895343302434',
        //     'gambar_siswa' => 'user.jpg',
        //     'alamat' => 'Jakarta',
        //     'jenis_kelamin' => 'p',
        //     'id_guru' => '9',
        //     'jurusan' => 'PSPT',
        //     'angkatan' => '48',
        //     'status' => '1',
        //     'sudah_memilih' => '0',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now(),
        // ]);

	    // DB::table('siswa')->insert([
        //     'nis' => '2117291',
        //     'nama_siswa' => 'Udin Rusmandi',
        //     'nomor_telepon' => '0895343302434',
        //     'gambar_siswa' => 'user.jpg',
        //     'alamat' => 'Bogor',
        //     'jenis_kelamin' => 'l',
        //     'id_guru' => '1',
        //     'jurusan' => 'TEDK',
        //     'angkatan' => '46',
        //     'status' => '1',
        //     'sudah_memilih' => '0',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now(),
        // ]);

	    // DB::table('siswa')->insert([
        //     'nis' => '2117292',
        //     'nama_siswa' => 'Nasya Mutia',
        //     'nomor_telepon' => '0895343302434',
        //     'gambar_siswa' => 'user.jpg',
        //     'alamat' => 'Cimahi',
        //     'jenis_kelamin' => 'p',
        //     'id_guru' => '2',
        //     'jurusan' => 'IOP',
        //     'angkatan' => '47',
        //     'status' => '1',
        //     'sudah_memilih' => '0',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now(),
        // ]);

	    // DB::table('siswa')->insert([
        //     'nis' => '2117293',
        //     'nama_siswa' => 'Amelia Grace',
        //     'nomor_telepon' => '0895343302434',
        //     'gambar_siswa' => 'user.jpg',
        //     'alamat' => 'Villa Harmoni',
        //     'jenis_kelamin' => 'p',
        //     'id_guru' => '3',
        //     'jurusan' => 'SIJA',
        //     'angkatan' => '46',
        //     'status' => '1',
        //     'sudah_memilih' => '0',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now(),
        // ]);

	    // DB::table('siswa')->insert([
        //     'nis' => '2117294',
        //     'nama_siswa' => 'Ethan James',
        //     'nomor_telepon' => '0895343302434',
        //     'gambar_siswa' => 'user.jpg',
        //     'alamat' => 'Puri Sejahtera',
        //     'jenis_kelamin' => 'l',
        //     'id_guru' => '4',
        //     'jurusan' => 'MEKA',
        //     'angkatan' => '47',
        //     'status' => '0',
        //     'sudah_memilih' => '0',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now(),
        // ]);

	    // DB::table('siswa')->insert([
        //     'nis' => '2117295',
        //     'nama_siswa' => 'Olivia Rose',
        //     'nomor_telepon' => '0895343302434',
        //     'gambar_siswa' => 'user.jpg',
        //     'alamat' => 'Taman Persada',
        //     'jenis_kelamin' => 'p',
        //     'id_guru' => '5',
        //     'jurusan' => 'TPTU',
        //     'angkatan' => '48',
        //     'status' => '0',
        //     'sudah_memilih' => '0',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now(),
        // ]);

	    // DB::table('siswa')->insert([
        //     'nis' => '2117296',
        //     'nama_siswa' => 'Liam Alexander',
        //     'nomor_telepon' => '0895343302434',
        //     'gambar_siswa' => 'user.jpg',
        //     'alamat' => 'Permata Residence',
        //     'jenis_kelamin' => 'l',
        //     'id_guru' => '6',
        //     'jurusan' => 'IOP',
        //     'angkatan' => '46',
        //     'status' => '0',
        //     'sudah_memilih' => '0',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now(),
        // ]);

	    // DB::table('siswa')->insert([
        //     'nis' => '2117297',
        //     'nama_siswa' => 'Ava Isabella',
        //     'nomor_telepon' => '0895343302434',
        //     'gambar_siswa' => 'user.jpg',
        //     'alamat' => 'Lavender Heights',
        //     'jenis_kelamin' => 'p',
        //     'id_guru' => '7',
        //     'jurusan' => 'TEDK',
        //     'angkatan' => '47',
        //     'status' => '0',
        //     'sudah_memilih' => '0',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now(),
        // ]);

	    // DB::table('siswa')->insert([
        //     'nis' => '2117298',
        //     'nama_siswa' => 'Noah Benjamin',
        //     'nomor_telepon' => '0895343302434',
        //     'gambar_siswa' => 'user.jpg',
        //     'alamat' => 'Taman Mawar Indah',
        //     'jenis_kelamin' => 'l',
        //     'id_guru' => '8',
        //     'jurusan' => 'TEI',
        //     'angkatan' => '48',
        //     'status' => '0',
        //     'sudah_memilih' => '0',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now(),
        // ]);

	    // DB::table('siswa')->insert([
        //     'nis' => '2117300',
        //     'nama_siswa' => 'Sophia Marie',
        //     'nomor_telepon' => '0895343302434',
        //     'gambar_siswa' => 'user.jpg',
        //     'alamat' => 'Bukit Mas Indah',
        //     'jenis_kelamin' => 'p',
        //     'id_guru' => '9',
        //     'jurusan' => 'PSPT',
        //     'angkatan' => '46',
        //     'status' => '0',
        //     'sudah_memilih' => '0',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now(),
        // ]);

	    // DB::table('siswa')->insert([
        //     'nis' => '2117301',
        //     'nama_siswa' => 'Jackson Thomas',
        //     'nomor_telepon' => '0895343302434',
        //     'gambar_siswa' => 'user.jpg',
        //     'alamat' => 'Bukit Asri',
        //     'jenis_kelamin' => 'l',
        //     'id_guru' => '1',
        //     'jurusan' => 'RPL',
        //     'angkatan' => '47',
        //     'status' => '0',
        //     'sudah_memilih' => '0',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now(),
        // ]);

	    // DB::table('siswa')->insert([
        //     'nis' => '2117302',
        //     'nama_siswa' => 'Elijah Samuel',
        //     'nomor_telepon' => '0895343302434',
        //     'gambar_siswa' => 'user.jpg',
        //     'alamat' => 'Indah Vista',
        //     'jenis_kelamin' => 'l',
        //     'id_guru' => '2',
        //     'jurusan' => 'TPTU',
        //     'angkatan' => '48',
        //     'status' => '0',
        //     'sudah_memilih' => '0',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now(),
        // ]);

	    // DB::table('siswa')->insert([
        //     'nis' => '2117303',
        //     'nama_siswa' => 'Abigail Claire',
        //     'nomor_telepon' => '0895343302434',
        //     'gambar_siswa' => 'user.jpg',
        //     'alamat' => 'Green Valley',
        //     'jenis_kelamin' => 'p',
        //     'id_guru' => '3',
        //     'jurusan' => 'SIJA',
        //     'angkatan' => '48',
        //     'status' => '0',
        //     'sudah_memilih' => '0',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now(),
        // ]);

	    // DB::table('siswa')->insert([
        //     'nis' => '2117304',
        //     'nama_siswa' => 'Lucas Henry',
        //     'nomor_telepon' => '0895343302434',
        //     'gambar_siswa' => 'user.jpg',
        //     'alamat' => 'Nirwana Garden',
        //     'jenis_kelamin' => 'l',
        //     'id_guru' => '5',
        //     'jurusan' => 'MEKA',
        //     'angkatan' => '47',
        //     'status' => '0',
        //     'sudah_memilih' => '0',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now(),
        // ]);

	    // DB::table('siswa')->insert([
        //     'nis' => '2117305',
        //     'nama_siswa' => 'Henry Oliver',
        //     'nomor_telepon' => '0895343302434',
        //     'gambar_siswa' => 'user.jpg',
        //     'alamat' => 'Nirwana Villas',
        //     'jenis_kelamin' => 'l',
        //     'id_guru' => '6',
        //     'jurusan' => 'TEI',
        //     'angkatan' => '48',
        //     'status' => '0',
        //     'sudah_memilih' => '0',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now(),
        // ]);

        
    }
}
