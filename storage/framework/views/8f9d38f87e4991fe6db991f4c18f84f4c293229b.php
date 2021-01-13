<?php $__env->startSection('content'); ?>
    <div class="layoutContainer">
        <div class="container mb-4">
            <div class="row">
                <div class="col text-center btn-hover">
                    <a href="<?php echo e(url('/superAdmin')); ?>" class="btn border-light btn-layout btn-grid btns-grid">
                        <div><span class="material-icons">supervisor_account</span></div>
                        <div>Lista de Administradores</div>
                    </a>
                </div>
                <div class="col text-center btn-hover">
                    <a href="<?php echo e(url('/superAdmin/viewCompanies/create')); ?>" class="btn border-light btn-layout btn-grid btns-grid">
                        <div><span class="material-icons">list</span></div>
                        <div>Lista de Empresas</div>
                    </a>
                </div>
                <div class="col text-center btn-hover">
                    <a href="<?php echo e(url('/superAdmin/viewSponsors/listSponsors')); ?>" class="btn border-light btn-layout btn-grid btns-grid">
                        <div><i class="material-icons">format_list_numbered</i></div>
                        <div>Lista de Patrocinadores</div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class='container'>
        <div data-simplebar class="card-height-add-sponsor" style="margin-top: 3% !important;">
            <div class="col text-center">
                <div class="justify-content-center">
                    <div class="card card-add-company">

                        <div class="card-header card-header-cute">
                            <h4 class="no-bottom" style="text-transform: uppercase">Editar Registro de Patrocinador</h4>
                        </div>
                        <div class="container-company" style="background-color: rgba(18,51,74,0.33)">
                            <img id="old-image" src="<?php echo e(URL::to('/')); ?>/sponsors/<?php echo e($sponsor->image); ?>" class="img-thumbnail" width="100" />
                        </div>
                        <?php if( session('mensaje') ): ?>
                            <div class="container-edits" style="margin-top: 2%">
                                <div class="alert alert-success" class='message' id='message'><?php echo e(session('mensaje')); ?></div>
                            </div>
                        <?php endif; ?>
                        <?php if( session('mensajeError') ): ?>
                            <div class="container-edits" style="margin-top: 2%">
                                <div class="alert alert-warning" class='message' id='message'><?php echo e(session('mensajeError')); ?></div>
                            </div>
                        <?php endif; ?>
                        <div class="container-edits">
                            <div class="container btn-group" role="group">
                                <input type="button" class="btn" value="Datos Personales" style="background-color: #0F4C75; color: white" disabled>
                            </div>
                            <!--TABLES-->
                            <form class="form" id="from" method="POST" action="<?php echo e(route('UpdateSponsor',[$sponsor->sponsorId])); ?>" style="margin-bottom: 2% !important;" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="form-edits" style="margin-bottom: 1% !important;">
                                    <table class="table-responsive table-card-inline" id="tAdmin">
                                        <!--TABLA ADMIN-->
                                        <tr class="tr-card-complete">
                                            <th class="th-card"><i class="fas fa-user-tag"></i> Nombre</th>
                                            <td class="td-card">
                                                <input type="text" name="name" id="nameS" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e($sponsor->name); ?>" required>
                                                <?php $__errorArgs = ['name'];
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
                                            </td>
                                        </tr>
                                        <tr class="tr-card-complete">
                                            <th class="th-card"><i class="fab fa-readme"></i> Descripción</th>
                                            <td class="td-card">
                                                <div class="form-group">
                                                    <textarea rows="5" style="background-color: #eff0ee" name="description" id="descriptionS"  class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required><?php echo e($sponsor->description); ?></textarea>
                                                </div>
                                                <?php $__errorArgs = ['description'];
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
                                            </td>
                                        </tr>
                                        <tr class="">
                                            <th id='head' class="th-card"><i class="fas fa-clipboard-check"></i> Compañias Asignadas</th>
                                            <td class="td-card">
                                                <?php $__currentLoopData = $array_companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($company['companyId'] == 1): ?>
                                                        <div class="form-check">
                                                            <input class="form-check-input label-size" type="hidden" name="companies[<?php echo e($company['name']); ?>]" value="<?php echo e($company['companyId']); ?>" checked>
                                                        </div>
                                                    <?php else: ?>
                                                        <?php if($company['valid']): ?>
                                                            <div class="form-check">
                                                                <input class="form-check-input label-size" type="checkbox" name="companies[<?php echo e($company['name']); ?>]" value="<?php echo e($company['companyId']); ?>" checked>
                                                                <label class="form-check-label label-size" for="defaultCheck1"><?php echo e($company['name']); ?></label>
                                                            </div>
                                                        <?php else: ?>
                                                            <div class="form-check">
                                                                <input class="form-check-input label-size" type="checkbox" name="companies[<?php echo e($company['name']); ?>]" value="<?php echo e($company['companyId']); ?>">
                                                                <label class="form-check-label label-size" for="defaultCheck1"><?php echo e($company['name']); ?></label>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php $__errorArgs = ['companies'];
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
                                            </td>
                                        </tr>
                                        <tr class="tr-card-complete">
                                            <th class="th-card"> <i class="fas fa-signature"></i> Link</th>
                                            <td class="td-card">
                                                <input type="text" name="link" id="linkS"  class="form-control <?php $__errorArgs = ['link'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e($sponsor->link); ?>" required>
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
                                            </td>
                                        </tr>
                                        <tr id="tr-image">
                                            <th class="th-card">
                                                <i class="far fa-file-image"></i> Imagen (formato .png)
                                            </th>
                                            <td class="td-card">
                                                <input class="adjust-file2 form-control <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="file" name="image" />
                                                <div class="container">
                                                <img src="<?php echo e(URL::to('/')); ?>/sponsors/<?php echo e($sponsor->image); ?>" class="img-thumbnail" width="100" />
                                                    <input type="hidden" name="hidden_image" value="<?php echo e($sponsor->image); ?>" />
                                                </div>
                                                <?php $__errorArgs = ['image'];
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
                                            </td>
                                        </tr>
                                        <tr class="">
                                            <th id='head' class="th-card"><i class="fas fa-check-circle"></i> Mostrar en Inicio</th>
                                            <td class="td-card">
                                                <div class="form-check">
                                                    <?php if($sponsor['show'] == true): ?>
                                                        <input class="form-check-input label-size" type="checkbox" name="show" value="1" checked>
                                                    <?php else: ?>
                                                        <input class="form-check-input label-size" type="checkbox" name="show" value="1">
                                                    <?php endif; ?>
                                                    <label class="form-check-label label-size" for="defaultCheck1">Si</label>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class='container'>
                                    <input type="submit" class="button-size-08 btn btn-add btn-warning" value="Guardar Cambios">
                                    <a href="<?php echo e(route('CancelSponsor')); ?>" class="btn btn-primary"><i class="fas fa-sync-alt"></i> Cancelar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/ICA/resources/views/superAdmin/viewSponsors/editSponsor.blade.php ENDPATH**/ ?>