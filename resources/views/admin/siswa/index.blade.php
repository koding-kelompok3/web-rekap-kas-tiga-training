@extends('layouts.admin')
@section('pengguna', 'active')
@section('siswa', 'active')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>DATA SISWA</h2>
    </div>

    <div class="row clearfix">
        <div class="col-12">
            <div class="card">
                <div class="header">
                    <h2>
                        DATA SEMUA SISWA
                    </h2>
                    <small class="pull-right">Total siswa : {{ $siswa }} siswa</small>
                </div>

                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="table">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 20px;">No</th>
                                    <th>Kelas</th>
                                    <th style="width: 300px;">Nama Bendahara</th>
                                    <th>Tanggal ditambahkan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user as $u)
                                <tr>
                                    <td class="text-center"></td>
                                    <td>
                                        <a href="/admin/siswa/{{ $u->id }}">
                                            {{ $u->kelas }}
                                        </a>
                                    </td>
                                    <td>{{ $u->name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($u->created_at)->translatedFormat('d F Y') }}</td>
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

@section('js')
<script>
    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
@endsection