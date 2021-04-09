<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Peserta;

class Penilaian3 extends Model
{
    use HasFactory;
    protected $table = 'tb_n_org_partisipasi';
    protected $fillable = [
        'nip', 
        'id_pelatihan',
        'nama',
        'jabatan',
        'n1',
        'n2',
        'n3',
        'n4',
        'n5',
        'total',
    ];

    public function peserta(){
        return $this->belongsTo('App\Models\Peserta', 'nip', 'nip');
        
    }
}
