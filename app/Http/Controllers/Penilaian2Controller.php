<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Auth & role permission
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Auth;

use App\Imports\PesertaImport;
use Maatwebsite\Excel\Facades\Excel;
use DB;
//model data
use App\Models\Pelatihan;
use App\Models\Peserta;
use App\Models\Penilaian1;
use App\Models\Penilaian2;

class Penilaian2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        ];
        $this->validate($request,[
            'kelompok' => 'required',
        ],$messages);
        $total = $request->pp + $request->pm + $request->ep + $request->khp;
        $input = new Penilaian2;
        $input->id_pelatihan = $request->id_pelatihan;
        $input->kelompok = $request->kelompok;
        $input->tanggal = \Carbon\Carbon::now();
        $input->n1 = $request->pp;
        $input->n2 = $request->pm;
        $input->n3 = $request->ep;
        $input->n4 = $request->khp;
        $input->total = $total;
        $input->keterangan = $request->keterangan;
        $input->penilai = Auth::user()->id;
        $input->save();

        return redirect()->route('penilaian-naskah2.show', $input->id_pelatihan);
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
        ->get();

        $score = Penilaian1::select('kelompok', 
        DB::raw('sum(n1) as total_n1'), 
        DB::raw('sum(n2) as total_n2'),
        DB::raw('sum(n3) as total_n3'),
        DB::raw('sum(n4) as total_n4'))
        ->groupBy('kelompok')
        ->groupBy('id_pelatihan')
        ->where('id_pelatihan', $id)
        ->orderBy('kelompok')
        ->get();
        //dd($peserta);
        return view('dashboard.penilaian.2.show-score', compact('pelatihan', 'peserta','score'));
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
    public function isi_penilaian2($id, $kelompok){
        $pelatihan = Pelatihan::where('id', $id)->first();
        //chek apa kah sudah ngisi
        $chek_penilaian2 = Penilaian2::where('id_pelatihan', $id)->where('kelompok', $kelompok)->where('penilai', Auth::user()->id)->get();
        //dd($pelatihan);
        if(count($chek_penilaian2) >= 1){
            return redirect()->route('errorPenilaian');
        }else{
            return view('dashboard.penilaian.2.create',compact('pelatihan', 'kelompok'));
        }   
    }
}
