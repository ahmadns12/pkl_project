<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formulir extends Model
{
    use HasFactory;

    protected $table = 'formulir';
    protected $primaryKey = 'id_formulir';
    public $timestamps = true;

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'id_formulir');
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class,'id_jurusan');
    }
    
    public function lowongan()
    {
        return $this->belongsTo(Lowongan::class, 'id_lowongan');
    }
}
