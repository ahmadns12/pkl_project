<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            DummyUserSeeder::class,
            PerusahaanSeeder::class,
            SiswaSeeder::class,
            GuruSeeder::class,
            AngkatanSeeder::class,
            JurusanSeeder::class,
            LowonganSeeder::class,
            SiswaDetailSeeder::class,
            PanduanSeeder::class,
        ]);
    }
}
