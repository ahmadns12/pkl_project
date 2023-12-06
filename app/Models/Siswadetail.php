<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswadetail extends Model
{
    use HasFactory;
    protected $table = 'siswadetail';
    protected $primaryKey = 'id_siswadetail';
    public $timestamps = true;

    public function siswa()
    {
        return $this->hasOne(Siswa::class,'id_siswadetail');
    }
}
