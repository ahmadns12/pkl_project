<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LowonganResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id_lowongan"=> $this->id_lowongan,
            "jumlah_siswa"=> $this->jumlah_siswa,
            "posisi"=> $this->posisi,
            "tanggal_mulai"=> $this->tanggal_mulai,
            "tanggal_selesai"=> $this->tanggal_selesai,
            "jurusan" => new JurusanResource($this->jurusan),
            "perusahaan"=> new PerusahaanResource($this->perusahaan),
        ];
    }
}
