<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PerusahaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('perusahaan')->insert([
            'nama_perusahaan' => 'PT. FateIndustry',
            'deskripsi' => 'Perusahaan ini adalah perusahaan yang sangat bagus dan memiliki citra yang sangat baik sampai jokowi pun berkunjung ke sini',
            'alamat_perusahaan' => 'London',
            'contact_person' => '089723123',
            'gambar_perusahaan' => 'perusahaan1.jpeg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('perusahaan')->insert([
            'nama_perusahaan' => 'PT. FateCompany',
            'deskripsi' => 'Perusahaan ini adalah perusahaan yang sangat bagus dan memiliki citra yang sangat baik sampai prabowo pun berkunjung ke sini',
            'alamat_perusahaan' => 'Japan',
            'contact_person' => '089283718',
            'gambar_perusahaan' => 'peru2.jpeg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);


        DB::table('perusahaan')->insert([
            'nama_perusahaan' => 'PT. Aku bisa',
            'deskripsi' => 'Perusahaan ini adalah perusahaan yang sangat bagus dan memiliki citra yang sangat baik sampai Soeharto pun berkunjung ke sini',
            'alamat_perusahaan' => 'Korea',
            'contact_person' => '028372377',
            'gambar_perusahaan' => 'peru2.jpeg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);


        DB::table('perusahaan')->insert([
            'nama_perusahaan' => 'PT. Paninti',
            'deskripsi' => 'Perusahaan ini adalah perusahaan yang sangat bagus dan memiliki citra yang sangat baik sampai Kepala seklah pun berkunjung ke sini',
            'alamat_perusahaan' => 'Cimahi',
            'contact_person' => '0288326238',
            'gambar_perusahaan' => 'peru2.jpeg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);


        DB::table('perusahaan')->insert([
            'nama_perusahaan' => 'PT. KursiGoyang',
            'deskripsi' => 'Perusahaan ini adalah perusahaan yang sangat bagus dan memiliki Kursi yang sangat indah',
            'alamat_perusahaan' => 'cicau',
            'contact_person' => '086273293',
            'gambar_perusahaan' => 'peru2.jpeg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);


        DB::table('perusahaan')->insert([
            'nama_perusahaan' => 'PT. Selengna',
            'deskripsi' => 'Perusahaan ini adalah perusahaan yang sangat bagus dan memiliki citra yang sangat baik sampai Perusahaan ini top up game terus',
            'alamat_perusahaan' => 'LewiLele',
            'contact_person' =>'083837297',
            'gambar_perusahaan' => 'peru2.jpeg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);


        DB::table('perusahaan')->insert([
            'nama_perusahaan' => 'PT. Kafaru',
            'deskripsi' => 'Perusahaan ini adalah perusahaan yang sangat bagus dan memiliki citra yang sangat baik sampai prabowo pun berkunjung ke sini',
            'alamat_perusahaan' => 'jakarta',
            'contact_person' => '082727168',
            'gambar_perusahaan' => 'peru2.jpeg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);


        DB::table('perusahaan')->insert([
            'nama_perusahaan' => 'PT. Fetorik',
            'deskripsi' => 'Perusahaan ini yang bertempat di kyoto',
            'alamat_perusahaan' => 'Kyoto',
            'contact_person' => '0839764372',
            'gambar_perusahaan' => 'peru2.jpeg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);


        DB::table('perusahaan')->insert([
            'nama_perusahaan' => 'ABC Solutions, Inc.',
            'deskripsi' => 'Perusahaan konsultasi IT yang mengkhususkan diri dalam pengembangan perangkat lunak.',
            'alamat_perusahaan' => 'Alamat: Jl. Pangeran Jayakarta No. 42, Jakarta',
            'contact_person' => '0856732832',
            'gambar_perusahaan' => 'peru2.jpeg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);


        DB::table('perusahaan')->insert([
            'nama_perusahaan' => 'Global Logistics, Ltd.',
            'deskripsi' => 'Layanan logistik global dengan fokus pada impor dan ekspor barang.',
            'alamat_perusahaan' => '55 Dock Road, New York',
            'contact_person' => '02292739',
            'gambar_perusahaan' => 'peru2.jpeg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);


        DB::table('perusahaan')->insert([
            'nama_perusahaan' => 'Nature`s Best Farm',
            'deskripsi' => 'Perusahaan ini adalah perusahaan Pertanian organik yang menghasilkan produk makanan sehat. ',
            'alamat_perusahaan' => ' 789 Farm Lane, San Francisco',
            'contact_person' => '08143536',
            'gambar_perusahaan' => 'peru2.jpeg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);


        DB::table('perusahaan')->insert([
            'nama_perusahaan' => 'Tech Innovators, LLC',
            'deskripsi' => 'Perusahaan ini adalah perusahaan Pengembang aplikasi mobile dan solusi perangkat lunak inovatif',
            'alamat_perusahaan' => '456 Innovation Avenue, Austin',
            'contact_person' => '08678928',
            'gambar_perusahaan' => 'peru2.jpeg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);


        DB::table('perusahaan')->insert([
            'nama_perusahaan' => 'Elite Events Management',
            'deskripsi' => 'Perusahaan ini adalah perusahaan yang Penyelenggara acara kelas atas untuk pesta pernikahan dan acara khusus.',
            'alamat_perusahaan' => '100 Celebration Plaza, Miami',
            'contact_person' => '02382837',
            'gambar_perusahaan' => 'peru2.jpeg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);


        DB::table('perusahaan')->insert([
            'nama_perusahaan' => 'Green Horizons Landscaping',
            'deskripsi' => 'Perusahaan ini adalah perusahaan Jasa desain lanskap dan perawatan taman yang ramah lingkungan.',
            'alamat_perusahaan' => 'Alamat: 567 Meadow Lane, Denver',
            'contact_person' => '086332970',
            'gambar_perusahaan' => 'peru2.jpeg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);


        DB::table('perusahaan')->insert([
            'nama_perusahaan' => 'Mega Motors Corporation',
            'deskripsi' => 'Perusahaan ini adalah perusahaan Dealer mobil terkemuka yang menawarkan berbagai merek mobil.',
            'alamat_perusahaan' => '222 Auto Avenue, Chicago',
            'contact_person' => '0849873264',
            'gambar_perusahaan' => 'peru2.jpeg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);


        DB::table('perusahaan')->insert([
            'nama_perusahaan' => 'SmartTech Solutions',
            'deskripsi' => 'Perusahaan ini adalah perusahaan Penyedia solusi teknologi cerdas untuk bisnis dan rumah.',
            'alamat_perusahaan' => '321 Innovation Road, San Jose',
            'contact_person' => '0893273729',
            'gambar_perusahaan' => 'peru2.jpeg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);


        DB::table('perusahaan')->insert([
            'nama_perusahaan' => 'Ocean Breeze Resorts',
            'deskripsi' => 'Perusahaan ini adalah perusahaan Pengelolaan resor di pantai yang menawarkan liburan santai.',
            'alamat_perusahaan' => '777 Beachfront Drive, Honolulu',
            'contact_person' => '082423523',
            'gambar_perusahaan' => 'peru2.jpeg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('perusahaan')->insert([
            'nama_perusahaan' => 'TechPro Solutions, Inc.',
            'deskripsi' => 'Perusahaan ini adalah perusahaan Perusahaan IT yang menyediakan solusi pengembangan perangkat lunak.',
            'alamat_perusahaan' => '123 Tech Park Avenue, San Francisco',
            'contact_person' => '082365487',
            'gambar_perusahaan' => 'peru2.jpeg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('perusahaan')->insert([
            'nama_perusahaan' => 'EcoGrowth Technologies',
            'deskripsi' => 'Perusahaan ini adalah perusahaan Produsen peralatan energi terbarukan untuk rumah dan bisnis.	',
            'alamat_perusahaan' => '456 Green Street, Los Angeles',
            'contact_person' => '024526738',
            'gambar_perusahaan' => 'peru2.jpeg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);


        DB::table('perusahaan')->insert([
            'nama_perusahaan' => 'Global Logistics Express',
            'deskripsi' => 'Perusahaan ini adalah perusahaan Perusahaan logistik global yang mengkhususkan diri dalam pengiriman kargo internasional.',
            'alamat_perusahaan' => '789 Shipping Lane, New York',
            'contact_person' => '0894596202',
            'gambar_perusahaan' => 'peru2.jpeg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);


        DB::table('perusahaan')->insert([
            'nama_perusahaan' => 'Organic Bliss Farms',
            'deskripsi' => 'Perusahaan ini adalah perusahaan Pertanian organik yang memproduksi makanan organik berkualitas tinggi.',
            'alamat_perusahaan' => '101 Organic Way, Seattle',
            'contact_person' => '0847482',
            'gambar_perusahaan' => 'peru2.jpeg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);


        DB::table('perusahaan')->insert([
            'nama_perusahaan' => 'InnovateTech Labs, LLC',
            'deskripsi' => 'Perusahaan ini adalah perusahaan Pengembang perangkat lunak inovatif dan solusi TI.',
            'alamat_perusahaan' => 'Alamat: 222 Innovation Road, Austin',
            'contact_person' => '0832832',
            'gambar_perusahaan' => 'peru2.jpeg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);


        DB::table('perusahaan')->insert([
            'nama_perusahaan' => 'EventPlanners Unlimited',
            'deskripsi' => 'Perusahaan ini adalah perusahaan Penyelenggara acara profesional untuk berbagai acara khusus.
',
            'alamat_perusahaan' => '333 Celebration Plaza, Chicago',
            'contact_person' => '0892838322',
            'gambar_perusahaan' => 'peru2.jpeg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);


        DB::table('perusahaan')->insert([
            'nama_perusahaan' => 'GreenScapes Landscaping',
            'deskripsi' => 'Perusahaan ini adalah perusahaan Perusahaan jasa lanskap yang mendesain dan merawat taman.',
            'alamat_perusahaan' => '456 Meadow View Drive, Denver',
            'contact_person' => '0227327',
            'gambar_perusahaan' => 'peru2.jpeg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);


        DB::table('perusahaan')->insert([
            'nama_perusahaan' => 'AutoMax Dealerships',
            'deskripsi' => 'Perusahaan ini adalah perusahaan Dealer mobil yang menawarkan berbagai merek dan model mobil.',
            'alamat_perusahaan' => '555 Auto Avenue, Miami',
            'contact_person' => '08386231',
            'gambar_perusahaan' => 'peru2.jpeg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);


        DB::table('perusahaan')->insert([
            'nama_perusahaan' => 'TechGenius Solutions',
            'deskripsi' => 'Perusahaan ini adalah perusahaan Penyedia solusi teknologi dan dukungan TI untuk bisnis.',
            'alamat_perusahaan' => '678 Tech Drive, San Jose',
            'contact_person' => '0893372739',
            'gambar_perusahaan' => 'peru2.jpeg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);


        DB::table('perusahaan')->insert([
            'nama_perusahaan' => 'Beachfront Retreat Resorts	',
            'deskripsi' => 'Perusahaan ini adalah perusahaan Resor mewah di pantai dengan akomodasi yang eksklusif.',
            'alamat_perusahaan' => '987 Beachfront Paradise, Honolulu',
            'contact_person' => '08945234',
            'gambar_perusahaan' => 'peru2.jpeg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);


        DB::table('perusahaan')->insert([
            'nama_perusahaan' => 'EcoVeggie Delights',
            'deskripsi' => 'Perusahaan ini adalah perusahaan Restoran makanan sehat dengan fokus pada makanan nabati.',
            'alamat_perusahaan' => '789 Green Avenue, Portland',
            'contact_person' => '082617812',
            'gambar_perusahaan' => 'peru2.jpeg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);


        DB::table('perusahaan')->insert([
            'nama_perusahaan' => 'DesignCraft Interiors',
            'deskripsi' => 'Perusahaan ini adalah perusahaan Perusahaan desain interior yang menciptakan ruang yang menakjubkan.',
            'alamat_perusahaan' => '345 Design Street, Los Angeles',
            'contact_person' => '08434542',
            'gambar_perusahaan' => 'peru2.jpeg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);


        DB::table('perusahaan')->insert([
            'nama_perusahaan' => 'Sunrise Capital Investments',
            'deskripsi' => 'Perusahaan ini adalah perusahaan Perusahaan investasi yang berfokus pada proyek-proyek real estat.',
            'alamat_perusahaan' => '101 Investment Plaza, Miami',
            'contact_person' => '0883729',
            'gambar_perusahaan' => 'peru2.jpeg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);


        DB::table('perusahaan')->insert([
            'nama_perusahaan' => 'PetCare Plus',
            'deskripsi' => 'Perusahaan ini adalah perusahaan Layanan perawatan hewan peliharaan yang profesional dan ramah.',
            'alamat_perusahaan' => '234 Pet Haven Lane, Boston',
            'contact_person' => '0831813',
            'gambar_perusahaan' => 'peru2.jpeg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);


        DB::table('perusahaan')->insert([
            'nama_perusahaan' => 'SoundWave Studios',
            'deskripsi' => 'Perusahaan ini adalah perusahaan Studio rekaman musik yang menyediakan fasilitas modern.',
            'alamat_perusahaan' => '456 Music Road, Nashville',
            'contact_person' => '081921738',
            'gambar_perusahaan' => 'peru2.jpeg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);


        DB::table('perusahaan')->insert([
            'nama_perusahaan' => 'FashionHub Boutique',
            'deskripsi' => 'Perusahaan ini adalah perusahaan Butik mode dengan koleksi pakaian unik dan gaya.',
            'alamat_perusahaan' => '567 Fashion Avenue, New York',
            'contact_person' => '0832982',
            'gambar_perusahaan' => 'peru2.jpeg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);


        DB::table('perusahaan')->insert([
            'nama_perusahaan' => 'HealthyBites Catering',
            'deskripsi' => 'Perusahaan ini adalah perusahaan Layanan katering makanan sehat untuk acara khusus.',
            'alamat_perusahaan' => '789 Catering Street, San Francisco',
            'contact_person' => '08389273',
            'gambar_perusahaan' => 'peru2.jpeg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);


        DB::table('perusahaan')->insert([
            'nama_perusahaan' => 'ScienceGenius Labs',
            'deskripsi' => 'Perusahaan ini adalah perusahaan Laboratorium penelitian ilmiah yang mengembangkan inovasi.',
            'alamat_perusahaan' => '123 Science Park Road, Boston',
            'contact_person' => '082872982',
            'gambar_perusahaan' => 'peru2.jpeg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);


        DB::table('perusahaan')->insert([
            'nama_perusahaan' => 'FinancialPros Group',
            'deskripsi' => 'Perusahaan ini adalah perusahaan Penyedia jasa keuangan dan perencanaan keuangan.',
            'alamat_perusahaan' => '678 Financial Avenue, Chicago',
            'contact_person' => '080283923',
            'gambar_perusahaan' => 'peru2.jpeg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);


        DB::table('perusahaan')->insert([
            'nama_perusahaan' => 'AdventureQuest Travel',
            'deskripsi' => 'Perusahaan ini adalah perusahaan Agen perjalanan yang menawarkan paket perjalanan petualangan.',
            'alamat_perusahaan' => '555 Adventure Way, Denver',
            'contact_person' => '0892374237',
            'gambar_perusahaan' => 'peru2.jpeg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
