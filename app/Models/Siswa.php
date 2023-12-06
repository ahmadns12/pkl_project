<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';
    protected $primaryKey = 'id_siswa';
    public $timestamps = true;

    protected $fillable = [
        'nis',
        'nomor_telepon',
        'alamat',
        'sudah_memilih',
    ];

    function siswadetail()
    {
        return $this->belongsTo(Siswadetail::class,'id_siswadetail');
    }

    function user()
    {
        return $this->hasOne(User::class, 'id_siswa');
    }

    function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru');
    }

    function formulir()
    {
        return $this->belongsTo(Formulir::class, 'id_formuir');
    }

    function permintaan()
    {
        return $this->hasMany(Permintaan::class, 'id_siswa');
    }

    function jurusan()
    {
        return $this->belongsTo(Jurusan::class,'id_jurusan');
    }

    public function angkatan()
    {
        return $this->belongsTo(Angkatan::class,'id_angkatan');
    }
}
