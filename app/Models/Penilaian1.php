<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian1 extends Model
{
    use HasFactory;
    //Pemilaian1 = tb_n_kel_produk_naskah (penilaian produk naskah kelompok)
    protected $table='tb_n_kel_produk_naskah';
    protected $fillable = [
        'id_pelatihan',
        'judul_naskah',
        'kelompok',
        'nn',
        'on',
        'mba',
        'rki',
        'nm',
        'total',
        'penilai',
        'keterangan',
    ];
}
