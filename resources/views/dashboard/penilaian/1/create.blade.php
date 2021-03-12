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
                {!! Form::open(array('route' => 'penilaian-naskah1.store','method'=>'POST')) !!}
                    <div class="form-group">
                        {!! Form::hidden('id_pelatihan', $pelatihan->id, array('placeholder' => '','class' => 'form-control')) !!}
                        {!! Form::number('kelompok', $pelatihan->kelompok, array('placeholder' => 'Kelompok','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::text('judul_naskah', null, array('placeholder' => 'Judul naskah','class' => 'form-control')) !!}
                    </div>
                    <table class="table">
                        <tr>
                            <td width="50%">Penilaian</td>
                            <td>Nilai</td>
                        </tr>
                        <tr>
                            <td>
                                Naskah (NN)<br/>
                                Kelengkapan Naskah (KN)  =  1
                                <ol>
                                    <li>Struktur Pengorganisasian Makalah/Format naskah</li>
                                    <li>Tata Naskah</li>
                                    <li>Isi Naskah (Pendahuluan, Pembahasan, penutup)</li>
                                </ol>
                            </td>
                            <td>{!! Form::text('nn', null, array('placeholder' => 'Nilai NN','class' => 'form-control')) !!}</td>
                        </tr>
                        <tr>
                            <td>
                                Keorisinilan Naskah (ON)  =  2
                                <ol>
                                    <li>Ide dalam perencanaan pembangunan</li>
                                    <li>Kemurnian konsep secara keseluruhan</li>
                                </ol>
                            </td>
                            <td>{!! Form::text('on', null, array('placeholder' => 'Nilai ON','class' => 'form-control')) !!}</td>
                        </tr>
                        <tr>
                            <td>
                                Modus Berpikir Akademik (MBA)  =  3
                                <ol>
                                    <li>Ketepatan dalam membuat perencanaan</li>
                                    <li>Ketepatan dalam merumuskan kebutuhan sesuai prioritas</li>
                                    <li>Ketepatan mengidentifikasi dan menganalisa kebutuhan</li>
                                    <li>Keutuhan konsep</li>
                                    <li>Originitas kerangka berpikir</li>
                                </ol>
                            </td>
                            <td>{!! Form::text('mba', null, array('placeholder' => 'Nilai MBA','class' => 'form-control')) !!}</td>
                        </tr>
                        <tr>
                            <td>
                                Relevansi dan Kesesuaian dengan Anggaran  (RKI)  =  3
                                <ol>
                                    <li>Kemantapan pemikiran dan penguasaan materi pembahasan.</li>
                                    <li>Konsistensi isi naskah dengan anggaran yang tersedia.</li>
                                    <li>Ketepatan penggunaan data/fakta dalam memperkuat argumentasi permasalahan.</li>
                                    <li>Keluasan dan kedalaman analisa dan pemikiran.</li>
                                </ol>
                            </td>
                            <td>{!! Form::text('rki', null, array('placeholder' => 'Nilai RKI','class' => 'form-control')) !!}</td>
                        </tr>
                        <tr>
                            <td>
                                Nilai Kemanfaatan (NM)  = 1
                                <ol>
                                    <li>Konsep/gagasan yang dikemukan berguna bagi organisasi dan atau bagi pengembangan Hanneg pada umumnya Hanneg Matra Laut pada khususnya.</li>
                                    <li>Konsep/gagasan yang dikemukakan realistik dan selaras dengan kebutuhan organisasi maupun Hanneg pada umumnya dan Hanneg Matra Laut pada khususnya.</li>
                                </ol>
                            </td>
                            <td>{!! Form::text('nm', null, array('placeholder' => 'Nilai NM','class' => 'form-control')) !!}</td>
                        </tr>
                    </table>
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
