
<?php $__env->startSection('riwayat', 'active'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="block-header">
        <h2>DATA RIWAYAT</h2>
    </div>

    <div class="row clearfix">
        <div class="col-12">
            <div class="card">
                <div class="header">
                    <h2>
                        RIWAYAT
                    </h2>
                </div>

                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="table">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 20px;">No</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $riwayat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="text-center"></td>
                                    <td><?php echo e(\Carbon\Carbon::parse($r->created_at)->translatedFormat('d F Y')); ?></td>
                                    <td><?php echo e($r->riwayat); ?></td>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Downloads\pengkodean\Uang-Kas\resources\views/admin/riwayat/index.blade.php ENDPATH**/ ?>