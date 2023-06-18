@extends('layouts.user')

@section('setting', 'active-nav')
@section('content')

<div class="container-me">
    <nav class="navbar navbar-light">
        <div class="container-fluid-nav text-center">
            <a class="navbar-brand text-white" href="/admin">
                <span class="fa fa-arrow-left"></span>
            </a>
            <h4 class="d-inline-block text-white">Pengaturan Akun</h4>
        </div>
    </nav>
    </nav>

    <div class="container">

        <form action="{{ route('update.akun.user', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}
            <div class="card">
                <div class="card-body shadow">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}">
                        @error('name')
                        <span class="text-danger invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" value="{{ Auth::user()->username }}"
                            readonly>
                    </div>

                    <div class="form-group">
                        <label>Level</label>
                        <input type="text" name="level" class="form-control" value="{{ Auth::user()->level }}" readonly>
                    </div>

                    <div class="form-group">
                        <label>Foto</label>
                        <br>
                        @if(Auth::user()->foto == '')
                        <img src="{{ asset('img/user/default.png') }}" width="50%" height="50%">
                        @else
                        <img src="{{ asset('img/user/'.Auth::user()->foto) }}" width="50%" height="50%">
                        @endif

                        <input type="file" name="foto" class="uploads form-control" accept=".jpg, .png, .jpeg">

                        @error('foto')
                        <span class="text-danger invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button id="save" type="submit" class="btn btn-success btn-sm float-right">
                            <span class="fa fa-save"></span> Simpan
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="container">
        &nbsp;
    </div>

</div>

@endsection

@section('css')
<style>
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

</style>
@endsection

@section('js')
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
<script>
    $("#save").on('click', function () {
        swal({
            title: 'Berhasil!',
            text: 'Akun berhasil diupdate.',
            icon: 'success',
            buttons: false,
            timer: 1500,
        });
    });

</script>
@endsection
