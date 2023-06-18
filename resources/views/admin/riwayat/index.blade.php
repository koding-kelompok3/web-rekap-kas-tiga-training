@extends('layouts.admin')
@section('riwayat', 'active')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>DATA RIWAYAT</h2>
    </div>

    <div class="row clearfix">
        <div class="col-12">
            <div class="card">
                <div class="header">
                    <h2>
                        RIWAYAT
                    </h2>
                </div>

                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="table">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 20px;">No</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($riwayat as $r)
                                <tr>
                                    <td class="text-center"></td>
                                    <td>{{ \Carbon\Carbon::parse($r->created_at)->translatedFormat('d F Y') }}</td>
                                    <td>{{ $r->riwayat }}</td>
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