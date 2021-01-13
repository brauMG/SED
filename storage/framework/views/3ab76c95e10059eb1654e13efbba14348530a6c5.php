<?php $__env->startSection('content'); ?>
    <?php $sponsors = app('App\Services\Sponsors'); ?>
        <div class="wrapper-less">
            <div class="container-less">
                <div class="col">
                    <div class="card login-card">
                        <div class="card-body">
                            <form autocomplete="off" method="POST" action="<?php echo e(route('login')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <label for="username" class="align text-md-right label"><i class="fas fa-user"></i> <?php echo e(__('USUARIO')); ?></label>
                                        <div class="cols">
                                            <input id="username" type="username" class="form-control <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="username" value="<?php echo e(old('username')); ?>" required autocomplete="off" autofocus>
                                            <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                </div>

                                <div class="form-group">
                                    <label for="password" class="align text-md-right label"><i class="fas fa-key"></i> <?php echo e(__('CONTRASEÑA')); ?></label>
                                        <div class="cols">
                                            <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="off">
                                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                </div>

                                <div class="form-group">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary btn-login">
                                            <?php echo e(__('Iniciar ')); ?>

                                        </button>
                                    </div>
                                </div>

                                <div class='form-group'>
                                    <?php if(Route::has('password.request')): ?>
                                        <a class="btn-login-forget btn btn-link restore login-forget" href="<?php echo e(route('password.request')); ?>"><?php echo e(__('Restablecer mi contraseña.')); ?></a>
                                    <?php endif; ?>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php if(count($sponsors->get()->toArray()) == 0): ?>
        <?php else: ?>
        <div class="sponsors-navbar-login">
            <ul class="sponsors-ul-login" id="c">
                <?php $__currentLoopData = $sponsors->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sponsor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="sponsors-li-login">
                        <img data-toggle="modal" data-target="#info<?php echo e($sponsor->sponsorId); ?>" src="<?php echo e(URL::to('/')); ?>/sponsors/<?php echo e($sponsor->image); ?>" class="sponsors-img-login"/>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>


    <?php $__currentLoopData = $sponsors->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sponsor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="modal show" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" id="info<?php echo e($sponsor->sponsorId); ?>">
            <div class="modal-dialog padding-modal" role="document">
                <form target="_blank" action="https://<?php echo e($sponsor->link); ?>">
                    <div class="modal-content"style="background-color: #ffffff;color: white;">
                        <div class="modal-header ">
                            <h5 class="modal-title"  id="exampleModalLongTitle"><img src="<?php echo e(URL::to('/')); ?>/sponsors/<?php echo e($sponsor->image); ?>" width="75"/></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="width: 20% !important;">
                                <span aria-hidden="true">X</span>
                            </button>
                        </div>
                        <div style="background-color: white;color: black;">
                            <div class="modal-body">
                                <?php echo e($sponsor->description); ?>

                            </div>
                        </div>
                        <div class="modal-footer" style="background-color: white;color: black;">
                            <input type="submit" class="btn btn-primary" value="Ir a su sitio web">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <script>
        if ($(window).width() > 799) {
            var timer = 4000;

            var i = 0;
            var max = $('#c > li').length;

            $("#c > li").eq(i).addClass('sponsors-active').css('left','0');
            $("#c > li").eq(i + 1).addClass('sponsors-active').css('left','20%');
            $("#c > li").eq(i + 2).addClass('sponsors-active').css('left','40%');
            $("#c > li").eq(i + 3).addClass('sponsors-active').css('left','60%');
            $("#c > li").eq(i + 4).addClass('sponsors-active').css('left','80%');



            setInterval(function(){

                $("#c > li").removeClass('sponsors-active');

                $("#c > li").eq(i).css('transition-delay','0.25s');
                $("#c > li").eq(i + 1).css('transition-delay','0.5s');
                $("#c > li").eq(i + 2).css('transition-delay','0.75s');
                $("#c > li").eq(i + 3).css('transition-delay','1s');
                $("#c > li").eq(i + 4).css('transition-delay','1.25s');

                if (i < max-5) {
                    i = i+5;
                }

                else {
                    i = 0;
                }

                $("#c > li").eq(i).css('left','0').addClass('sponsors-active').css('transition-delay','1.25s');
                $("#c > li").eq(i + 1).css('left','20%').addClass('sponsors-active').css('transition-delay','1.5s');
                $("#c > li").eq(i + 2).css('left','40%').addClass('sponsors-active').css('transition-delay','1.75s');
                $("#c > li").eq(i + 3).css('left','60%').addClass('sponsors-active').css('transition-delay','2s');
                $("#c > li").eq(i + 4).css('left','80%').addClass('sponsors-active').css('transition-delay','2.25s');

            }, timer);
        }

        else {
        var timer = 4000;

        var i = 0;
        var max = $('#c > li').length;

        $("#c > li").eq(i).addClass('sponsors-active').css('left','0');
        $("#c > li").eq(i + 1).addClass('sponsors-active').css('left','33%');
        $("#c > li").eq(i + 2).addClass('sponsors-active').css('left','66%');



        setInterval(function(){

            $("#c > li").removeClass('sponsors-active');

            $("#c > li").eq(i).css('transition-delay','0.25s');
            $("#c > li").eq(i + 1).css('transition-delay','0.5s');
            $("#c > li").eq(i + 2).css('transition-delay','0.75s');

            if (i < max-3) {
                i = i+3;
            }

            else {
                i = 0;
            }

            $("#c > li").eq(i).css('left','0').addClass('sponsors-active').css('transition-delay','1.25s');
            $("#c > li").eq(i + 1).css('left','33%').addClass('sponsors-active').css('transition-delay','1.5s');
            $("#c > li").eq(i + 2).css('left','66%').addClass('sponsors-active').css('transition-delay','1.75s');

        }, timer);
        }
        </script>

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

<?php echo $__env->make('layouts.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/ICA/resources/views/auth/login.blade.php ENDPATH**/ ?>