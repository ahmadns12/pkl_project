<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'guru';
    protected $primaryKey = 'id_guru';
    public $timestamps = true;

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'id_guru');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id_guru');
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class,'id_jurusan');
    }
}
