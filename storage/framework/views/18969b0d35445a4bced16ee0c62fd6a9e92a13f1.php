
<?php $__env->startSection('multimedia', 'active'); ?>
<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <div class="block-header">
        <h2>MULTIMEDIA</h2>
    </div>

    <div class="row clearfix">
        <div class="col-12">
            <div class="card">
                <div class="header">
                    <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#modalCreate">Tambah Data</button>
                    <h2>DATA MULTIMEDIA</h2>
                </div>

                <div class="body">
                    <div class="row">
                        <?php if(count($multimedia) == 0): ?>
                        <div class="container">
                            <div class="alert bg-blue">
                                <center>
                                    Belum ada video.
                                </center>
                            </div>
                        </div>
                        <?php else: ?>
                        <?php $__currentLoopData = $multimedia; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="body">
                                    <iframe src="https://www.youtube.com/embed/<?php echo e($m->video); ?>" width="100%"></iframe>

                                    <button type="button" data-id="<?php echo e($m->id); ?>" class="button-delete btn btn-xs pull-right btn-danger waves-effect">
                                        <i class="material-icons">delete_forever</i>
                                    </button>

                                    <h4><?php echo e($m->judul); ?></h4>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title">Tambah Multimedia</h5>
                </div>
                <div class="modal-body">
                    <form action="/admin/multimedia/store" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="col-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="judul" class="form-control" placeholder="Judul">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="video" class="form-control" placeholder="Link video. contoh: https://www.youtube.com/watch?v=766qmHTc2ro">
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <button id="save_user" class="btn btn-sm btn-success float-right">Simpan</button>
                            <button class="btn btn-sm btn-default" data-dismiss="modal">Batal</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/sweetalert.min.js')); ?>"></script>
<script>
    $(".button-delete").click(function() {
        var id = $(this).attr("data-id");
        var url = "/admin/multimedia/delete/" + id;
        console.log(url);
        swal({
                title: "Apakah kamu yakin?",
                text: "Video ini akan terhapus.",
                icon: "warning",
                buttons: ["Batal", "Ya"],
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal({
                        title: "Berhasil!",
                        text: "Video berhasil dihapus!",
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
<?php echo $__env->make('layouts/admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Downloads\pengkodean\Uang-Kas\resources\views/admin/multimedia/index.blade.php ENDPATH**/ ?>