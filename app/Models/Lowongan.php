<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lowongan extends Model
{
    use HasFactory;

    protected $table = 'lowongan';
    protected $primaryKey = 'id_lowongan';
    public $timestamps = true;

    protected $fillable = [
        'id_perusahaan',
        'id_angkatan',
        'jumlah_siswa',
        'jurusan',
        'posisi',
        'tanggal_mulai',
        'tanggal_selesai',
    ];

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class, 'id_perusahaan');
    }

    public function permintaan()
    {
        return $this->hasMany(Permintaan::class, 'id_lowongan');
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class,'id_jurusan');
    }

    public function formulir()
    {
        return $this->hasOne(Formulir::class,'id_lowongan');
    }

    public function angkatan()
    {
        return $this->belongsTo(Angkatan::class,'id_angkatan');
    }

}
