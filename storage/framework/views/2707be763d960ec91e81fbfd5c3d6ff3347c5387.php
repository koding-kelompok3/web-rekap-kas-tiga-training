
<?php $__env->startSection('pengguna', 'active'); ?>
<?php $__env->startSection('siswa', 'active'); ?>

<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <div class="block-header">
        <h2>DATA SISWA</h2>
    </div>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        DATA SISWA KELAS : <?php echo e($user->kelas); ?>

                        <small>Nama Bendahara : <?php echo e($user->name); ?></small>
                    </h2>
                    <small class="pull-right">Total siswa : <?php echo e(count($siswa)); ?> siswa</small>
                </div>

                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="table">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 20px;">No</th>
                                    <th>Nama</th>
                                    <th>JK</th>
                                    <th>Tanggal Lahir</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $siswa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="text-center"><?php echo e($key + 1); ?></td>
                                    <td><?php echo e($u->nama_siswa); ?></td>
                                    <td><?php echo e($u->jk == 'L' ? "Laki Laki" : "Perempuan"); ?></td>
                                    <td><?php echo e(\Carbon\Carbon::parse($u->tanggal_lahir)->translatedFormat('d F Y')); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Downloads\pengkodean\Uang-Kas\resources\views/admin/siswa/show.blade.php ENDPATH**/ ?>