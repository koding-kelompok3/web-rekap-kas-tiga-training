@extends('layouts.admin')
@section('pembayaran', 'active')
@section('kas-masuk', 'active')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>DATA PEMBAYARAN MASUK</h2>
    </div>

    <div class="row clearfix">
        <div class="col-sm-8">
            <div class="card">
                <div class="header">
                    <a href="/admin/kas/masuk/cetak_kas_masuk" style="color: white;" class="btn btn-primary pull-right" target="_blank">Cetak PDF</a>
                    <h2>
                        DATA PEMBAYARAN MASUK
                    </h2>
                </div>

                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="table">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 20px;">No</th>
                                    <th>Nama Bendahara</th>
                                    <th>Nama Siswa</th>
                                    <th>Kelas</th>
                                    <th>Bayar</th>
                                    <th>Tanggal Bayar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kas_masuk as $k)
                                <tr>
                                    <td class="text-center"></td>
                                    <td>{{ $k->name }}</td>
                                    <td>{{ $k->nama_siswa }}</td>
                                    <td>{{ $k->kelas }}</td>
                                    <td>Rp {{ number_format($k->bayar, 0, ',', '.') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($k->created_at)->translatedFormat('d F Y') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="header">
                    <h2>
                        DETAIL PER KELAS
                        <small>Klik untuk melihat data pembayaran per kelas</small>
                    </h2>
                </div>

                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="table">
                            <thead>
                                <tr>
                                    <th>Nama Bendahara</th>
                                    <th>Kelas</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user as $u)
                                <tr>
                                    <td>
                                        <a href="/admin/pembayaran/masuk/{{ $u->id }}">{{ $u->name }}</a>
                                    </td>
                                    <td>{{ $u->kelas }}</td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection