<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Auth & role permission
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Auth;

use App\Imports\PesertaImport;
use Maatwebsite\Excel\Facades\Excel;
//model data
use App\Models\Pelatihan;
use App\Models\Peserta;
use App\Models\Penilaian1; //PRODUK NASKAH KELOMPOK
use App\Models\Penilaian2; //PAPARAN KELOMPOK
use App\Models\Penilaian3; //PARTISIPASI PERORANGAN
use App\Models\Penilaian4; //KEPRIBADIAN PERORANGAN

class PenilaianController extends Controller
{
    //halaman penilaian digunakan sebagai halamam untuk menuju daftar formulir penilaian
    public function halaman_penilaian($id){
        $pelatihan = Pelatihan::where('id', $id)->first();
        return view('dashboard.penilaian.daftar-form', compact('pelatihan'));
    }
}
