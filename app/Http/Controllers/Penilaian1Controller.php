<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Auth & role permission
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Auth;

use DB;
use App\Imports\PesertaImport;
use Maatwebsite\Excel\Facades\Excel;
//model data
use App\Models\Pelatihan;
use App\Models\Peserta;
use App\Models\Penilaian1;

class Penilaian1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'kelompok.required' => 'Kelompok Wajid Diisi',
            'judul_naskah.required' => 'Judul Naskah harap diisi',
        ];
        $this->validate($request,[
            'kelompok' => 'required',
            'judul_naskah' => 'required',
        ],$messages);
        $total = (($request->nn*1)+($request->on*2)+($request->mba*3)+($request->rki*3)+($request->nm*1))/10;
        $input = new Penilaian1;
        $input->id_pelatihan = $request->id_pelatihan;
        $input->kelompok = $request->kelompok;
        $input->judul_naskah = $request->judul_naskah;
        $input->n1 = $request->nn;
        $input->n2 = $request->on;
        $input->n3 = $request->mba;
        $input->n4 = $request->rki;
        $input->n5 = $request->nm;
        $input->total = $total;
        $input->keterangan = $request->keterangan;
        $input->penilai = Auth::user()->id;
        $input->save();

        return redirect()->route('pelatihan.show', $input->id_pelatihan);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pelatihan = Pelatihan::where('id', $id)->first();
        //$peserta = Peserta::where('id_pelatihan', $id)->get()->groupBy('kelompok');
        $peserta = Peserta::select('kelompok', DB::raw('count(*) as total'))
        ->groupBy('kelompok')
        ->where('id_pelatihan', $id)
        ->orderBy('kelompok')
        ->get();

        $score = Penilaian1::select('kelompok', 
        DB::raw('sum(n1) as total_n1'), 
        DB::raw('sum(n2) as total_n2'),
        DB::raw('sum(n3) as total_n3'),
        DB::raw('sum(n4) as total_n4'),
        DB::raw('sum(n5) as total_n5'))
        ->groupBy('kelompok')
        ->groupBy('id_pelatihan')
        ->where('id_pelatihan', $id)
        ->orderBy('kelompok')
        ->get();

        //dd($score);
        return view('dashboard.penilaian.1.show-score', compact('pelatihan', 'peserta', 'score'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function isi_penilaian1($id, $kelompok){
        $pelatihan = Pelatihan::where('id', $id)->first();
        //chek apa kah sudah ngisi
        $chek_penilaian1 = Penilaian1::where('id_pelatihan', $id)->where('kelompok', $kelompok)->where('penilai', Auth::user()->id)->get();
        //dd($pelatihan);
        if(count($chek_penilaian1) >= 1){
            return redirect()->route('errorPenilaian');
        }else{
            return view('dashboard.penilaian.1.create',compact('pelatihan', 'kelompok'));
        }
        
    }

}
