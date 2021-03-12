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
            'kelompok.required' => 'Nama Pelatihan Wajid Diisi',
            'judul_naskah.required' => 'Angkatan pelatihan harap diisi',
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
        $input->nn = $request->nn;
        $input->on = $request->on;
        $input->mba = $request->mba;
        $input->rki = $request->rki;
        $input->nm = $request->nm;
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
    public function isi_penilaian1($id){
        $pelatihan = Pelatihan::where('id', $id)->first();
        //dd($pelatihan);
        return view('dashboard.penilaian.1.create',compact('pelatihan'));
    }

}
