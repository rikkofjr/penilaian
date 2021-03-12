@extends('layouts.dashboard')
@section('Content')
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4 py-3 border-left-primary">
            <div class="card-body">
                PENILAIAN PARTISIPASI PERORANGAN pada Pelatihan {{$pelatihan->nama_pelatihan}}
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Nilai Peserta</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
            
                <table class="table table-stripped">
                    <tr>
                        <td rowspan="2">No</td>
                        <td rowspan="2">Nama Pelaku</td>
                        <td rowspan="2">NRP</td>
                        <td rowspan="2">Jabatan</td>
                        <td colspan="6">Nilai Partisipasi</td>
                        <td rowspan="2">act</td>
                    </tr>
                    <tr>
                        <td>Nilai 1</td>
                        <td>Nilai 2</td>
                        <td>Nilai 3</td>
                        <td>Nilai 4</td>
                        <td>Nilai 5</td>
                        <td>Total</td>
                    </tr>
                    @foreach($peserta as $pst)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td><a href="{{route('beriPenilaian4', ['id_pelatihan' => $pst->id_pelatihan, 'nip' => $pst->nip] )}}">{{$pst->nip}}</a></td>
                        <td>{{$pst->nip}}</td>
                        <td>jabatan</td>
                        <td>{{$pst->n1}}</td>
                        <td>{{$pst->n2}}</td>
                        <td>{{$pst->n3}}</td>
                        <td>{{$pst->n4}}</td>
                        <td>{{$pst->n5}}</td>
                        <td>50</td>
                        <td>edit</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
