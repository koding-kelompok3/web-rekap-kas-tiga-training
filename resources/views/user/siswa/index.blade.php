@extends('layouts.user')
@section('siswa', 'active-nav')

@section('content')
<div class="container-me">
    <nav class="navbar navbar-light">
        <div class="container-fluid-nav text-center">
            <a class="navbar-brand text-white" href="/user">
                <span class="fa fa-arrow-left"></span>
            </a>
            <h4 class="d-inline-block text-white">Data Siswa</h4>
        </div>
    </nav>
    <div class="container">

        <button class="btn btn-sm float-right btn-primary mb-2" id="button-create" data-toggle="modal" data-target="#modalCreate">
            <span class="fa fa-sm fa-plus"></span> Tambah Siswa
        </button>

        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Cari siswa ..." class="form-control">

        <div class="table-responsive">
            <table class="table table-hover mt-3" id="myTable">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 25px;">#</th>
                        <th>Nama</th>
                        <th>JK</th>
                        <th>Lahir</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($siswa) == 0)
                    <tr>
                        <td colspan="5">
                            <img src="{{ asset('img/asset/3024051.jpg') }}" alt="" width="100%">
                            <div class="alert alert-info text-center">
                                Belum ada data!
                            </div>
                        </td>
                    </tr>
                    @else
                    @foreach($siswa as $key => $s)
                    <tr id="myTR">
                        <td class="text-center">{{ $key + 1 }}</td>
                        <td>{{ $s->nama_siswa }}</td>
                        <td> {{ $s->jk == 'L' ? "Laki Laki" : "Perempuan" }} </td>
                        <td>{{ \Carbon\Carbon::parse($s->tanggal_lahir)->translatedFormat('d/M/Y') }}</td>
                        <!-- <td>
                            <button tabindex="0" type="button" class="btn btn-primary btn-sm" data-container="body" data-toggle="popover" title="JK | Tanggal Lahir" data-trigger="focus" data-placement="top" data-content="
                                    @if($s->jk == 'L') Laki Laki
                                    @else Perempuan @endif
                                    |
                                    {{ date('d-M-Y', strtotime($s->tanggal_lahir)) }}
                                ">
                                <span class="fa fa-info fa-sm"></span>
                            </button>
                        </td> -->
                        <td class="text-center" style="width: 50px;">
                            <a href="javascript:void(0)" class="btn btn-sm btn-danger button-delete" data-id="{{ $s->id }}">
                                <span class="fa fa-trash fa-sm"></span>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title">Tambah Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-4 col-form-label text-md-left">Nama</label>
                        <div class="col-8">
                            <input id="nama_siswa" type="text" name="nama_siswa" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-4 col-form-label text-md-left">JK</label>
                        <div class="col-8">
                            <select name="jk" id="jk" class="form-control">
                                <option value="L">Laki Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-4 col-form-label text-md-left">Tanggal Lahir</label>
                        <div class="col-8">
                            <input id="tanggal_lahir" type="date" name="tanggal_lahir" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-4 col-form-label text-md-left">Kelas</label>
                        <div class="col-8">
                            <input id="kelas" type="text" name="kelas" class="form-control" value="{{ Auth::user()->kelas }}" disabled>
                        </div>
                    </div>

                    <input type="hidden" name="users_id" id="users_id" value="{{ Auth::user()->id }}">

                    <div class="form-group">
                        <button id="save_siswa" type="button" class="btn btn-sm btn-success float-right">
                            <span class="fa fa-save fa-sm"></span> Simpan
                        </button>
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
    $(function() {
        $('[data-toggle="popover"]').popover()
    });

    $("#save_siswa").on('click', function() {
        var error_nama = $("#nama_siswa").val();
        var error_tgl = $("#tanggal_alhir").val();

        if (error_nama.length < 2) {
            swal({
                title: "Error",
                text: "Nama minimal berisi 2 karakter",
                icon: "warning",
                buttons: false,
                timer: 1500,
            });
        } else {
            var data = {
                '_token': "{{ csrf_token() }}",
                'nama_siswa': $("#nama_siswa").val(),
                'jk': $("#jk").val(),
                'tanggal_lahir': $("#tanggal_lahir").val(),
                'kelas': $("#kelas").val(),
                'users_id': $("#users_id").val(),
            }
            $.ajax({
                url: "{{ route('siswa.store') }}",
                type: 'POST',
                data: data,
                cache: false,
                success: function(result) {
                    console.log(result);
                    if (result.status == 200) {
                        $("#modalCreate").modal('hide');
                        swal({
                            title: "Berhasil!",
                            text: result.message,
                            icon: "success",
                            buttons: false,
                            timer: 1500,
                        });
                        setTimeout(function() {
                            window.location.href = "/user/siswa";
                        }, 1000);
                    }
                },
                error: function(result) {
                    console.log(result);
                    if (result.status == 422) {
                        swal({
                            title: "Error!",
                            text: "Tanggal lahir tidak boleh kosong",
                            icon: "warning",
                            buttons: false,
                            timer: 2000,
                        });
                    }
                }
            })
        }
    });

    $(".button-delete").click(function() {
        var id = $(this).attr("data-id");
        var url = "/user/siswa/delete/" + id;
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
                        text: "Siswa berhasil dihapus!",
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