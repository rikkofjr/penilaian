<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Auth & role permission
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Auth;

//model data
use App\Models\Pelatihan;
use App\Models\Peserta;

//plugin

class PelatihanController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('permission:training-create', ['only' => ['create', 'store']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelatihan = Pelatihan::orderBy('id', 'DESC')->get();
        return view('dashboard.pelatihan.index', compact('pelatihan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pelatihan.create');
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
            'nama_pelatihan.required' => 'Nama Pelatihan Wajid Diisi',
            'angkatan.required' => 'Angkatan pelatihan harap diisi',
        ];
        $this->validate($request,[
            'nama_pelatihan' => 'required',
            'angkatan' => 'required',
        ],$messages);
        $input = new Pelatihan;
        $input->nama_pelatihan = $request->nama_pelatihan;
        $input->angkatan = $request->angkatan;
        $input->deskripsi = $request->deskripsi;
        $input->creator = Auth::user()->id;
        $input->save();

        return redirect()->route('pelatihan.show', $input->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pelatihan = Pelatihan::findOrFail($id);
        $peserta_pelatihan = Peserta::where('id_pelatihan', $id)->get();
        //dd($peserta_pelatihan);
        return view('dashboard.pelatihan.show', compact('pelatihan', 'peserta_pelatihan'));
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
    
}
