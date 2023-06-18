

<?php $__env->startSection('setting', 'active-nav'); ?>
<?php $__env->startSection('content'); ?>

<div class="container-me">
    <nav class="navbar navbar-light">
        <div class="container-fluid-nav text-center">
            <a class="navbar-brand text-white" href="/admin">
                <span class="fa fa-arrow-left"></span>
            </a>
            <h4 class="d-inline-block text-white">Pengaturan Akun</h4>
        </div>
    </nav>
    </nav>

    <div class="container">

        <form action="<?php echo e(route('update.akun.user', Auth::user()->id)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo e(method_field('PUT')); ?>

            <div class="card">
                <div class="card-body shadow">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="name" class="form-control" value="<?php echo e(Auth::user()->name); ?>">
                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-danger invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" value="<?php echo e(Auth::user()->username); ?>"
                            readonly>
                    </div>

                    <div class="form-group">
                        <label>Level</label>
                        <input type="text" name="level" class="form-control" value="<?php echo e(Auth::user()->level); ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label>Foto</label>
                        <br>
                        <?php if(Auth::user()->foto == ''): ?>
                        <img src="<?php echo e(asset('img/user/default.png')); ?>" width="50%" height="50%">
                        <?php else: ?>
                        <img src="<?php echo e(asset('img/user/'.Auth::user()->foto)); ?>" width="50%" height="50%">
                        <?php endif; ?>

                        <input type="file" name="foto" class="uploads form-control" accept=".jpg, .png, .jpeg">

                        <?php $__errorArgs = ['foto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-danger invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="form-group">
                        <button id="save" type="submit" class="btn btn-success btn-sm float-right">
                            <span class="fa fa-save"></span> Simpan
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="container">
        &nbsp;
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

</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/sweetalert.min.js')); ?>"></script>
<script>
    $("#save").on('click', function () {
        swal({
            title: 'Berhasil!',
            text: 'Akun berhasil diupdate.',
            icon: 'success',
            buttons: false,
            timer: 1500,
        });
    });

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Downloads\pengkodean\Uang-Kas\resources\views/user/akun/setting.blade.php ENDPATH**/ ?>