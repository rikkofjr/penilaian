@extends('layouts.dashboard')
@section('Content')
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4 py-3 border-left-primary">
            <div class="card-body">
                Data pesereta pada pelatihan {{$pelatihan->nama_pelatihan}} Angkatan {{$pelatihan->angkatan}} Tahun {{$pelatihan->created_at->format('Y')}}
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Form Penilaian</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Aksi:</div>
                        <a class="dropdown-item" href="#">Tambah Data Peserta</a>
                        <a class="dropdown-item" href="#">Beri Penilaian</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
            <table border="1" class="table">
                    <tr>
                        <td>No</td>
                        <td>NIM</td>
                        <td>Nama Peserta</td>
                        <td>Kelompok</td>
                    </tr>
                    <tr>
                        <td>No</td>
                        <td>09000</td>
                        <td>Bambang</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>No</td>
                        <td>09001</td>
                        <td>Sutoyo</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>No</td>
                        <td>09010</td>
                        <td>Samsudin</td>
                        <td>3</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
