<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PerusahaanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id_perusahaan"=> $this->id_perusahaan,
            "nama_perusahaan"=> $this->nama_perusahaan,
            "deskripsi"=> $this->deskripsi,
            "alamat_perusahaan"=> $this->alamat_perusahaan,
            "contact_person"=> $this->contact_person,
            "gambar_perusahaan"=> $this->gambar_perusahaan,
        ];
       
    }
}
