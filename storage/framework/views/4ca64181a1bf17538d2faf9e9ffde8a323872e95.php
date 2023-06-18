
<?php $__env->startSection('pengguna', 'active'); ?>
<?php $__env->startSection('siswa', 'active'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="block-header">
        <h2>DATA SISWA</h2>
    </div>

    <div class="row clearfix">
        <div class="col-12">
            <div class="card">
                <div class="header">
                    <h2>
                        DATA SEMUA SISWA
                    </h2>
                    <small class="pull-right">Total siswa : <?php echo e($siswa); ?> siswa</small>
                </div>

                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="table">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 20px;">No</th>
                                    <th>Kelas</th>
                                    <th style="width: 300px;">Nama Bendahara</th>
                                    <th>Tanggal ditambahkan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="text-center"></td>
                                    <td>
                                        <a href="/admin/siswa/<?php echo e($u->id); ?>">
                                            <?php echo e($u->kelas); ?>

                                        </a>
                                    </td>
                                    <td><?php echo e($u->name); ?></td>
                                    <td><?php echo e(\Carbon\Carbon::parse($u->created_at)->translatedFormat('d F Y')); ?></td>
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

<?php $__env->startSection('js'); ?>
<script>
    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Downloads\pengkodean\Uang-Kas\resources\views/admin/siswa/index.blade.php ENDPATH**/ ?>