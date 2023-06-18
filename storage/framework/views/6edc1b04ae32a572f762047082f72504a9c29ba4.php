<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UANGKHAS | <?php echo e(Auth::user()->kelas); ?></title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('fontawesome/css/all.css')); ?>">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <?php echo $__env->yieldContent('css'); ?>

    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            margin: 0 0 55px 0;
            font-family: 'Poppins';
            color: #505050;
        }

        .nav-bar {
            position: fixed;
            bottom: 0;
            width: 100%;
            height: 55px;
            box-shadow: 0 0 3px rgba(0, 0, 0, 0.2);
            background-color: #ffffff;
            display: flex;
            overflow-x: auto;
        }

        .nav-link {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            flex-grow: 1;
            min-width: 50px;
            overflow: hidden;
            white-space: nowrap;
            font-family: sans-serif;
            font-size: 13px;
            color: #444444;
            text-decoration: none;
            -webkit-tap-highlight-color: transparent;
            transition: background-color 0.1s ease-in-out;
        }

        .nav-link:hover {
            background-color: #eeeeee;
        }

        .active-nav {
            background-color: #eeeeee;
        }

        .nav-icon {
            font-size: 18px;
        }
    </style>
</head>

<body>
    <nav class="nav-bar fixed-bottom">
        <a href="/user" class="nav-link <?php echo $__env->yieldContent('home'); ?>">
            <span class="fa fa-home"></span>
            <span class="nav__text">Beranda</span>
        </a>
        <a href="/user/siswa" class="nav-link <?php echo $__env->yieldContent('siswa'); ?>">
            <span class="fa fa-users"></span>
            <span class="nav__text">Siswa</span>
        </a>
        <a href="/user/pembayaran" class="nav-link <?php echo $__env->yieldContent('bayar'); ?>">
            <span class="fa fa-coins"></span>
            <span class="nav__text">Pembayaran</span>
        </a>
        <a href="<?php echo e(route('setting.akun.user')); ?>" class="nav-link <?php echo $__env->yieldContent('setting'); ?>">
            <span class="fa fa-user-cog"></span>
            <span class="nav__text">Akun</span>
        </a>
    </nav>

    <?php echo $__env->yieldContent('content'); ?>

    <?php echo $__env->yieldContent('js'); ?>
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <script src="<?php echo e(asset('fontawesome/js/all.js')); ?>"></script>
</body>

</html><?php /**PATH C:\Users\User\Downloads\pengkodean\Uang-Kas\resources\views/layouts/user.blade.php ENDPATH**/ ?>