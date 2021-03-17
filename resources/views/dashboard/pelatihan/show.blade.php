@extends('layouts.dashboard')
@section('Content')
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4 py-3 border-left-primary">
            <div class="card-body">
                Data pesereta pada pelatihan <b>{{$pelatihan->nama_pelatihan}}</b> Angkatan {{$pelatihan->angkatan}} Tahun {{$pelatihan->created_at->format('Y')}}
                <br/><b>ID Pelatihan : {{$pelatihan->id}}</b>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">List Peserta</h6>
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
            <button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#importExcel">
               IMPORT Peserta EXCEL
            </button>
            <a href="{{route('formulirPenilaian', $pelatihan->id)}}" class="btn btn-success mr-5">Formulir Penilaian</a>
            <br/><br/>
            @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-success">
                                    {{ session('error') }}
                                </div>
                            @endif
                <table class="table table-striped">
                    <tr>
                        <td>No</td>
                        <td>NIM</td>
                        <td>Nama Peserta</td>
                        <td>Kelompok</td>
                    </tr>
                    @foreach($peserta_pelatihan as $peserta)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$peserta->nip}}</td>
                        <td>{{$peserta->nama_peserta}}</td>
                        <td>{{$peserta->kelompok}}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Import Excel -->
<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog" role="document">
 <form method="post" action="{{route('importPesertaPelatihan')}}" enctype="multipart/form-data">
 <div class="modal-content">
 <div class="modal-header">
 <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
 </div>
 <div class="modal-body">
 
 {{ csrf_field() }}
 
 <label>Pilih file excel</label>
 <div class="form-group">
 <input type="file" name="file" required="required">
 </div>
 
 </div>
 <div class="modal-footer">
 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
 <button type="submit" class="btn btn-primary">Import</button>
 </div>
 </div>
 </form>
 </div>
 </div>

@endsection
