
<?php $__env->startSection('pesan', 'active'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="block-header">
        <h2>DATA PESAN</h2>
    </div>

    <div class="row clearfix">
        <div class="col-12">
            <div class="card">
                <div class="header">
                    <h2>
                        PESAN
                    </h2>
                </div>

                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="table">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 15px;">No</th>
                                    <th>Tanggal</th>
                                    <th>Dari</th>
                                    <th>Isi</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $pesan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="text-center"></td>
                                    <td><?php echo e(\Carbon\Carbon::parse($p->created_at)->translatedFormat('d F Y')); ?></td>
                                    <td><?php echo e($p->users->name); ?></td>
                                    <td><?php echo e($p->isi); ?></td>
                                    <?php if($p->status == 'true'): ?>
                                    <td>
                                        <button class="btn btn-xs btn-success waves-effect">Sudah dibaca</button>
                                    </td>
                                    <?php else: ?>
                                    <td>
                                        <form action="/admin/pesan/<?php echo e($p->id); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo e(method_field('PUT')); ?>

                                            <button class="btn btn-xs btn-primary waves-effect" type="submit">Belum dibaca</button>
                                        </form>
                                    </td>
                                    <?php endif; ?>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Downloads\pengkodean\Uang-Kas\resources\views//admin/pesan/index.blade.php ENDPATH**/ ?>