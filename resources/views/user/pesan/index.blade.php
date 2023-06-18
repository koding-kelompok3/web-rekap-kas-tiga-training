@extends('layouts.user')

@section('content')
<div class="container-me">
    <nav class="navbar navbar-light">
        <div class="container-fluid-nav text-center">
            <a class="navbar-brand text-white" href="/user">
                <span class="fa fa-arrow-left"></span>
            </a>
            <h4 class="d-inline-block text-white">Riwayat Pesan</h4>
        </div>
    </nav>

    <div class="container">
        <button class="btn btn-sm btn-primary float-right mb-2" id="button-create" data-toggle="modal" data-target="#modalCreate">
            <span class="fa fa-paper-plane"></span> Kirim Pesan
        </button>

        <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="title">Kirim Pesan Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/user/pesan/store" method="POST">
                            @csrf

                            <div class="form-group row">
                                <div class="col-12">
                                    <div class="alert alert-danger" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h5 class="alert-heading">Perhatian!</h5>
                                        <ul class="alert" style="font-size: 12px;">
                                            <li>Harap menggunakan kata kata yang sopan.</li>
                                            <li>Jika ada kendala dalam menggunakan aplikasi kirim pesan keluhan anda
                                                .</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                                <label class="col-12 col-form-label text-md-left">Isi Pesan anda disini.</label>
                                <div class="col-12">
                                    <textarea name="isi" id="isi" cols="30" rows="5" class="form-control" required></textarea>
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

        <div class="modal fade" id="modalShow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="title">Isi Pesan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <span id="isi_pesan"></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Isi</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($pesan) == 0)
                    <tr>
                        <td colspan="3">
                            <img src="{{ asset('img/asset/3024051.jpg') }}" alt="" width="100%">
                            <div class="alert alert-info text-center">
                                Belum ada data!
                            </div>
                        </td>
                    </tr>
                    @else
                    @foreach($pesan as $p)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($p->created_at)->translatedFormat('d F Y') }}</td>
                        <td>
                            <button class="btn btn-sm btn-primary button-show" data-toggle="modal" data-target="#modalShow" data-id="{{ $p->id }}">
                                <span class="fa fa-info"></span>
                            </button>
                        </td>
                        <td>
                            @if($p->status == "true") <span class="badge badge-success">Dilihat</span>
                            @else
                            <span class="badge badge-warning">Belum dilihat</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
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
</style>
@endsection

@section('js')
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
<script>
    $('.button-show').on('click', function() {
        $('#modal').modal('toggle');
        var id = $(this).attr("data-id");
        var url = "/user/get_data_pesan/" + id;
        $.ajax({
            url: url,
            cache: false,
            success: function(result) {
                console.log(result)
                $('#isi_pesan').html(result.isi);
            }
        })
    })
</script>
@endsection