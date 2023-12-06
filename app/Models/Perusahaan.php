<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    use HasFactory;

    protected $table = 'perusahaan';
    protected $primaryKey = 'id_perusahaan';
    public $timestamps = true;

    protected $fillable = [
        'nama_perusahaan',
        'deskripsi',
        'alamat_perusahaan',
        'contact_person',
        'gambar_perusahaan',
    ];

    public function lowongan()
    {
        return $this->hasMany(Lowongan::class, 'id_perusahaan');
    }
}
