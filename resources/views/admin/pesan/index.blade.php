@extends('layouts.admin')
@section('pesan', 'active')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>DATA PESAN</h2>
    </div>

    <div class="row clearfix">
        <div class="col-12">
            <div class="card">
                <div class="header">
                    <h2>
                        PESAN
                    </h2>
                </div>

                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="table">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 15px;">No</th>
                                    <th>Tanggal</th>
                                    <th>Dari</th>
                                    <th>Isi</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pesan as $p)
                                <tr>
                                    <td class="text-center"></td>
                                    <td>{{ \Carbon\Carbon::parse($p->created_at)->translatedFormat('d F Y') }}</td>
                                    <td>{{ $p->users->name }}</td>
                                    <td>{{ $p->isi }}</td>
                                    @if($p->status == 'true')
                                    <td>
                                        <button class="btn btn-xs btn-success waves-effect">Sudah dibaca</button>
                                    </td>
                                    @else
                                    <td>
                                        <form action="/admin/pesan/{{ $p->id }}" method="POST">
                                            @csrf
                                            {{ method_field('PUT') }}
                                            <button class="btn btn-xs btn-primary waves-effect" type="submit">Belum dibaca</button>
                                        </form>
                                    </td>
                                    @endif
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