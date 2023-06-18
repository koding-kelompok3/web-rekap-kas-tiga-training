@extends('layouts.admin')
@section('pengguna', 'active')
@section('bendahara', 'active')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>DATA BENDAHARA</h2>
    </div>

    <div class="row clearfix">
        <div class="col-12">
            <div class="card">
                <div class="header">
                    <h2>
                        KELOLA DATA BENDAHARA
                        <small>Kamu bisa menambah, mengubah dan menghapus bendahara!</small>
                    </h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalCreate">
                                Tambah Data
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="table">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 20px;">No</th>
                                    <th>Nama</th>
                                    <th style="width: 120px">Kelas</th>
                                    <th>Tanggal ditambahkan</th>
                                    <th style="width: 80px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user as $u)
                                <tr>
                                    <td class="text-center"></td>
                                    <td>
                                        <a href="/admin/user/show/{{ $u->id }}">
                                            {{ $u->name }}
                                        </a>
                                    </td>
                                    <td>{{ $u->kelas }}</td>
                                    <td>{{ \Carbon\Carbon::parse($u->created_at)->translatedFormat('d F Y') }}</td>
                                    <td class="text-center">
                                        <button type="button" class="button-show btn btn-xs btn-primary waves-effect" data-id="{{ $u->id }}" data-toggle="modal" data-target="#modalShow">
                                            <i class="material-icons">visibility</i>
                                        </button>

                                        <button type="button" data-id="{{ $u->id }}" class="button-edit btn btn-xs btn-warning waves-effect" data-toggle="modal" data-target="#modalEdit">
                                            <i class="material-icons">create</i>
                                        </button>

                                        <button type="button" data-id="{{ $u->id }}" class="button-delete btn btn-xs btn-danger waves-effect">
                                            <i class="material-icons">delete_forever</i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalShow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title">Detail Akun Bendahara</h5>
                </div>
                <div class="modal-body">
                    <div class="col-12">
                        <div class="form-group">
                            <div class="form-line">
                                <input id="name_show" type="text" name="name" class="form-control" placeholder="Nama" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-line">
                                <input id="username_show" type="text" name="username" class="form-control" placeholder="Username" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-line">
                                <input id="kelas_show" type="text" name="kelas" class="form-control" placeholder="Kelas" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <img id="foto_show" width="100%">
                        </div>

                        <div class="form-group">
                            <button class="btn btn-default btn-sm" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ubah User</h5>
                </div>
                <div class="modal-body">
                    <form id="form-edit" enctype="multipart/form-data" method="POST">
                        @csrf
                        {{ method_field('PUT') }}

                        <div class="col-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input id="name" type="text" name="name" class="form-control" placeholder="Nama">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-line">
                                    <input id="username" type="text" name="username" class="form-control" placeholder="Username">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-line">
                                    <input id="kelas" type="text" name="kelas" class="form-control" placeholder="Kelas">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-line">
                                    <img id="foto" width="100%" alt="">
                                    <input type="file" id="image" name="foto" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button id="save_edit" type="submit" class="btn btn-sm btn-success">Simpan</button>
                            <button class="btn btn-default" data-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title">Tambah Akun Bendahara</h5>
                </div>
                <div class="modal-body">
                    <div class="col-12">
                        <div class="form-group">
                            <div class="form-line">
                                <input id="name_user" type="text" name="name" class="form-control" placeholder="Nama">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-line">
                                <input id="username_user" type="text" name="username" class="form-control" placeholder="Username">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-line">

                                <input id="password_user" type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-line">
                                <input id="kelas_user" type="text" name="kelas" class="form-control" placeholder="Kelas">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button id="save_user" class="btn btn-sm btn-success float-right">Simpan</button>
                        <button class="btn btn-sm btn-default" data-dismiss="modal">Batal</button>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('js')
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/sweetalert.min.js') }}"></script>

<script>
    $('.button-show').on('click', function() {
        $('#modal').modal('toggle');
        var id = $(this).attr("data-id");
        var url = "/admin/get_data_user/" + id;
        $.ajax({
            url: url,
            cache: false,
            success: function(result) {
                console.log(result)

                $('#name_show').val(result.name);
                $('#username_show').val(result.username);
                $('#kelas_show').val(result.kelas);
                $('#img').val(result.foto);
                var src = "/img/user/" + result.foto;
                $('#foto_show').attr("src", src);
            }
        })
    })

    $('.button-edit').on('click', function() {
        $('modalEdit').modal('toggle');
        var id = $(this).attr('data-id');
        var url = '/admin/get_data_user/' + id;
        $.ajax({
            '_token': "{{ csrf_token() }}",
            url: url,
            cache: false,
            success: function(result) {
                console.log(result)

                var action = "/admin/user/update/" + id;
                $("#form-edit").attr("action", action)

                $('#name').val(result.name)
                $('#username').val(result.username)
                $('#kelas').val(result.kelas)
                $('#level').val(result.level)
                $('#img').val(result.foto)
                var src = "/img/user/" + result.foto;
                $('#foto').attr("src", src);
                $('#save_edit').click(function() {
                    swal({
                        icon: "success",
                        title: "Berhasil!",
                        text: "Data berhasil diupdate!",
                        buttons: false,
                        timer: 1500,
                    });
                    $("#modalEdit").modal('hide');
                });
            }
        })
    })

    $(".button-delete").click(function() {
        var id = $(this).attr("data-id");
        var url = "/admin/user/delete/" + id;
        console.log(url);
        swal({
                title: "Apakah kamu yakin?",
                text: "Semua data siswa yang dibuat oleh akun ini akan ikut terhapus.",
                icon: "warning",
                buttons: ["Batal", "Ya"],
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal({
                        title: "Berhasil!",
                        text: "Akun berhasil dihapus!",
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

    // $('.button-show').click(function() {
    //     var id = $(this).attr("data-id");
    //     var url = "/admin/user/show/" + id;
    //     console.log(url);
    //     window.location.href = url;
    // });

    $("#save_user").on('click', function() {
        var error_name = $("#name_user").val();
        var error_username = $("#username_user").val();
        var error_password = $("#password_user").val();
        var error_kelas = $("#kelas_user").val();

        if (error_name.length <= 2) {
            swal({
                title: "Error",
                text: "Nama minimal berisi 2 karakter",
                icon: "warning",
                buttons: false,
                timer: 1500,
            });
        } else if (error_username.length <= 4) {
            swal({
                title: "Error",
                text: "Username minimal berisi 4 karakter",
                icon: "warning",
                buttons: false,
                timer: 1500,
            });
        } else if (error_password.length <= 5) {
            swal({
                title: "Error",
                text: "Password minimal berisi 5 karakter",
                icon: "warning",
                buttons: false,
                timer: 1500,
            });
        } else if (error_kelas.length < 2) {
            swal({
                title: "Error",
                text: "Kelas minimal berisi 2 karakter",
                icon: "warning",
                buttons: false,
                timer: 1500,
            });
        } else {
            var data = {
                '_token': "{{ csrf_token() }}",
                'name': $("#name_user").val(),
                'username': $("#username_user").val(),
                'kelas': $("#kelas_user").val(),
                'password': $("#password_user").val(),
            }

            $.ajax({
                url: "{{ route('user.store') }}",
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
                            window.location.href = "/admin/user";
                        }, 1000);
                    }
                },
                error: function(result) {
                    console.log(result);
                    if (result.status == 422) {
                        swal({
                            title: "Error",
                            text: "Username sudah digunakan!",
                            icon: "warning",
                            buttons: false,
                            timer: 2000,
                        });
                    }
                }
            })
        }

    });

    $("input#username_user").on({
        keydown: function(e) {
            if (e.which === 32)
                return false;
        },
        change: function() {
            this.value = this.value.replace(/\s/g, "");
        }
    });

    $("input#username").on({
        keydown: function(e) {
            if (e.which === 32)
                return false;
        },
        change: function() {
            this.value = this.value.replace(/\s/g, "");
        }
    });
</script>
@endsection