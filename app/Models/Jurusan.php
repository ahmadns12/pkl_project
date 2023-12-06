<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    protected $table = 'jurusan';
    protected $primaryKey = 'id_jurusan';
    public $timestamps = true;

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'id_jurusan');
    }

    public function formulir()
    {
        return $this->hasMany(Formulir::class,'id_jurusan');
    }

    public function guru()
    {
        return $this->hasOne(Guru::class,'id_jurusan');
    }

    public function lowongan()
    {
        return $this->hasOne(Lowongan::class,'id_jurusan');
    }
}
