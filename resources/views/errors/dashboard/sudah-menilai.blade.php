@extends('layouts.dashboard')
@section('Content')
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4 py-3 border-left-primary">
            <div class="card-body" style="text-align:center;">
                <img src="{{ asset('img-asset/sorry.svg')}}" width="200px">
                <h1 class="h1 mb-4 text-gray-800">
                    Maaf {{Auth::user()->name}}, Kamu sudah menilai orang/kelompok ini
                </h1>
                <a class="btn btn-primary" href="{{ url()->previous() }}">Kembali</a>
            </div>
        </div>
    </div>
</div>


@endsection
