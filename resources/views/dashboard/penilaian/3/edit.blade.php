@extends('layouts.dashboard')
@section('Content')
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4 py-3 border-left-primary">
            <div class="card-body">
                PENILAIAN PARTISIPASI | Pelatihan {{$pelatihan->nama_pelatihan}} Angkatan {{$pelatihan->angkatan}} 
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">PENILAIAN PARTISIPASI</h6>
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
                {!! Form::open(array('route' => 'penilaian-naskah3.store','method'=>'POST')) !!}
                {!! Form::hidden('id_pelatihan', $pelatihan->id, array('placeholder' => '','class' => 'form-control')) !!}
                    <div class="form-group">
                    {!! Form::text('nip', $peserta->nip, array('placeholder' => '','class' => 'form-control', 'readonly' => 'readonly')) !!}

                    </div>
                    <div class="form-group">
                        {!! Form::text('nama', $peserta->nama_peserta, array('placeholder' => 'Partisipasi tidak tampak sama sekali','class' => 'form-control', 'disabled' => 'Disabled')) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::number('n1', $nilai_peserta->n1, array('placeholder' => 'Partisipasi tidak tampak sama sekali','class' => 'form-control')) !!}
                        <small>Nilai : -8 s/d -10</small>
                    </div>
                    <div class="form-group">
                        {!! Form::number('n2', $nilai_peserta->n2, array('placeholder' => 'Partisipasi kecil','class' => 'form-control')) !!}
                        <small>Nilai : -4 s/d -7</small>
                    </div>
                    <div class="form-group">
                        {!! Form::number('n3', $nilai_peserta->n3, array('placeholder' => 'Partisipasi sedang','class' => 'form-control')) !!}
                        <small>Nilai : 0 s/d 3</small>
                    </div>
                    <div class="form-group">
                        {!! Form::number('n4', $nilai_peserta->n4, array('placeholder' => 'Partisipasi cukup positif','class' => 'form-control')) !!}
                        <small>Nilai : 4 s/d 7</small>
                    </div>
                    <div class="form-group">
                        {!! Form::number('n5', $nilai_peserta->n5, array('placeholder' => 'Partisipasi sangat menonjol','class' => 'form-control')) !!}
                        <small>Nilai : 8 s/d 10</small>
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
