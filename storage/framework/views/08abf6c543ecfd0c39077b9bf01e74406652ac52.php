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
                            <h4 class="no-bottom" style="text-transform: uppercase">Reemplazar Evidencia</h4>
                        </div>

                        <div class="card-body">
                            <form method='POST' action="<?php echo e(route('upload.update', $data->evidenceId)); ?>"
                                enctype='multipart/form-data'>
                                <!-- Browsers don't yet understand PATCH and DELETE request types for your forms.
    To get around this limitation: method_field("PATCH") & csrf_field() -->
                                <?php echo method_field('PATCH'); ?>
                                <?php echo csrf_field(); ?>

                                <div class="container" style="color:red !important;">
                                        Tamaño Máximo del Archivo: 50 MB
                                </div>

                                <div class="container">
                                    <input name="link" id='link' type="file"
                                           class="custom-file  <?php $__errorArgs = ['link'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required autocomplete="link" autofocus
                                           value=<?php echo e(Request::old('link')); ?>>
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
                                </div>

                                <section class="field">


                                    <section class="control">

                                        <input type="hidden" class="input" name='attributeId'
                                            value='<?php echo e($data->attributeId); ?>'>

                                    </section>

                                </section>

                                <section class="field">


                                    <section class="control">

                                        <input type="hidden" class="input" name='verified' value='<?php echo e($data->verified); ?>'>

                                    </section>

                                </section>

                                <section class="field">


                                    <section class="control">

                                        <input type="hidden" class="input" name='userId' value='<?php echo e($data->userId); ?>'>

                                    </section>

                                </section>
                                <section class="field">


                                    <section class="control">

                                        <input type="hidden" class="input" name='companyId'
                                            value='<?php echo e($data->companyId); ?>'>

                                    </section>

                                </section>
                                <!-- <section class="field">

        <label for="evidenceId" class="label">evidenceId</label>

        <section class="control">

            <input type="integer" class="input" name='evidenceId' value='<?php echo e($data->evidenceId); ?>'>

        </section>

    </section> -->
                                <div class="container">
                                    <button class="btn btn-add " name='edit' type='submit' id='butform'>Enviar Nuevo Archivo</button>
                                </div>

                            </form>
                            <?php echo $__env->make('errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <div class="message">
                                <?php if(session("errors")): ?>
                                <?php $__currentLoopData = $errors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class='message' id='message'><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                <h4 class='message' id='message'><?php echo e(session('success')); ?></h4>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </div></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/ICA/resources/views/test/edit.blade.php ENDPATH**/ ?>