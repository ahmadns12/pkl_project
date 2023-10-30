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

    public function perusahaan()
    {
        return $this->hasOne(Perusahaan::class, 'id_perusahaan');
    }
}
