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
use App\Models\Penilaian3;

use DB;

class Penilaian3Controller extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'required' => 'nilai Wajid Diisi',
        ];
        $this->validate($request,[
            'n1' => 'required',
            'n2' => 'required',
            'n3' => 'required',
            'n4' => 'required',
            'n5' => 'required',
        ],$messages);
        $total = $request->n1 + $request->n2 + $request->n3 + $request->n4 + $request->n5;
        $input = new Penilaian3;
        $input->id_pelatihan = $request->id_pelatihan;
        $input->nip = $request->nip;
        $input->n1 = $request->n1;
        $input->n2 = $request->n2;
        $input->n3 = $request->n3;
        $input->n4 = $request->n4;
        $input->n5 = $request->n5;
        $input->total = $total;
        $input->penilai = Auth::user()->id;
        $input->save();

        return redirect()->route('pesertaPenilaian3', $input->id_pelatihan);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function semua_peserta($id){
        $pelatihan = Pelatihan::where('id', $id)->first();
        $peserta = Peserta::where('id_pelatihan', $id)->orderBy('nip')->get();
        $nilaiPeserta = Penilaian3::select('nip', 
        DB::raw('sum(n1) as total_n1'), 
        DB::raw('sum(n2) as total_n2'),
        DB::raw('sum(n3) as total_n3'),
        DB::raw('sum(n4) as total_n4'),
        DB::raw('sum(n5) as total_n5'))
        ->groupBy('nip')
        ->groupBy('id_pelatihan')
        ->where('id_pelatihan', $id)
        ->orderBy('nip')
        ->get();
        
        // $pesertanya = Peserta::with('nilai3')->groupBy('pelatihan_id')
        // ->selectRaw('* , sum(nilai3.n1) as total_n1')
        // ->get();
                //$pesertanya = $peserta->nilai3->groupBy('id_pelatihan');
        //$nilai_peserta = Penilaian3::where('id_pelatihan', $id)->where('penilai', Auth::user()->id)->get();

        

        //dd($peserta);
        return view('dashboard.penilaian.3.index',compact('pelatihan', 'peserta','nilaiPeserta'));
    }
    public function input_nilai($id_pelatihan, $nip){
        $pelatihan = Pelatihan::where('id', $id_pelatihan)->first();
        $peserta = Peserta::where('nip', $nip)->first();
        $nilai_peserta = Penilaian3::where('nip', $nip)->where('id_pelatihan', $id_pelatihan)->first();

        $cek_penilai = Penilaian3::where('nip', $nip)->where('id_pelatihan', $id_pelatihan)->where('penilai', Auth::user()->id)->get();
        if(count($cek_penilai) >= 1){
            return redirect()->route('errorPenilaian');
        }else{
            return view('dashboard.penilaian.3.input',compact('pelatihan', 'peserta', 'nilai_peserta'));
        }
    }
}
