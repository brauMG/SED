<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<?php
use App\User;
use App\MaturityLevel;
?>
<head>
    <?php echo $__env->yieldContent('head'); ?>
    <link rel="icon" href="<?php echo e(URL::asset('/css/favicon.ico')); ?>" type="image/x-icon"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Sistema de Evaluación Directiva</title>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="<?php echo e(asset('js/customer.js')); ?>" defer></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/1fd9851a23.js" crossorigin="anonymous"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>

    
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>

    <!-- Styles -->
    <link href="<?php echo e(asset('bts4/css/bootstrap.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('bts4/css/layout.css')); ?>" rel="stylesheet">

    
    <link rel="stylesheet" href="https://unpkg.com/simplebar@latest/dist/simplebar.css"/>
    <script src="https://unpkg.com/simplebar@latest/dist/simplebar.min.js"></script>

    
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <script src="<?php echo e(mix('js/app.js')); ?>" defer></script>

    
    <script src="bts4/js/login.js"></script>
    <link href="<?php echo e(asset('bts4/css/login.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('bts4/css/login.less')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('bts4/css/recovery.css')); ?>" rel="stylesheet">

</head>
<form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST"
      style="display: none;">
    <?php echo csrf_field(); ?>
</form>

<div class="navbar-ica bg-ica forward">
    <?php if(Auth::user()->hasRole('superadmin')): ?>
        <a class="navbar-brand ml-auto" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
            <?php elseif(Auth::user()->hasRole('admin')): ?>
                <a class="navbar-brand ml-auto" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                    <?php elseif(Auth::user()->hasRole('analista')): ?>
                        <a class="navbar-brand ml-auto" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                            <?php elseif(Auth::user()->hasRole('comun')): ?>
                                <a class="navbar-brand ml-auto" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                    <?php endif; ?>
                                    <?php if(Auth::user()->hasRole('superadmin')): ?>
                                        <i class="fas fa-user-tie"></i>
                                        <h6>Super Administrador <?php echo e(Auth::user()->username); ?> - Salir</h6>
                                    <?php elseif(Auth::user()->hasRole('admin')): ?>
                                        <i class="fas fa-user-tie"></i>
                                        <h6>Administrador <?php echo e(Auth::user()->username); ?> - Salir</h6>
                                    <?php elseif(Auth::user()->hasRole('analista')): ?>
                                        <i class="fas fa-user-tie"></i>
                                        <h6>Analista <?php echo e(Auth::user()->username); ?> - Salir</h6>
                                    <?php elseif(Auth::user()->hasRole('comun')): ?>
                                        <i class="fas fa-user-tie"></i>
                                        <h6>Usuario <?php echo e(Auth::user()->username); ?> - Salir</h6>
                                    <?php endif; ?>
                                </a>
                        </a>
                </a>
        </a>
</div>
<body style="background-color: #525784">
<?php echo $__env->yieldContent('content'); ?>
</body>
<?php echo $__env->yieldContent('script'); ?>
</html>
<?php /**PATH /var/www/ICA/resources/views/layouts/verify.blade.php ENDPATH**/ ?>