<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian2 extends Model
{
    use HasFactory;
    protected $table = 'tb_n_kel_paparan';
    protected $fillable = [
        'id_pelatihan',
        'tanggal',
        'kelompok',
        'pp',
        'pm',
        'ep',
        'khp',
        'total',
        'penilai',
        'keterangan',
    ];
}
