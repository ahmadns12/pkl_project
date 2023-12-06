<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('guru')->insert([
            'nip' => '983893023',
            'nik' => '324481',
            'nama_guru' => 'Nazrilp',
            'jabatan' => 'Guru Jurusan',
            'gambar_guru' => 'user.jpg',
            'id_jurusan' => '7',
            'jenis_kelamin' => 'l',
        ]);

        DB::table('guru')->insert([
            'nip' => '3280832',
            'nik' => '820932',
            'nama_guru' => 'Sudrajat Ruhiyat',
            'jabatan' => 'Guru Jurusan',
            'gambar_guru' => 'user.jpg',
            'id_jurusan' => '1',
            'jenis_kelamin' => 'l',
        ]);


        DB::table('guru')->insert([
            'nip' => '20499284',
            'nik' => '014322',
            'nama_guru' => 'Nina Ninu',
            'jabatan' => 'Guru NA',
            'gambar_guru' => 'user.jpg',
            'jenis_kelamin' => 'p',
        ]);


        DB::table('guru')->insert([
                'nip' => '23482320',
                'nik' => '2370298',
                'nama_guru' => 'Rafi Putra',
                'jabatan' => 'Guru Jurusan',
                'gambar_guru' => 'user.jpg',
                'id_jurusan' => '5',
                'jenis_kelamin' => 'l',
            ]);


        DB::table('guru')->insert([
                'nip' => '23097237',
                'nik' => '023227',
                'nama_guru' => 'Mamah kita',
                'jabatan' => 'Guru NA',
                'gambar_guru' => 'user.jpg',
                'jenis_kelamin' => 'p',
            ]);


        DB::table('guru')->insert([
                'nip' => '23742733',
                'nik' => '3292833',
                'nama_guru' => 'Tati Titi',
                'jabatan' => 'Guru Jurusan',
                'gambar_guru' => 'user.jpg',
                'id_jurusan' => '3',
                'jenis_kelamin' => 'p',
            ]);


        DB::table('guru')->insert([
                'nip' => '123456789',
                'nik' => '987654321',
                'nama_guru' => ' John Doe',
                'jabatan' => 'Guru Jurusan',
                'gambar_guru' => 'user.jpg',
                'id_jurusan' => '7',
                'jenis_kelamin' => 'l',
            ]);


        DB::table('guru')->insert([
                'nip' => '234567890',
                'nik' => '876543219',
                'nama_guru' => 'Jane Smith',
                'jabatan' => ' Guru NA',
                'gambar_guru' => 'user.jpg',
                'id_jurusan' => ' 6',
                'jenis_kelamin' => 'p',
            ]);


        DB::table('guru')->insert([
                'nip' => '345678901',
                'nik' => '765432198',
                'nama_guru' => ' Bob Johnson,',
                'jabatan' => 'Guru Jurusan',
                'gambar_guru' => 'user.jpg',
                'id_jurusan' => '3',
                'jenis_kelamin' => 'l',
            ]);


        DB::table('guru')->insert([
                'nip' => '456789012',
                'nik' => '654321987',
                'nama_guru' => 'Alice Brown',
                'jabatan' => ' Guru NA',
                'gambar_guru' => 'user.jpg',
                'id_jurusan' => '9',
                'jenis_kelamin' => 'p',
            ]);


        DB::table('guru')->insert([
                'nip' => '567890123',
                'nik' => '543219876',
                'nama_guru' => 'David White',
                'jabatan' => 'Guru Jurusan',
                'gambar_guru' => 'user.jpg',
                'id_jurusan' => '1',
                'jenis_kelamin' => 'l',
            ]);


        DB::table('guru')->insert([
                'nip' => '678901234',
                'nik' => '432198765',
                'nama_guru' => ' Sarah Lee',
                'jabatan' => 'Guru NA',
                'gambar_guru' => 'user.jpg',
                'id_jurusan' => '8',
                'jenis_kelamin' => 'p',
            ]);


        DB::table('guru')->insert([
            'nip' => '789012345',
            'nik' => '321987654',
            'nama_guru' => 'Michael Davis',
            'jabatan' => 'Guru Jurusan',
            'gambar_guru' => 'user.jpg',
            'id_jurusan' => '1',
            'jenis_kelamin' => 'l',
        ]);


        DB::table('guru')->insert([
                'nip' => '890123456',
                'nik' => '219876543',
                'nama_guru' => ' Jennifer Wilson',
                'jabatan' => 'Guru NA',
                'gambar_guru' => 'user.jpg',
                'id_jurusan' => '5',
                'jenis_kelamin' => 'p',
            ]);


        DB::table('guru')->insert([
                'nip' => '901234567',
                'nik' => '198765432',
                'nama_guru' => 'Richard Miller',
                'jabatan' => 'Guru Jurusan',
                'gambar_guru' => 'user.jpg',
                'id_jurusan' => '7',
                'jenis_kelamin' => 'l',
            ]);


        DB::table('guru')->insert([
                'nip' => '012345678',
                'nik' => '987654321',
                'nama_guru' => ' Lisa Smith',
                'jabatan' => 'Guru NA',
                'gambar_guru' => 'user.jpg',
                'id_jurusan' => '6',
                'jenis_kelamin' => 'p',
            ]);


        DB::table('guru')->insert([
                'nip' => '123450123',
                'nik' => '765432198',
                'nama_guru' => 'Andrew Johnson',
                'jabatan' => 'Guru Jurusan',
                'gambar_guru' => 'user.jpg',
                'id_jurusan' => '3',
                'jenis_kelamin' => 'l',
            ]);


        DB::table('guru')->insert([
                'nip' => '234561234',
                'nik' => '654321987',
                'nama_guru' => 'Mary Brown',
                'jabatan' => ' Guru NA',
                'gambar_guru' => 'user.jpg',
                'id_jurusan' => '9',
                'jenis_kelamin' => 'p',
            ]);


        DB::table('guru')->insert([
                'nip' => '345672345',
                'nik' => '321987654',
                'nama_guru' => 'James White',
                'jabatan' => 'Guru Jurusan',
                'gambar_guru' => 'user.jpg',
                'id_jurusan' => '1',
                'jenis_kelamin' => 'l',
            ]);


        DB::table('guru')->insert([
                'nip' => '456783456',
                'nik' => '432198765',
                'nama_guru' => 'Jessica Lee',
                'jabatan' => 'Guru NA',
                'gambar_guru' => 'user.jpg',
                'id_jurusan' => '8',
                'jenis_kelamin' => 'p',
            ]);


        DB::table('guru')->insert([
                'nip' => '567894567',
                'nik' => '321987654',
                'nama_guru' => 'Daniel Davi',
                'jabatan' => 'Guru Jurusan',
                'gambar_guru' => 'user.jpg',
                'id_jurusan' => '4',
                'jenis_kelamin' => 'l',
            ]);


        DB::table('guru')->insert([
                'nip' => '678905678',
                'nik' => '219876543',
                'nama_guru' => 'Emily Wilson',
                'jabatan' => 'Guru NA',
                'gambar_guru' => 'user.jpg',
                'id_jurusan' => '5',
                'jenis_kelamin' => 'p',
            ]);


        DB::table('guru')->insert([
                'nip' => '789016789',
                'nik' => '198765432',
                'nama_guru' => 'Robert Miller',
                'jabatan' => 'Guru Jurusan',
                'gambar_guru' => 'user.jpg',
                'id_jurusan' => '7',
                'jenis_kelamin' => 'l',
            ]);


        DB::table('guru')->insert([
                'nip' => '890127890',
                'nik' => '987654321',
                'nama_guru' => 'Michelle Smith',
                'jabatan' => 'Guru NA',
                'gambar_guru' => 'user.jpg',
                'id_jurusan' => '6',
                'jenis_kelamin' => 'p',
            ]);


        DB::table('guru')->insert([
                'nip' => '901238901',
                'nik' => '765432198',
                'nama_guru' => 'Christopher Johnson',
                'jabatan' => 'Guru Jurusan',
                'gambar_guru' => 'user.jpg',
                'id_jurusan' => '3',
                'jenis_kelamin' => 'l',
            ]);


        DB::table('guru')->insert([
                'nip' => '012349012',
                'nik' => '654321987',
                'nama_guru' => 'Amanda Brown',
                'jabatan' => 'Guru NA',
                'gambar_guru' => 'user.jpg',
                'id_jurusan' => '9',
                'jenis_kelamin' => 'p',
            ]);


        DB::table('guru')->insert([
            'nip' => '298364223',
            'nik' => '2092732341',
            'nama_guru' => 'Hilmy Ganteng',
            'jabatan' => 'Guru NA',
            'gambar_guru' => 'user.jpg',
            'id_jurusan' => '1',
            'jenis_kelamin' => 'l',
        ]);


        DB::table('guru')->insert([
            'nip' => '293709113',
            'nik' => '203328423',
            'nama_guru' => 'Ahmad Tamvan',
            'jabatan' => 'Guru Jurusan',
            'gambar_guru' => 'user.jpg',
            'id_jurusan' => '1',
            'jenis_kelamin' => 'l',
        ]);
    }
}
