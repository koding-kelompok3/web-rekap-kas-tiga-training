<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Cetak Laporan Kas Masuk Kelas {{ Auth::user()->kelas }}</title>

    <style>
        .header-text {
            font-size: 25px;
            font-weight: bold;
        }

        .total {
            background-color: #bab6b9;
        }

        .right-top {
        position: absolute;
        top: -10;
        right: 0;
         }
        
    </style>
</head>

<body>

    <div class="container-fluid">

        <div class="row">
            <div class="col-8">
                <span class="header-text">LAPORAN KAS MASUK</span> <br>
                <small>TIGA TRAINING</small>
            </div>
            <div class="col-4 right-top">
                <img src="{{ public_path('img/asset/logo3training.jpg') }}" width="100px" height="100px" class="right-top">
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-7">
                Nama Pencetak &nbsp; : {{ Auth::user()->name }} <br>
                Nama Siswa &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <b>{{ $siswa->nama_siswa }}</b>
            </div>

            <div class="col-5 float-right">
                <span class="float-right">Tanggal Cetak &nbsp; : {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</span> <br>
                <span class=""> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kelas &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{ Auth::user()->kelas }}</span>
            </div>
        </div>

        <br><br><br>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 20px;">No</th>
                    <th>Tanggal Bayar</th>
                    <th>Nominal</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1; @endphp
                @foreach($kas_masuk as $k)
                <tr>
                    <td class="text-center">{{ $i ++ }}</td>
                    <td>{{ \Carbon\Carbon::parse($k->created_at)->translatedFormat('d F Y') }}</td>
                    <td>Rp {{ number_format($k->bayar, 0, ',', '.') }}</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="2" class="text-center">Nominal Masuk</td>
                    <td>Rp {{ number_format($kas_masuk->sum('bayar'), 0, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>

        <br><br>

        <div class="col-8"></div>
        <div class="col-4 float-right">
            <span class="float-right">Mengetahui</span>
            <br><br><br><br>
            <span class="float-right">Wali Kelas</span>
        </div>

    </div>

</body>

</html>