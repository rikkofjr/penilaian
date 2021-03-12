<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'tb_peserta_pelatihan';
    protected $fillable = ['nip', 'nama_peserta', 'kelompok', 'id_pelatihan'];
    
    public function nilai3(){
     return $this->hasOne('App\Models\Penilaian3', 'nip');
    }
}
