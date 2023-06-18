

<?php $__env->startSection('content'); ?>
<div class="container-me">
    <nav class="navbar navbar-light">
        <div class="container-fluid-nav text-center">
            <a class="navbar-brand text-white" href="/user">
                <span class="fa fa-arrow-left"></span>
            </a>
            <h4 class="d-inline-block text-white">Riwayat Pesan</h4>
        </div>
    </nav>

    <div class="container">
        <button class="btn btn-sm btn-primary float-right mb-2" id="button-create" data-toggle="modal" data-target="#modalCreate">
            <span class="fa fa-paper-plane"></span> Kirim Pesan
        </button>

        <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="title">Kirim Pesan Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/user/pesan/store" method="POST">
                            <?php echo csrf_field(); ?>

                            <div class="form-group row">
                                <div class="col-12">
                                    <div class="alert alert-danger" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h5 class="alert-heading">Perhatian!</h5>
                                        <ul class="alert" style="font-size: 12px;">
                                            <li>Harap menggunakan kata kata yang sopan.</li>
                                            <li>Jika ada kendala dalam menggunakan aplikasi kirim pesan keluhan anda
                                                .</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <input type="hidden" name="user_id" id="user_id" value="<?php echo e(Auth::user()->id); ?>">
                                <label class="col-12 col-form-label text-md-left">Isi Pesan anda disini.</label>
                                <div class="col-12">
                                    <textarea name="isi" id="isi" cols="30" rows="5" class="form-control" required></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <button id="save_bayar" type="submit" class="btn btn-sm btn-success float-right">
                                    <span class="fa fa-save fa-sm"></span> Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalShow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="title">Isi Pesan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <span id="isi_pesan"></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Isi</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(count($pesan) == 0): ?>
                    <tr>
                        <td colspan="3">
                            <img src="<?php echo e(asset('img/asset/3024051.jpg')); ?>" alt="" width="100%">
                            <div class="alert alert-info text-center">
                                Belum ada data!
                            </div>
                        </td>
                    </tr>
                    <?php else: ?>
                    <?php $__currentLoopData = $pesan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e(\Carbon\Carbon::parse($p->created_at)->translatedFormat('d F Y')); ?></td>
                        <td>
                            <button class="btn btn-sm btn-primary button-show" data-toggle="modal" data-target="#modalShow" data-id="<?php echo e($p->id); ?>">
                                <span class="fa fa-info"></span>
                            </button>
                        </td>
                        <td>
                            <?php if($p->status == "true"): ?> <span class="badge badge-success">Dilihat</span>
                            <?php else: ?>
                            <span class="badge badge-warning">Belum dilihat</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
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
    $('.button-show').on('click', function() {
        $('#modal').modal('toggle');
        var id = $(this).attr("data-id");
        var url = "/user/get_data_pesan/" + id;
        $.ajax({
            url: url,
            cache: false,
            success: function(result) {
                console.log(result)
                $('#isi_pesan').html(result.isi);
            }
        })
    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Downloads\pengkodean\Uang-Kas\resources\views//user/pesan/index.blade.php ENDPATH**/ ?>