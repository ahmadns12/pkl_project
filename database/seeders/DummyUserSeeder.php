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
                'username'=>'Hubin',
                'role'=>'hubin',
                'angkatan'=>'48',
                'password'=>bcrypt('123456')
            ],
            [
                'username'=>'Kakom',
                'role'=>'kakom',
                'angkatan'=>'48',
                'password'=>bcrypt('123456')
            ],
            [
                'username'=>'Kurikulum',
                'role'=>'kurikulum',
                'angkatan'=>'48',
                'password'=>bcrypt('123456')
            ],
            [
                'username'=>'Goku',
                'role'=>'superadmin',
                'angkatan'=>'48',
                'password'=>bcrypt('123456')
            ],
            [
                'username'=>'Ahmad',
                'role'=>'siswa',
                'angkatan'=>'48',
                'is_choosen'=>'0',
                'password'=>bcrypt('123456')
            ],
            [
                'username'=>'Altria',
                'role'=>'siswa',
                'is_choosen'=>'1',
                'angkatan'=>'48',
                'password'=>bcrypt('123456')
            ],
        ];

        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}
