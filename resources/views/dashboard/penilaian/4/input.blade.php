@extends('layouts.dashboard')
@section('Title')
PENILAIAN PARTISIPASI | Pelatihan {{$pelatihan->nama_pelatihan}} Angkatan {{$pelatihan->angkatan}} 
@endsection
@section('Content')
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4 py-3 border-left-primary">
            <div class="card-body">
                PENILAIAN PARTISIPASI | Pelatihan <a href="{{route('pelatihan.show', $pelatihan->id)}}">{{$pelatihan->nama_pelatihan}} Angkatan {{$pelatihan->angkatan}} </a>
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
                {!! Form::open(array('route' => 'penilaian-pribadi4.store','method'=>'POST')) !!}
                {!! Form::hidden('id_pelatihan', $pelatihan->id, array('placeholder' => '','class' => 'form-control')) !!}
                    <div class="form-group">

                    {!! Form::text('nip', $peserta->nip, array('placeholder' => '','class' => 'form-control', 'readonly' => 'readonly')) !!}

                    </div>
                    <div class="form-group">
                        {!! Form::text('nama', $peserta->nama_peserta, array('placeholder' => 'Partisipasi tidak tampak sama sekali','class' => 'form-control', 'disabled' => 'Disabled')) !!}
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="n1" placeholder="Kontribusi Negatif">
                            <option value="" class="label" hidden>Kontribusi Negatif</option>
                            <option value="-1">-1</option>
                            <option value="0">0</option>
                            <option value="-0.1">-0.1</option>
                        </select> 
                        <small>Nilai : -1 s/d -0.1 (gunakan titik "." )</small>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="n2" placeholder="Kontribusi Nol">
                            <option value="" class="label" hidden>Kontribusi Nol</option>
                            <option value="-1">-1</option>
                            <option value="0">0</option>
                            <option value="-0.1">-0.1</option>
                        </select> 
                        <small>Nilai : 0 </small>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="n3" placeholder="Kontribusi Positif">
                            <option value="" class="label" hidden>Kontribusi Positif</option>
                            <option value="0.1">0.1</option>
                            <option value="0.2">0.2</option>
                            <option value="0.3">0.3</option>
                            <option value="0.4">0.4</option>
                            <option value="0.5">0.5</option>
                            <option value="0.6">0.6</option>
                            <option value="0.7">0.7</option>
                            <option value="0.8">0.8</option>
                            <option value="0.9">0.9</option>
                            <option value="1">1</option>
                        </select> 
                        <small>Nilai : 0.1 s/d 1 (gunakan titik "." )</small>
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
