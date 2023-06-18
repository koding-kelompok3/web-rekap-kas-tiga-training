@extends('layouts.user')
@section('bayar', 'active-nav')

@section('content')

<div class="container-me">
    <nav class="navbar navbar-light">
        <div class="container-fluid-nav text-center">
            <a class="navbar-brand text-white" href="/user">
                <span class="fa fa-arrow-left"></span>
            </a>
            <h4 class="d-inline-block text-white">Pembayaran Keluar</h4>
        </div>
    </nav>

    <div class="container">
        <div class="float-right">
            <a href="/user/pembayaran/kas-keluar/cetak_pdf" class="btn btn-primary btn-sm" target="_blank">
                <span class="fa fa-download"></span> Cetak PDF
            </a>
            <button class="btn btn-sm btn-primary" id="button-create" data-toggle="modal" data-target="#modalCreate">
                <span class="fa fa-plus"></span> Tambah Data
            </button>
        </div>
        <div class="table-responsive">
            <table class="table table-hover mt-3">
                <thead>
                    <tr>
                        <th style="width: 20px;">#</th>
                        <th>Keluar</th>
                        <th style="width: 550px;">Keterangan</th>
                        <th>Tanggal</th>
                        <th>Bukti/Foto</th>
                        <!-- <th>Aksi</th> -->
                    </tr>
                </thead>
                <tbody>
                    @if(count($keluar) == 0)
                    <tr>
                        <td colspan="5">
                            <img src="{{ asset('img/asset/3024051.jpg') }}" alt="" width="100%">
                            <div class="alert alert-info text-center">
                                Belum ada data!
                            </div>
                        </td>
                    </tr>
                    @else
                    @foreach($keluar as $key => $m)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>Rp.{{ number_format($m->bayar, 0, ',', '.') }}</td>
                        <td>{{ $m->ket }}</td>
                        <td>{{ \Carbon\Carbon::parse($m->created_at)->translatedFormat('d/M/Y') }}</td>
                        <td>
                            <a href="/img/bukti/{{ $m->bukti }}">
                                <img src="{{ asset('img/bukti/'.$m->bukti) }}" class="image">
                            </a>
                        </td>
                        <td>
                            <!-- <button class="btn btn-sm btn-danger button-delete" data-id="{{ $m->id }}">
                                <span class="fa fa-trash"></span>
                            </button> -->
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>

        <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="title">Tambah Pembayaran Keluar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/user/pembayaran/keluar/store" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-4 col-form-label text-md-left">Keluar</label>
                                <div class="col-8">
                                    <input id="bayar" type="number" name="bayar" class="form-control" required max="{{ $masuk }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-4 col-form-label text-md-left">Bukti</label>
                                <div class="col-8">
                                    <input id="bukti" type="file" name="bukti" class="form-control" accept=".jpg, .png, .jpeg" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-4 col-form-label text-md-left">Keterangan</label>
                                <div class="col-8">
                                    <textarea name="ket" id="ket" cols="5" rows="3" class="form-control" required></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <button id="save" type="submit" class="btn btn-sm btn-success float-right">
                                    <span class="fa fa-save fa-sm"></span> Simpan
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
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

    .image {
        width: 100px;
        height: 100px;
    }

    @media(max-width: 670px) {
        .image {
            width: 100%;
            height: 50px;
        }
    }
</style>
@endsection

@section('js')
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
<script>
    $("#save").on('click', function() {
        var error_bayar = $("#bayar").val();
        var error_bukti = $("#bukti").val();
        var error_ket = $("#ket").val();

        if (error_bayar.length <= 2) {
            swal({
                title: "Error",
                text: "Input bayar minimal 3 digit",
                icon: "warning",
                buttons: false,
                timer: 1500,
            });
        } else if (error_ket <= 2) {
            swal({
                title: "Error",
                text: "Input keterangan minimal 3 huruf",
                icon: "warning",
                buttons: false,
                timer: 1500,
            });
        } else if (error_bukti < 1) {
            swal({
                title: "Error",
                text: "Bukti diperlukan.",
                icon: "warning",
                buttons: false,
                timer: 1500,
            });
        } else {
            // swal({
            //     title: "Berhasil!",
            //     text: "Pembayaran keluar berhasil ditambahkan.",
            //     icon: "success",
            //     buttons: false,
            //     timer: 1500,
            console.log('ERROR!');
        });
    // var data = {
    //     '_token': "{{ csrf_token() }}",
    //     'bayar': $("#bayar").val(),
    //     'ket': $("#ket").val(),
    // }
    // $.ajax({
    //     url: "/user/pembayaran/keluar/store",
    //     type: 'POST',
    //     data: data,
    //     cache: false,
    //     success: function (result) {
    //         console.log(result);
    //         if (result.status == 200) {
    //             $("#modalCreate").modal('hide');
    //             swal({
    //                 title: "Berhasil!",
    //                 text: result.message,
    //                 icon: "success",
    //                 buttons: false,
    //                 timer: 1500,
    //             });
    //             setTimeout(function () {
    //                 window.location.href = "/user/pembayaran/keluar";
    //             }, 1000);
    //         }
    //     },
    // })
    }
    });

    $(".button-delete").on('click', function() {
        var id = $(this).attr("data-id");
        var url = "/user/pembayaran/delete/" + id;
        console.log(url);
        swal({
                title: "Apakah kamu yakin?",
                text: "Data ini tidak akan bisa dipulihkan setelah dihapus.",
                icon: "warning",
                buttons: ["Batal", "Ya"],
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal({
                        title: "Berhasil!",
                        text: "Pembayaran Keluar berhasil dihapus!",
                        icon: "success",
                        buttons: false,
                        timer: 1500,
                    });
                    setTimeout(function() {
                        window.location.href = url;
                    }, 1000);
                }
            });
    });
</script>
@endsection