
<?php $__env->startSection('pengaturan-akun', 'active'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">

    <div class="row clearfix">
        <div class="col-sm-8">
            <div class="card">
                <div class="header">
                    <h2>
                        PENGATURAN AKUN
                    </h2>
                </div>

                <div class="body">
                    <form action="/admin/akun/update/<?php echo e(Auth::user()->id); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo e(method_field('PUT')); ?>

                        <div class="form-group">
                            <label>Nama</label>
                            <div class="form-line">
                                <input type="text" name="name" class="form-control" value="<?php echo e(Auth::user()->name); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Username</label>
                            <div class="form-line">
                                <input id="username" type="text" name="username" class="form-control" value="<?php echo e(Auth::user()->username); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Foto</label>
                            <div class="form-line">
                                <img id="foto" width="40%" src="<?php echo e(asset('img/user/'.Auth::user()->foto)); ?>">
                                <input type="file" name="foto" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-success pull-right" type="submit">Simpan</button>
                            <br>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card">
                <div class="header">
                    <h2>
                        UBAH PASSWORD
                    </h2>
                </div>

                <div class="body">
                    <form action="/admin/akun/password/<?php echo e(Auth::user()->id); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo e(method_field('PUT')); ?>


                        <div class="form-group">
                            <label>Password Baru</label>
                            <div class="form-line">
                                <input type="password" name="new_password" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-success pull-right" type="submit">Simpan</button>
                            <br>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
<script>
    $("input#username").on({
        keydown: function(e) {
            if (e.which === 32)
                return false;
        },
        change: function() {
            this.value = this.value.replace(/\s/g, "");
        }
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Downloads\pengkodean\Uang-Kas\resources\views/admin/akun/setting.blade.php ENDPATH**/ ?>