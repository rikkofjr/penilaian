@extends('layouts.dashboard')
@section('Title')
PENILAIAN PARTISIPASI PERORANGAN pada Pelatihan {{$pelatihan->nama_pelatihan}}
@endsection
@section('Content')
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4 py-3 border-left-primary">
            <div class="card-body">
                PENILAIAN PARTISIPASI PERORANGAN pada Pelatihan <a href="{{route('pelatihan.show', $pelatihan->id)}}">{{$pelatihan->nama_pelatihan}}</a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Nilai Peserta</h6>
            </div>
            <div class="card-body table-responsive">
                <ul class="nav nav-tabs nav-fill mb-3" id="tab" role="tablist">
                    <li class="nav-item" role="">
                        <a href="#t1" class="nav-link active" data-toggle="tab" role="tab">Data Peserta</a>
                    </li>
                    <li class="nav-item" role="">
                        <a href="#t2" class="nav-link" data-toggle="tab" role="tab">Nilai</a>
                    </li>
                </ul>
                <div class="tab-content table-responsive" id="tabContent">
                    <div class="tab-pane fade show active" id="t1" role="tabpanel">
                        <!-- Table peserta-->
                        <table class="table table-striped">
                            <tr>
                                <td>No</td>
                                <td>NIP</td>
                                <td>Nama</td>
                                <td>Kelompok</td>
                            </tr>
                            @foreach($peserta as $pstx)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td><a href="{{route('beriPenilaian4', ['id_pelatihan' => $pstx->id_pelatihan, 'nip' => $pstx->nip])}}">{{$pstx->nip}}</a></td>
                                <td>{{$pstx->nama_peserta}}</td>
                                <td>{{$pstx->kelompok}}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="tab-pane fade" id="t2" role="tabpanel">
                        <!-- Table Nilai-->
                        <table class="table table-stripped">
                            <tr>
                                <td rowspan="2">No</td>
                                <td rowspan="2">NIP</td>
                                <td rowspan="2">Nama</td>
                                <td rowspan="2">Jabatan</td>
                                <td colspan="6" style="text-align:center;">Nilai Partisipasi</td>
                            </tr>
                            <tr>
                                <td>Nilai 1</td>
                                <td>Nilai 2</td>
                                <td>Nilai 3</td>
                                <td>Total</td>
                            </tr>
                            @foreach($nilaiPeserta as $pst)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$pst->nip}}</td>
                                <td>{{$pst->peserta->nama_peserta}}</td>
                                <td>jabatan</td>
                                <td>{{$pst->total_n1}}</td>
                                <td>{{$pst->total_n2}}</td>
                                <td>{{$pst->total_n3}}</td>
                                <td>{{$pst->total_n1 + $pst->total_n2 + $pst->total_n3 }}
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
