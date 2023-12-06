<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $table = 'historylogin';
    protected $primaryKey = 'id_historylogin';
    public $timestamps = true;

    protected $fillable = [
        'id',
    ];

    function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
