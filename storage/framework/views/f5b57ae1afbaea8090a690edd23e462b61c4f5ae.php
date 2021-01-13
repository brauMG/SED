<?php $__env->startSection('content'); ?>

    <div class="layoutContainer">
        <div class="container mb-4">
            <div class="row">

                <div class="col text-center btn-hover">
                    <a href="<?php echo e(url('/comun')); ?>" class="btn btns-grid border-light btn-layout btn-grid" style="width: 30% !important;">
                        <div><i class="material-icons" style="vertical-align: bottom;">
                                home
                            </i> </div>
                        <div>Inicio</div>
                    </a>
                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div data-simplebar class="card-height-add-admin">
            <div class="col text-center">
                <div class="justify-content-center">
                    <div class="card card-add-company">

                        <div class="card-header card-header-cute">
                            <h4 class="no-bottom" style="text-transform: uppercase">Subir Evidencia</h4>
                        </div>

                        <div class="card-body">
                            <form action="<?php echo e(url('/upload')); ?>" method='POST' enctype="multipart/form-data" id='form'>
                                <?php echo csrf_field(); ?>

                                <div class="container" style="color:red !important;">
                                    Tamaño Máximo del Archivo: 50 MB
                                </div>

                                <div class="container">
                                    <input name="link" id='link' type="file"
                                        class="form-control  <?php $__errorArgs = ['link'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        placeholder="Nombre de la empresa" aria-label="Nombre"
                                        aria-describedby="basic-addon1" required autocomplete="link" autofocus
                                           value=<?php echo e(Request::old('link')); ?>></div>
                                    <?php $__errorArgs = ['link'];
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

                                <input type="hidden" name='attributeId' value="<?php echo e($selectedAttribute['attributeId']); ?>"
                                    required>


                                <input type="hidden" value='0' name='verified' required>
                                <?php if(Auth::user()): ?>
                                <input type="hidden" value="<?php echo e($user->id); ?>" name='userId' required>
                                <input type="hidden" value="<?php echo e($user->companyId); ?>" name='companyId' required>

                                <?php endif; ?>
                                <div class="buttcontainer">
                                    <button class="btn btn-add " type='submit' id='butform'>Enviar Archivo</button>
                                </div>

                            </form>
                        </div>
                    </div>
                            <?php echo $__env->make('errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <div class="message">
                            <?php if(session("errors")): ?>
                                <?php $__currentLoopData = $errors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class='' id=''><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                <?php if(session("success")): ?>
                                <h4 class='alert-success' id='message'><?php echo e(session('success')); ?></h4>

                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

</main>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/ICA/resources/views/test/index.blade.php ENDPATH**/ ?>