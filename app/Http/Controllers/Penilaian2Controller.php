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
        $input->pp = $request->pp;
        $input->pm = $request->pm;
        $input->ep = $request->ep;
        $input->khp = $request->khp;
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
    public function isi_penilaian2($id){
        $pelatihan = Pelatihan::where('id', $id)->first();
        //dd($pelatihan);
        return view('dashboard.penilaian.2.create',compact('pelatihan'));
    }
}
