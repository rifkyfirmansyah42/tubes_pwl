<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daftar extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal_daftar',
        'pasien_id',
        'poli',
        'keluhan',
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }
}

