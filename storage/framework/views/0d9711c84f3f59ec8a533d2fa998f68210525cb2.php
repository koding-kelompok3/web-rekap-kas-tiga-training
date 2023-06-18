
<?php $__env->startSection('pembayaran', 'active'); ?>
<?php $__env->startSection('kas-keluar', 'active'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="block-header">
        <h2>DATA PEMBAYARAN KELUAR</h2>
    </div>

    <div class="row clearfix">
        <div class="col-sm-8">
            <div class="card">
                <div class="header">
                    <a href="/admin/kas/keluar/cetak_kas_keluar" style="color: white;" class="btn btn-primary pull-right" target="_blank">Cetak PDF</a>
                    <h2>
                        DATA PEMBAYARAN KELUAR
                    </h2>
                </div>

                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="table">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 20px;">No</th>
                                    <th>Nama Bendahara</th>
                                    <th>Keterangan</th>
                                    <th>Bukti</th>
                                    <th>Keluar</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $kas_keluar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="text-center"></td>
                                    <td><?php echo e($k->name); ?></td>
                                    <td><?php echo e($k->ket); ?></td>
                                    <td><img src="<?php echo e(asset('img/bukti/'.$k->bukti)); ?>" width="100px" height="100px"></td>
                                    <td>Rp <?php echo e(number_format($k->bayar, 0, ',', '.')); ?></td>
                                    <td><?php echo e(\Carbon\Carbon::parse($k->created_at)->translatedFormat('d F Y')); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="header">
                    <h2>
                        DETAIL PER KELAS
                        <small>Klik untuk melihat data pembayaran per kelas</small>
                    </h2>
                </div>

                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="table">
                            <thead>
                                <tr>
                                    <th>Nama Bendahara</th>
                                    <th>Kelas</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <a href="/admin/pembayaran/keluar/<?php echo e($u->id); ?>"><?php echo e($u->name); ?></a>
                                    </td>
                                    <td><?php echo e($u->kelas); ?></td>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Downloads\pengkodean\Uang-Kas\resources\views//admin/pembayaran/keluar.blade.php ENDPATH**/ ?>