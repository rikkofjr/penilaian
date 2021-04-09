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
                {!! Form::open(array('route' => 'penilaian-partisipasi3.store','method'=>'POST')) !!}
                {!! Form::hidden('id_pelatihan', $pelatihan->id, array('placeholder' => '','class' => 'form-control')) !!}
                    <div class="form-group">

                    {!! Form::text('nip', $peserta->nip, array('placeholder' => '','class' => 'form-control', 'readonly' => 'readonly')) !!}

                    </div>
                    <div class="form-group">
                        {!! Form::text('nama', $peserta->nama_peserta, array('placeholder' => 'Partisipasi tidak tampak sama sekali','class' => 'form-control', 'disabled' => 'Disabled')) !!}
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="n1" placeholder="Partisipasi tidak tampak sama sekali">
                            <option value="" class="label" hidden>Partisipasi tidak tampak sama sekali</option>
                            <option value="-8">-8</option>
                            <option value="-9">-9</option>
                            <option value="-10">-10</option>
                        </select> 
                        <small>Nilai : -8 s/d -10</small>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="n2" placeholder="Partisipasi kecil">
                            <option value="" class="label" hidden>Partisipasi kecil</option>
                            <option value="-4">-4</option>
                            <option value="-5">-5</option>
                            <option value="-6">-6</option>
                            <option value="-7">-7</option>
                        </select> 
                        <small>Nilai : -4 s/d -7</small>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="n3" placeholder="Partisipasi Sedang">
                            <option value="" class="label" hidden>Partisipasi Sedang</option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select> 
                        <small>Nilai : 0 s/d 3</small>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="n4" placeholder="Partisipasi cukup positif">
                            <option value="" class="label" hidden>Partisipasi cukup positif</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                        </select> 
                        <small>Nilai : 4 s/d 7</small>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="n5" placeholder="Partisipasi sangat menonjol">
                            <option value="" class="label" hidden>Partisipasi sangat menonjol</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select> 
                        <small>Nilai : 8 s/d 10</small>
                    </div>
                    
                    <div class="form-group">
                    {!! form::textarea('keterangan', null, array('placeholder' => 'Deskripsi','class' => 'form-control')) !!}
                    </div>
                    {{ Form::submit('Tambah Data', array('class' => 'btn btn-primary')) }}

                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>

@endsection
