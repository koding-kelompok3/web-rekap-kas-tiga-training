@extends('layouts.user')
@section('home', 'active-nav')
@section('content')

<div class="container-me">

    <div class="img-1">
        <nav class="navbar">
            <a class="navbar-brand" href="#">UANG KAS | {{ Auth::user()->kelas }}</a>
            <div class="nav-item dropdown">
                <a class="image-user" href="#">
                    @if(Auth::user()->foto == '')
                    <img src="{{ asset('img/user/default.png') }}" class="image" alt="">
                    @else
                    <img src="{{ asset('img/user/'.Auth::user()->foto) }}" class="image" alt="">
                    @endif
                </a>

            </div>
        </nav>
    </div>

    <div class="img-2"></div>

    <div class="container justify-content-center">
        <div class="card shadow">
            <div class="card-body">
                <div class="mt-1">
                    <div class="row">
                        <div class="col-8">
                            <span class="auth_name">Selamat Datang, {{ Auth::user()->name }}!</span>
                        </div>
                        <div class="col-4">
                            <span class="clock">
                                <span id="jam"></span> :
                                <span id="menit"></span> :
                                <span id="detik"></span>
                            </span>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="menu-icon">
                    <div class="row text-center">

                        <div class="col-4">
                            <a href="/user/pesan">
                                <div class="card-body button-action shadow-sm">
                                    <span class="fa fa-envelope-open-text fa-2x"></span>
                                    <div class="text-mini mt-1">Pesan</div>
                                </div>
                            </a>
                        </div>

                        <div class="col-4">
                            <a href="/user/riwayat">
                                <div class="card-body button-action shadow-sm">
                                    <span class="fa fa-history fa-2x"></span>
                                    <div class="text-mini mt-1">Riwayat</div>
                                </div>
                            </a>
                        </div>

                        <div class="col-4">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                <div class="card-body button-action shadow-sm">
                                    <span class="fa fa-sign-out-alt fa-2x"></span>
                                    <div class="text-mini mt-1">Logout</div>
                                </div>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="info">
            <div class="card shadow">
                <div class="card-body">
                    <span class="fa fa-coins"></span> &nbsp; Kas Masuk dan Kas Keluar
                    <hr>
                    <div class="info-data mt-3">
                        <div class="row">
                            <div class="col-6 col-md-6">
                                <a href="/user/pembayaran/masuk">
                                    <div class="card-counter infor">
                                        <span class="count-numbers">Rp.
                                            {{ number_format($masuk, 0, ',', '.') }}</span>
                                        <span class="count-name">Masuk</span>
                                    </div>
                                </a>
                            </div>

                            <div class="col-6 col-md-6">
                                <a href="/user/pembayaran/keluar">
                                    <div class="card-counter primary">
                                        <span class="count-numbers">Rp.
                                            {{ number_format($keluar, 0, ',', '.') }}</span>
                                        <span class="count-name">Keluar</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="info">
            <div class="card shadow">
                <div class="card-body">
                    <span class="fa fa-video"></span> &nbsp; Multimedia
                    <hr>
                    <div class="info-data mt-3">
                        <div class="video">
                            @foreach($multimedia as $m)
                            <iframe src="https://www.youtube.com/embed/{{ $m->video }}" width="100%"></iframe>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-bottom">
        &nbsp;
    </div>

</div>

@endsection

@section('css')
<style>
    .video {
        overflow: auto;
        white-space: nowrap;
    }

    .video iframe {
        display: inline-block;
        margin-right: 20px;
    }

    .container-bottom {
        margin-top: 20px;
    }

    .container-me {
        margin: 0;
        padding: 0;
    }

    .img-1 {
        width: 100%;
        height: 250px;
        background-color: #ffa942;
    }

    .img-2 {
        width: 100%;
        background-color: orange;
        background-attachment: fixed;
    }

    .image-user {
        margin: 15px;
    }

    .card {
        margin-top: -150px;
    }

    .auth_name {
        float: left;
    }

    .clock {
        float: right;
    }

    .navbar-brand {
        text-decoration: none;
        color: black;
    }

    .nav-item:active {
        background: none;
    }

    .image {
        width: 50px;
        height: 50px;
        border-radius: 50px;
    }

    .text-mini {
        font-size: 9px;
    }

    .card-body {
        border-radius: 5px;
        border: 1px;
    }

    .button-action:active {
        transform: scale(0.8);
    }

    .info {
        margin-top: 170px;
        width: 100%;
    }

    .info-data a {
        text-decoration: none;
        color: black;
    }

    /* Card Count */

    .card-counter {
        box-shadow: 2px 2px 10px #DADADA;
        margin: 5px;
        padding: 20px 10px;
        background-color: #fff;
        height: 100px;
        border-radius: 5px;
        transition: .3s linear all;
    }

    .card-counter .count-numbers {
        position: absolute;
        right: 35px;
        top: 20px;
        font-size: 32px;
        display: block;
    }

    .card-counter .count-name {
        position: absolute;
        float: left;
        text-transform: capitalize;
        opacity: 0.5;
        display: block;
        font-size: 18px;
    }

    .card-counter.infor {
        background-color: #ffd9ae;
        color: #7f4400;
    }

    .card-counter.primary {
        background-color: #fff1e1;
        color: #7f4400;
    }

    @media screen and (max-width: 500px) {
        .card-counter .count-numbers {
            font-size: 18px;
            margin-top: 40px;
        }

        .card-counter .count-name {
            font-size: 14px;
        }
    }
</style>
@endsection

@section('js')
<script>
    window.setTimeout("waktu()", 1000);

    function waktu() {
        var tanggal = new Date();
        setTimeout("waktu()", 1000);
        document.getElementById("jam").innerHTML = tanggal.getHours();
        document.getElementById("menit").innerHTML = tanggal.getMinutes();
        document.getElementById("detik").innerHTML = tanggal.getSeconds();
    }
</script>
@endsection