@extends('layouts.admin')
@section('pengguna', 'active')
@section('siswa', 'active')

@section('content')

<div class="container-fluid">
    <div class="block-header">
        <h2>DATA SISWA</h2>
    </div>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        DATA SISWA KELAS : {{ $user->kelas }}
                        <small>Nama Bendahara : {{ $user->name }}</small>
                    </h2>
                    <small class="pull-right">Total siswa : {{ count($siswa) }} siswa</small>
                </div>

                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="table">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 20px;">No</th>
                                    <th>Nama</th>
                                    <th>JK</th>
                                    <th>Tanggal Lahir</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($siswa as $key => $u)
                                <tr>
                                    <td class="text-center">{{ $key + 1 }}</td>
                                    <td>{{ $u->nama_siswa }}</td>
                                    <td>{{ $u->jk == 'L' ? "Laki Laki" : "Perempuan" }}</td>
                                    <td>{{ \Carbon\Carbon::parse($u->tanggal_lahir)->translatedFormat('d F Y') }}</td>
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