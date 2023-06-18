

<?php $__env->startSection('content'); ?>
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
            <?php if(count($riwayat) == 0): ?>
            <button id="delete_all" class="btn btn-danger btn-sm" disabled>
                <span class="fa fa-trash fa-sm"></span> Hapus Riwayat
            </button>
            <?php else: ?>
            <button id="delete_all" class="btn btn-danger btn-sm">
                <span class="fa fa-trash fa-sm"></span> Hapus Riwayat
            </button>
            <?php endif; ?>
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
                    <?php if(count($riwayat) == 0): ?>
                    <tr>
                        <td colspan="2">
                            <img src="<?php echo e(asset('img/asset/3024051.jpg')); ?>" alt="" width="100%">
                            <div class="alert alert-info text-center">
                                Belum ada data!
                            </div>
                        </td>
                    </tr>
                    <?php else: ?>
                    <?php $__currentLoopData = $riwayat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <?php $date = $r->created_at; ?>
                        <td><?php echo e($date->locale('id')->isoFormat('dddd, MMMM Y - HH:mm')); ?></td>
                        <td><?php echo e($r->riwayat); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </tbody>
            </table>
            <?php echo e($riwayat->links()); ?>

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

<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/sweetalert.min.js')); ?>"></script>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Downloads\pengkodean\Uang-Kas\resources\views/user/riwayat/index.blade.php ENDPATH**/ ?>