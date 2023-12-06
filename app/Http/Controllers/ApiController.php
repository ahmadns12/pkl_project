<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use App\Models\Panduan;
use App\Models\Permintaan;
use App\Models\Perusahaan;
use App\Models\Siswa;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    function getLowongan($id=null){
        return $id?Lowongan::find($id):Lowongan::all();
    }

    function storePerusahaan(Request $request){
        $perusahaan = new Perusahaan;
        $perusahaan->nama_perusahaan = $request->nama_perusahaan;
        $perusahaan->deskripsi = $request->deskripsi;
        $perusahaan->alamat_perusahaan = $request->alamat_perusahaan;
        $perusahaan->contact_person = $request->contact_person;
        $perusahaan->jurusan = $request->jurusan;
        $perusahaan->gambar_perusahaan = 'peru2.jpeg';
        $result=$perusahaan->save();
        if($result){
            return redirect('/admin/kakom/daftarperusahaan')->with('store', 'Data perusahaan berhasil ditambahkan!');
        }
        else{
            return ["Result"=>"Operation failed"];
        }
    }

    function doc(){
        return Panduan::all();
    }

    public function docPreview($file_name) {
        $file_path = public_path('doc/'.$file_name);
    
        if (file_exists($file_path)) {
            return response()->file($file_path);
        } else {
            return response()->json(['message' => 'Failed'], 404);
        }
    }

    public function gambarPerusahaan($file_name) {
        $file_path = public_path('img/perusahaan/'.$file_name);
    
        if (file_exists($file_path)) {
            return response()->file($file_path);
        } else {
            return response()->json(['message' => 'Failed'], 404);
        }
    }

    public function gambarSiswa($file_name) {
        $file_path = public_path('img/siswa/'.$file_name);
    
        if (file_exists($file_path)) {
            return response()->file($file_path);
        } else {
            return response()->json(['message' => 'Failed'], 404);
        }
    }

    public function updateSiswa(Request $request, $id_siswa)
    {
        try {
            $siswa = Siswa::find($id_siswa);

            if (!$siswa) {
                return response()->json(['message' => 'Siswa not found'], 404);
            }

            $siswa->update($request->all());

            return response()->json(['message' => 'Siswa updated successfully']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error updating siswa', 'error' => $e->getMessage()], 500);
        }
    }

    public function ajukanLowongan(Request $request)
    {
        try {
            // Validasi data yang diterima
            $validatedData = $request->validate([
                'id_siswa' => 'required',
                'id_lowongan' => 'required',
                'approve' => 'required',
                // Tambahkan validasi untuk setiap field yang diperlukan
            ]);

            // Buat objek Permintaan dan isi dengan data yang divalidasi
            $permintaan = Permintaan::create($validatedData);

            return response()->json(['message' => 'Permintaan telah berhasil ditambahkan!', 'data' => $permintaan]);
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            return response()->json(['message' => 'Terjadi kesalahan saat menambahkan permintaan', 'error' => $e->getMessage()], 500);
        }
    }
}
