@extends('layouts.user')

@section('content')
<div class="container-me">
    <nav class="navbar navbar-light">
        <div class="container-fluid-nav text-center">
            <a class="navbar-brand text-white" href="/user">
                <span class="fa fa-arrow-left"></span>
            </a>
            <h4 class="d-inline-block text-white">Riwayat</h4>
        </div>
    </nav>

    <div class="container">
        <!-- <div class="float-right mb-2">
            @if(count($riwayat) == 0)
            <button id="delete_all" class="btn btn-danger btn-sm" disabled>
                <span class="fa fa-trash fa-sm"></span> Hapus Riwayat
            </button>
            @else
            <button id="delete_all" class="btn btn-danger btn-sm">
                <span class="fa fa-trash fa-sm"></span> Hapus Riwayat
            </button>
            @endif
        </div> -->
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Riwayat</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($riwayat) == 0)
                    <tr>
                        <td colspan="2">
                            <img src="{{ asset('img/asset/3024051.jpg') }}" alt="" width="100%">
                            <div class="alert alert-info text-center">
                                Belum ada data!
                            </div>
                        </td>
                    </tr>
                    @else
                    @foreach($riwayat as $r)
                    <tr>
                        <?php $date = $r->created_at; ?>
                        <td>{{ $date->locale('id')->isoFormat('dddd, MMMM Y - HH:mm') }}</td>
                        <td>{{ $r->riwayat }}</td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
            {{ $riwayat->links() }}
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
    $("#delete_all").on('click', function() {
        swal({
                icon: 'warning',
                title: 'Apakah anda yakin?',
                text: 'Riwayat tidak akan bisa dipulihkan setelah dihapus.',
                buttons: ['Batal', 'Ya'],
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal({
                        icon: 'success',
                        title: 'Sukses!',
                        text: 'Riwayat berhasil dihapus.',
                        timer: 1500,
                        buttons: false,
                    });
                    setTimeout(function() {
                        window.location.href = '/user/riwayat/delete_all';
                    }, 1000);
                }
            })
    });
</script>
@endsection