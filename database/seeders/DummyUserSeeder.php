<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'email'=>'Hubin@gmail.com',
                'id_guru' => '12',
                'role'=>'hubin',
                'angkatan'=>'48',
                'password'=>bcrypt('123456')
            ],
            [
                'email'=>'Kakom@gmail.com',
                'role'=>'kakom',
                'id_guru' => '13',
                'angkatan'=>'48',
                'password'=>bcrypt('123456')
            ],
            [
                'email'=>'Kurikulum@gmail.com',
                'nama_kurikulum'=>'Suisei',
                'role'=>'kurikulum',
                'angkatan'=>'48',
                'password'=>bcrypt('123456')
            ],
            [
                'email'=>'Goku@gmail.com',
                'role'=>'superadmin',
                'angkatan'=>'48',
                'password'=>bcrypt('123456')
            ],
            [
                'email'=>'Ahmad@gmail.com',
                'role'=>'siswa',
                'id_siswa'=>'1',
                'angkatan'=>'48',
                'password'=>bcrypt('123456')
            ],
            [
                'email'=>'Altria@gmail.com',
                'role'=>'siswa',
                'id_siswa'=>'2',
                'angkatan'=>'48',
                'password'=>bcrypt('123456')
            ],
            [
                'email'=>'Sensei@gmail.com',
                'role'=>'pembimbing',
                'id_guru'=>'1',
                'angkatan'=>'48',
                'password'=>bcrypt('123456')
            ],
        ];

        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}
