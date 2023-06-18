@extends('layouts.user')
@section('bayar', 'active-nav')

@section('content')

<div class="container-me">
    <nav class="navbar navbar-light">
        <div class="container-fluid-nav text-center">
            <a class="navbar-brand text-white" href="/user">
                <span class="fa fa-arrow-left"></span>
            </a>
            <h4 class="d-inline-block text-white">Pembayaran Masuk</h4>
        </div>
    </nav>

    <div class="container">
        <a href="/user/pembayaran/kas-masuk/cetak_pdf" class="btn btn-primary btn-sm float-right" target="_blank">
            <span class="fa fa-download"></span> Cetak PDF
        </a>
        <div class="table-responsive">
            <br>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th style="width: 20px;">#</th>
                        <th>Masuk</th>
                        <th>Siswa</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($masuk) == 0)
                    <tr>
                        <td colspan="4">
                            <img src="{{ asset('img/asset/3024051.jpg') }}" alt="" width="100%">
                            <div class="alert alert-info text-center">
                                Belum ada data!
                            </div>
                        </td>
                    </tr>
                    @else
                    @foreach($masuk as $key => $m)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>Rp. {{ number_format($m->bayar, 0, ',', '.') }}</td>
                        <td>{{ $m->nama_siswa }}</td>
                        <td>{{ \Carbon\Carbon::parse($m->created_at)->translatedFormat('d F Y') }}</td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('css')
<style>
    body {
        background-color: #ffffff;
    }

    .container-me {
        margin: 0;
        padding: 0;
    }

    .container {
        margin-top: 20px;
    }

    .navbar {
        background-color: #ffa942
    }

    .container h4 {
        margin-bottom: 35px;
    }
</style>
@endsection