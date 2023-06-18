@extends('layouts.admin')
@section('pembayaran', 'active')
@section('kas-masuk', 'active')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>DETAIL PEMBAYARAN MASUK</h2>
    </div>

    <div class="row clearfix">
        <div class="col-sm-8">
            <div class="card">
                <div class="header">
                    <a href="/admin/pembayaran/masuk/cetak_pdf/{{ $user->id }}" style="color: white;" class="btn btn-primary pull-right" target="_blank">Cetak PDF</a>
                    <h2>
                        DETAIL PEMBAYARAN MASUK
                        <small>Kelas : {{ $user->kelas }}</small>
                    </h2>
                </div>

                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="table">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 20px;">No</th>
                                    <th>Nama Siswa</th>
                                    <th>Bayar</th>
                                    <th>Tanggal Bayar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kas_masuk as $k)
                                <tr>
                                    <td class=""></td>
                                    <td>{{ $k->nama_siswa }}</td>
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
            <div class="info-box bg-green hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">account_balance_wallet</i>
                </div>
                <div class="content">
                    <div class="text">TOTAL KAS MASUK <small style="font-size: 9px;"></div>
                    <div class="number">Rp. {{ number_format($total, 0, ',', '.') }}</div>
                </div>
                <div class="card">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection