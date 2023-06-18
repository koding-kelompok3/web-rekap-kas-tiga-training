@extends('layouts.admin')
@section('pengguna', 'active')
@section('bendahara', 'active')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>DETAIL DATA</h2>
    </div>

    <div class="row clearfix">
        <div class="col-sm-8">
            <div class="card">
                <div class="header">
                    <h2>
                        DETAIL DATA BENDAHARA
                    </h2>
                </div>

                <div class="body">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Nama</label>
                            <div class="form-line">
                                <input type="text" class="form-control" value="{{ $user->name }}" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Username</label>
                            <div class="form-line">
                                <input type="text" class="form-control" value="{{ $user->username }}" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Kelas</label>
                            <div class="form-line">
                                <input type="text" class="form-control" value="{{ $user->kelas }}" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <img id="foto" width="100%" src="{{ asset('img/user/'.$user->foto) }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="header">
                    <h2>Log Aktifitas</h2>
                </div>

                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($riwayat as $u)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($u->created_at)->translatedFormat('d F Y') }}</td>
                                    <td>{{ $u->riwayat }}</td>
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