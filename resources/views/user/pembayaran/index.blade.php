@extends('layouts.user')
@section('bayar', 'active-nav')

@section('content')
<div class="container-me">
    <nav class="navbar navbar-light">
        <div class="container-fluid-nav text-center">
            <a class="navbar-brand text-white" href="/user">
                <span class="fa fa-arrow-left"></span>
            </a>
            <h4 class="d-inline-block text-white">Pembayaran</h4>
        </div>
    </nav>

    <div class="container">
        <button class="btn btn-sm btn-primary float-right mb-2" id="button-create" data-toggle="modal"
            data-target="#modalCreate">
            <span class="fa fa-plus"></span> Tambah Bayar
        </button>

        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Cari siswa ..." class="form-control">

        <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="title">Tambah Bayar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/user/pembayaran/store" method="POST">
                            @csrf

                            <div class="form-group row">
                                <label class="col-4 col-form-label text-md-left">Bayar</label>
                                <div class="col-8">
                                    <input id="bayar" type="number" name="bayar" class="form-control" required>
                                </div>
                            </div>

                            @foreach($siswa as $s)
                            <input type="hidden" name="nama_siswa" value="{{ $s->nama_siswa }}">
                            @endforeach

                            <div class="form-group row">
                                <label class="col-4 col-form-label text-md-left">Siswa</label>
                                <div class="col-8">
                                    <select id="siswa_id" name="siswa_id" class="form-control" required>
                                        <option value="">Pilih siswa</option>
                                        @foreach($siswa as $s)
                                        <option value="{{ $s->id }}">{{ $s->nama_siswa }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-4 col-form-label text-md-left">Tanggal</label>
                                <div class="col-8">
                                    <input type="date" class="form-control"
                                        value="{{ date('Y-m-d', strtotime(Carbon\carbon::today()->toDateString())) }}"
                                        disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <button id="save_bayar" type="submit" class="btn btn-sm btn-success float-right">
                                    <span class="fa fa-save fa-sm"></span> Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover mt-3" id="myTable">
                <thead>
                    <tr>
                        <th style="width: 30px;">#</th>
                        <th class="text-center">Nama</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($siswa) == 0)
                    <tr>
                        <td colspan="2">
                            <img src="{{ asset('img/asset/3024051.jpg') }}" alt="" width="100%">
                            <div class="alert alert-info text-center">
                                Belum ada data!
                            </div>
                        </td>
                    </tr>
                    @else
                    @foreach($siswa as $key => $s)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td class="text-center">
                            <a href="/user/pembayaran/show/{{ $s->id }}">{{ $s->nama_siswa }}</a>
                        </td>
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

    #myInput {
        background-image: url('/img/asset/searchicon.png');
        background-position: 10px 10px;
        background-repeat: no-repeat;
        width: 100%;
        font-size: 16px;
        padding: 12px 20px 12px 40px;
        border: 1px solid #ddd;
        margin-bottom: 12px;
    }

</style>
@endsection

@section('js')
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
<script>
    $("#save_bayar").on('click', function () {
        var error_bayar = $("#bayar").val();
        var error_siswa = $("#siswa_id").val();

        if (error_bayar.length < 1) {
            swal({
                icon: 'warning',
                title: 'Error!',
                text: 'Jumlah bayar minimal 3 karakter.',
                buttons: false,
                timer: 2000,
            });
        } else if (error_siswa.length < 1) {
            swal({
                icon: 'warning',
                title: 'Error!',
                text: 'Siswa tidak boleh kosong.',
                buttons: false,
                timer: 2000,
            });
        } else {
            swal({
                icon: 'success',
                title: 'Sukses!',
                text: 'Pembayaran berhasil ditambahkan.',
                buttons: false,
                timer: 1500,
            });
        }
    });

    $(document).ready(function () {
        $("#myInput").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });

</script>
@endsection
