<?php

namespace App\Imports;

use App\Models\Peserta;
use App\Models\Penilaian3;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PesertaImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Peserta([
            'nip' => $row['nip'],
            'nama_peserta' => $row['nama_peserta'], 
            'kelompok' => $row['kelompok'], 
            'id_pelatihan' => $row['id_pelatihan'], 
        ]);
    }
}
