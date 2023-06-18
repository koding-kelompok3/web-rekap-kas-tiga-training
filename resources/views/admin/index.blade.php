@extends('layouts.admin')
@section('dashboard', 'active')
@section('content')

<div class="container-fluid">
    <div class="block-header">
        <h2>DASHBOARD</h2>
    </div>

    <!-- Widgets -->
    <div class="row clearfix">
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="info-box bg-brown hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">account_box</i>
                </div>
                <div class="content">
                    <div class="text">BENDAHARA</div>
                    <div class="number count-to" data-from="0" data-to="{{ $bendahara }}" data-speed="1000" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="info-box bg-grey hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">account_box</i>
                </div>
                <div class="content">
                    <div class="text">SISWA</div>
                    <div class="number count-to" data-from="0" data-to="{{ $siswa }}" data-speed="1000" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="info-box bg-yellow hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">forum</i>
                </div>
                <div class="content">
                    <div class="text">PESAN</div>
                    <div class="number count-to" data-from="0" data-to="{{ $pesan }}" data-speed="1000" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="info-box bg-orange hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">account_balance_wallet</i>
                </div>
                <div class="content">
                    <div class="text">TOTAL KAS MASUK <small style="font-size: 9px;">(SEMUA KELAS)</small></div>
                    <div class="number">Rp. {{ number_format($masuk, 0, ',', '.') }}</div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="info-box bg-lime hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">account_balance_wallet</i>
                </div>
                <div class="content">
                    <div class="text">TOTAL KAS KELUAR <small style="font-size: 9px;">(SEMUA KELAS)</small></div>
                    <div class="number">Rp. {{ number_format($keluar, 0, ',', '.') }}</div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Widgets -->
</div>

@endsection