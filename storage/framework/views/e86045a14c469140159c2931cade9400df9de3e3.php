
<?php $__env->startSection('bayar', 'active-nav'); ?>

<?php $__env->startSection('content'); ?>

<div class="container-me">
    <nav class="navbar navbar-light">
        <div class="container-fluid-nav text-center">
            <a class="navbar-brand text-white" href="/user/pembayaran">
                <span class="fa fa-arrow-left"></span>
            </a>
            <h4 class="d-inline-block text-white">Riwayat Pembayaran</h4>
        </div>
    </nav>

    <div class="container">
        <div class="form-group">
            <label>Nama Siswa</label>
            <input type="text" value="<?php echo e($siswa->nama_siswa); ?>" disabled readonly class="form-control">
        </div>

        <a href="/user/pembayaran/<?php echo e($siswa->id); ?>/kas-masuk-siswa/cetak_pdf" class="btn btn-primary btn-sm float-right" target="_blank">
            <span class="fa fa-download"></span> Cetak PDF
        </a>

        <div class="table-responsive">
            <table class="table table-hover mt-3">
                <thead>
                    <tr>
                        <th style="width: 30px;" class="text-center">#</th>
                        <th>Bayar</th>
                        <th>Tanggal</th>
                        <th style="width: 160px;">Waktu</th>
                        <!-- <th style="width: 50px;">Aksi</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php if(count($bayar) == 0): ?>
                    <tr>
                        <td colspan="5">
                            <img src="<?php echo e(asset('img/asset/3024051.jpg')); ?>" alt="" width="100%">
                            <div class="alert alert-info text-center">
                                Belum ada data!
                            </div>
                        </td>
                    </tr>
                    <?php else: ?>
                    <?php $__currentLoopData = $bayar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="text-center"><?php echo e($key + 1); ?></td>
                        <td>Rp. <?php echo e(number_format($b->bayar, 0, ',', '.')); ?></td>
                        <td><?php echo e(\Carbon\Carbon::parse($b->created_at)->translatedFormat('d F Y')); ?></td>
                        <td><?php echo e(\Carbon\Carbon::parse($b->created_at)->diffForHumans()); ?></td>
                        <td>
                            <!-- <a href="javascript:void(0)" class="btn btn-sm btn-danger button-delete"
                                data-id="<?php echo e($b->id); ?>">
                                <span class="fa fa-trash fa-sm"></span>
                            </a> -->
                        </td>
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

<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/sweetalert.min.js')); ?>"></script>
<script>
    $(".button-delete").on('click', function() {
        var id = $(this).attr("data-id");
        var url = "/user/pembayaran/delete/" + id;
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
                        text: "Pembayaran berhasil dihapus!",
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
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Downloads\pengkodean\Uang-Kas\resources\views//user/pembayaran/show.blade.php ENDPATH**/ ?>