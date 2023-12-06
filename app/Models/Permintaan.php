<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permintaan extends Model
{
    use HasFactory;

    protected $table = 'permintaan';
    protected $primaryKey = 'id_permintaan';
    public $timestamps = true;

    protected $fillable = [
        'id_siswa',
        'id_lowongan',
        'approve'
    ];

    function lowongan()
    {
        return $this->belongsTo(Lowongan::class, 'id_lowongan');
    }

    function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }
}
