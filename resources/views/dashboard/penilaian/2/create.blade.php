@extends('layouts.dashboard')
@section('Content')
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4 py-3 border-left-primary">
            <div class="card-body">
                PENILAIAN PRODUK NASKAH KELOMPOK | Pelatihan {{$pelatihan->nama_pelatihan}} Angkatan {{$pelatihan->angkatan}} 
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">PENILAIAN PRODUK NASKAH KELOMPOK</h6>
            </div>
            <div class="card-body table-responsive">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {!! Form::open(array('route' => 'penilaian-naskah2.store','method'=>'POST')) !!}
                    <div class="form-group">
                        {!! Form::hidden('id_pelatihan', $pelatihan->id, array('placeholder' => '','class' => 'form-control')) !!}
                        {!! Form::number('kelompok', $pelatihan->kelompok, array('placeholder' => 'Kelompok','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::text('pp', null, array('placeholder' => 'Nilai Penampilan Pribadi','class' => 'form-control')) !!}
                        <small>Nilai maksimal 25</small>
                    </div>
                    <div class="form-group">
                        {!! Form::text('pm', null, array('placeholder' => 'Nilai Penguasaan Materi','class' => 'form-control')) !!}
                        <small>Nilai maksimal 25</small>
                    </div>
                    <div class="form-group">
                        {!! Form::text('ep', null, array('placeholder' => 'Nilai Efektifitas Penyajian','class' => 'form-control')) !!}
                        <small>Nilai maksimal 25</small>
                    </div>
                    <div class="form-group">
                        {!! Form::text('khp', null, array('placeholder' => 'Nilai Kesiapan Hadapi  Tanggapan','class' => 'form-control')) !!}
                        <small>Nilai maksimal 25</small>
                    </div>
                    <div class="form-group">
                    {!! form::textarea('keterangan', null, array('placeholder' => 'Keskripsi','class' => 'form-control')) !!}
                    </div>
                    {{ Form::submit('Tambah Data', array('class' => 'btn btn-primary')) }}

                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>

@endsection
