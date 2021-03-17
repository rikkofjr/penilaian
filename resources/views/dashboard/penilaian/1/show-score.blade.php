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
                <h6 class="m-0 font-weight-bold text-primary">Nilai Kelompok</h6>
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
                Penilaia Kelompok
                @foreach($peserta as $pst)
                <a class="btn btn-primary" href="{{route('isiPenilaian1', [$pelatihan->id,'kelompok'=> $pst->kelompok])}}">{{$pst->kelompok}}</a>
                @endforeach
                <table class="table table-stripped">
                    <tr>
                        <td rowspan="2">No</td>
                        <td rowspan="2">Kelompok</td>
                        <td colspan="5">Nilai</td>
                        <td rowspan="2">Total</td>
                    </tr>
                    <tr>
                        <td>NN</td>
                        <td>ON</td>
                        <td>MBA</td>
                        <td>RKI</td>
                        <td>NM</td>
                    </tr>
                    @foreach($score as $scr)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$scr->kelompok}}</td>
                        <td>{{$scr->total_n1}}</td>
                        <td>{{$scr->total_n1}}</td>
                        <td>{{$scr->total_n2}}</td>
                        <td>{{$scr->total_n3}}</td>
                        <td>{{$scr->total_n4}}</td>
                        <td>{{$scr->total_n5}}</td>
                        <td>{{$scr->total}}</td>                    
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
