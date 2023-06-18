<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Uang Kas TIGA TRAINING</title>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Poppins';
            background-color: #FFFFFF;
            color: black;
        }

        .color-ffecd5 {
            background-color: #ffecd5;
        }

        /* Button Masuk */
        .color-ffa942 {
            background-color: #ffa942;
            color: white;
            border-radius: 40px;
            padding-left: 30px;
            padding-right: 30px;
            padding-top: 3px;
            padding-bottom: 5px;
            border: 0;
        }

        .color-ffa942 span {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
            font-size: 14px;
        }

        .color-ffa942 span:after {
            content: '\00bb';
            position: absolute;
            opacity: 0;
            top: 0;
            right: -20px;
            transition: 0.5s;
        }

        .color-ffa942:hover span {
            padding-right: 25px;
        }

        .color-ffa942:active {
            border: none;
            background-color: none;
        }

        .color-ffa942:hover span:after {
            opacity: 1;
            right: 0;
        }

        /* END */

        .content {
            margin-top: 50px;
        }

        .color-fff1e1 {
            background-color: #fff1e1;
        }

        .text {
            margin-top: 60px;
            color: black;
            margin-bottom: 30px;
        }

        .card-content {
            background-color: #ffa942;
            padding: 10px;
            border-radius: 12px;
            /* width: 70%; */
            margin: 10px;
        }

        .text-content {
            color: black;
            margin-left: 10px;
            margin-top: 5px;
        }

        .footer {
            padding: 20px;
        }

        @media(max-width: 670px) {
            h3 {
                font-size: 20px;
            }

            h5 {
                font-size: 14px;
            }

            .text {
                font-size: 24px;
            }

            .icon {
                width: 42px;
                margin-right: 8px;
            }

            .text-content {
                margin-top: 5px;
            }

        }
    </style>
</head>

<body>
    <nav class="navbar navbar-light color-ffecd5">
        <a class="navbar-brand text-black" href="#">UANG KAS TIGA TRAINING</a>

        <a class="navbar-brand float-right" href="/login">
            <button class="color-ffa942">
                <span>MASUK</span>
            </button>
        </a>
    </nav>

    <div class="">
        <small></small>
    </div>

    <div class="container-fluid mt-4">
        <h3 class="text-center">REKAP TIGA TRAINING</h3>
        <div class="row content">
            <div class="col-sm-6">
                <h5>Tiga Traning adalah sebuah acara webinar nasional yang fokusnya membahas pada bidang seputar dunia ekononomi,
                    yaitu finance, audit, dan perpajakan.</h5>
                <br>
                <h5>Aplikasi Rekap Kas ini dibuat untuk membantu bendahara acara dalam hal mencatat setiap pemasukan dan pengeluaran uang
                    yang terkumpul selama acara berlangsung dan sebagai bentuk transparasi dari keuangan acara.</h5>
            </div>
            <div class="col-sm-6">
            <img src="https://img.freepik.com/free-photo/3d-illustration-hand-with-money-white_107791-16380.jpg?w=900&t=st=1685460309~exp=1685460909~hmac=66a02537105d960b4132c9e9655cddc3592dc00a9361bfcff1403f3711b6b7e1" alt="Gambar 1" width="70%">
            </div>
        </div>

        <div class="row color-fff1e1">
            <div class="col-sm-7">
                <img src="<?php echo e(asset('img/home/bg-new.png')); ?>" width="70%">
            </div>
            <div class="col-sm-5">
                <h2 class="text">FITUR YANG ADA</h2>
                <div class="card-content row">
                    <div class="col-2">
                        <img class="icon" src="<?php echo e(asset('img/home/icon/4.png')); ?>"width="100%">
                    </div>
                    <div class="col-10">
                        <h5 class="text-content">Mengelola Uang Kas secara digital.</h5>
                    </div>
                </div>

                <div class="card-content row">
                    <div class="col-2">
                        <img class="icon" src="<?php echo e(asset('img/home/icon/5.png')); ?>"width="100%">
                    </div>
                    <div class="col-10">
                        <h5 class="text-content">Melihat Laporan Uang Kas masuk/keluar.</h5>
                    </div>
                </div>

                <div class="card-content row mb-5">
                    <div class="col-2">
                        <img class="icon" src="<?php echo e(asset('img/home/icon/6.png')); ?>"width="100%">
                    </div>
                    <div class="col-10">
                        <h5 class="text-content">Mengelola arus uang kas secara tersusun dan praktis.</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer text-center">
            <h5>Oleh TIGA TRAINING; 
                Agatha, Altsa, Tsuraya, Putrintan</h5>
        </div>
    </div>

    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
</body>

</html><?php /**PATH C:\Users\User\Downloads\pengkodean\Uang-Kas\resources\views/welcome.blade.php ENDPATH**/ ?>