<?php $__env->startSection('content'); ?>
    <div class="wrapper-less">
        <div class="container-less">
            <div class="card">
                    <div class="card-header"><?php echo e(__('Verifique su dirección de correo electrónico')); ?></div>

                    <div class="card-body">
                        <?php if(session('resent')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(__('Se ha enviado un enlace de verificación a su dirección de correo electrónico.')); ?>

                        </div>
                            <div class="form-group">
                                <?php echo e(__('Si ya has verificado tu dirección de correo, recarga la página. O presiona salir e inicia sesión nuevamente.')); ?>

                            </div>
                            <form class="d-inline" method="POST" action=href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-primary btn-recovery"><?php echo e(__('Salir.')); ?></button>
                            </form>
                        <?php else: ?>
                        <div class="form-group">
                            <?php echo e(__('Para continuar deberas validar tu correo electrónico, haz click a continuación para enviarte un enlace de verificación a tu correo.')); ?>

                        </div>
                        <form class="d-inline" method="POST" action="<?php echo e(route('verification.resend')); ?>">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="btn btn-primary btn-recovery"><?php echo e(__('Click Aquí.')); ?></button>
                        </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    <ul class="bg-bubbles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.verify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/ICA/resources/views/auth/verify.blade.php ENDPATH**/ ?>