@extends('layouts.dashboard')
@section('Content')
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4 py-3 border-left-primary">
            <div class="card-body">
            Data pelatihan
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Pelatihan Berlangsung</h6>
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
                <table border="1">
                    <tr>
                        <td>No</td>
                        <td>Nama Pelatihan</td>
                        <td>Angkatan</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Manajemen Strategis </td>
                        <td>20</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Manajemen Proyek </td>
                        <td>9</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Kitchen Management</td>
                        <td>19</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
