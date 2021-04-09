<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian4 extends Model
{
    use HasFactory;

    protected $table = 'tb_n_org_pribadi';
    protected $fillable = [
        'nip', 
        'id_pelatihan',
        'nama',
        'jabatan',
        'n1',
        'n2',
        'n3',
        'total',
        'keterangan',
    ];
    public function peserta(){
        return $this->belongsTo('App\Models\Peserta', 'nip', 'nip');
        
    }
}
