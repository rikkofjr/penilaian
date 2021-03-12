@extends('layouts.dashboard')
@section('Content')
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4 py-3 border-left-primary">
            <div class="card-body">
                Tambah pelatihan
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Pelatihan</h6>
            </div>
            <div class="card-body">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {!! Form::open(array('route' => 'pelatihan.store','method'=>'POST')) !!}
                    <div class="form-group">
                        <strong>Name:</strong>
                        {!! Form::text('nama_pelatihan', null, array('placeholder' => 'Nama Pelatihan','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::number('angkatan', null, array('placeholder' => 'Angkatan (Contoh : 4, 12)','class' => 'form-control')) !!}
                        <small style="color:red;">Tidak menggunakan angka 0 di depan</small>
                    </div>
                    <div class="form-group">
                    {!! form::textarea('deskripsi', null, array('placeholder' => 'Deskripsi','class' => 'form-control')) !!}
                    </div>
                    {{ Form::submit('Tambah Data', array('class' => 'btn btn-primary')) }}

                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>

@endsection
