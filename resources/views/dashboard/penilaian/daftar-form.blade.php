@extends('layouts.dashboard')
@section('Content')
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4 py-3 border-left-primary">
            <div class="card-body">
                Formulir Pelatihan {{$pelatihan->nama_pelatihan}} Angkatan {{$pelatihan->angkatan}}
                {{$pelatihan}}
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <h2>Penilaian Kelompok</h2>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="card shadow">
            <div class="card-body p-5" style="text-align:center;">
                <i class="fas fa fa-file fa-5x" style="color:#ccc;"></i><br/><br/>
                <a href="{{route('penilaian-naskah1.show', $pelatihan->id)}}"><h3>LEMBAR PENILAIAN PRODUK NASKAH KELOMPOK </h3></a>
            </div>        
        </div>
    </div>
    <div class="col-6">
        <div class="card shadow">
            <div class="card-body p-5" style="text-align:center;">
                <i class="fas fa fa-chalkboard-teacher fa-5x" style="color:#ccc;"></i><br/><br/>
                <h3> <a href="{{route('penilaian-naskah2.show', $pelatihan->id)}}">LEMBAR PENILAIAN PAPARAN KELOMPOK</a></h3>
            </div>        
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <h2>Penilaian Individu</h2>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="card shadow">
            <div class="card-body p-5" style="text-align:center;">
                <i class="fas fa fa-users fa-5x" style="color:#ccc;"></i><br/><br/>
                <a href="{{route('pesertaPenilaian3', $pelatihan->id)}}"><h3>LEMBAR PENILAIAN PARTISIPASI PERORANGAN</h3></a>
            </div>        
        </div>
    </div>
    <div class="col-6">
        <div class="card shadow">
            <div class="card-body p-5" style="text-align:center;">
                <i class="fas fa fa-user fa-5x" style="color:#ccc;"></i><br/><br/>
                <h3> <a href="{{route('pesertaPenilaian4', $pelatihan->id)}}">LEMBAR PENILAIAN KEPRIBADIAN PERORANGAN</a></h3>
            </div>        
        </div>
    </div>
</div>
    

@endsection
