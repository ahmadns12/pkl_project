<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SiswaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id_siswa"=> $this->id_siswa,
            "id_guru"=> $this->id_guru,
            "detail" => new SiswaDetailResource($this->siswadetail),
            "id_jurusan"=> $this->id_jurusan,
            "id_angkatan"=> $this->id_angkatan,
            "nis"=> $this->nis,
            "nomor_telepon"=> $this->nomor_telepon,
            "gambar_siswa"=> $this->gambar_siswa,
            "nama_siswa"=> $this->nama_siswa,
            "alamat"=> $this->alamat,
            "jenis_kelamin"=> $this->jenis_kelamin,
            "status"=> $this->status,
            "sudah_memilih"=> $this->sudah_memilih,
        ];
    }
}
