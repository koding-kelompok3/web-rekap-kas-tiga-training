
<?php $__env->startSection('bayar', 'active-nav'); ?>

<?php $__env->startSection('content'); ?>

<div class="container-me">
    <nav class="navbar navbar-light">
        <div class="container-fluid-nav text-center">
            <a class="navbar-brand text-white" href="/user">
                <span class="fa fa-arrow-left"></span>
            </a>
            <h4 class="d-inline-block text-white">Pembayaran Masuk</h4>
        </div>
    </nav>

    <div class="container">
        <a href="/user/pembayaran/kas-masuk/cetak_pdf" class="btn btn-primary btn-sm float-right" target="_blank">
            <span class="fa fa-download"></span> Cetak PDF
        </a>
        <div class="table-responsive">
            <br>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th style="width: 20px;">#</th>
                        <th>Masuk</th>
                        <th>Siswa</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(count($masuk) == 0): ?>
                    <tr>
                        <td colspan="4">
                            <img src="<?php echo e(asset('img/asset/3024051.jpg')); ?>" alt="" width="100%">
                            <div class="alert alert-info text-center">
                                Belum ada data!
                            </div>
                        </td>
                    </tr>
                    <?php else: ?>
                    <?php $__currentLoopData = $masuk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($key + 1); ?></td>
                        <td>Rp. <?php echo e(number_format($m->bayar, 0, ',', '.')); ?></td>
                        <td><?php echo e($m->nama_siswa); ?></td>
                        <td><?php echo e(\Carbon\Carbon::parse($m->created_at)->translatedFormat('d F Y')); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Downloads\pengkodean\Uang-Kas\resources\views/user/pembayaran/masuk.blade.php ENDPATH**/ ?>