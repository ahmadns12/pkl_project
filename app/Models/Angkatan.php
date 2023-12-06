<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Angkatan extends Model
{
    use HasFactory;

    protected $table = 'angkatan';
    protected $primaryKey = 'id_angkatan';
    public $timestamps = true;

    public function lowongan()
    {
        return $this->hasMany(Lowongan::class,'id_angkatan');
    }

    public function siswa()
    {
        return $this->hasMany(Siswa::class,'id_angkatan');
    }
}
