<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Cetak Laporan Kas Masuk</title>

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
                <span class="header-text">LAPORAN KAS MASUK</span> <small>(Semua)</small> <br>
                <small>TIGA TRAINING</small>
            </div>
            <div class="col-4 right-top">
                <img src="<?php echo e(public_path('img/asset/logo3training.jpg')); ?>" width="100px" height="100px" class="right-top">
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-8">
                Nama Pencetak : <?php echo e(Auth::user()->name); ?>

            </div>

            <div class="col-4 float-right">
                <span>Tanggal &nbsp; : <?php echo e(\Carbon\Carbon::now()->translatedFormat('d F Y')); ?></span>
            </div>
        </div>

        <br><br><br>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 20px;">No</th>
                    <th>Nama Siswa</th>
                    <th>Tanggal Bayar</th>
                    <th>Nominal</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php $__currentLoopData = $kas_masuk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="text-center"><?php echo e($i ++); ?></td>
                    <td><?php echo e($k->nama_siswa); ?></td>
                    <td><?php echo e(\Carbon\Carbon::parse($k->created_at)->translatedFormat('d F Y')); ?></td>
                    <td>Rp <?php echo e(number_format($k->bayar, 0, ',', '.')); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td colspan="3" class="text-center">Nominal Masuk</td>
                    <td>Rp <?php echo e(number_format($total_masuk, 0, ',', '.')); ?></td>
                </tr>
            </tbody>
        </table>

    </div>

</body>

</html><?php /**PATH C:\Users\User\Downloads\pengkodean\Uang-Kas\resources\views/admin/pembayaran/all-kas-masuk-pdf.blade.php ENDPATH**/ ?>