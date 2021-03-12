@extends('layouts.dashboard')
@section('Content')
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4 py-3 border-left-primary">
            <div class="card-body">
            Formulir Penilaian
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <h2>Penilaian Kelompok</h2>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="card shadow">
            <div class="card-body">

                <h3>LEMBAR PENILAIAN PRODUK NASKAH KELOMPOK </h3>
            </div>        
        </div>
    </div>
    <div class="col-6">
        <div class="card shadow">
            <div class="card-body">

                <h3>LEMBAR PENILAIAN PAPARAN KELOMPOK</h3>
            </div>        
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Formulir Penilaian</h6>
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
                
            </div>
        </div>
    </div>
</div>

@endsection
