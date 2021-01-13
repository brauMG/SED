<?php $__env->startSection('content'); ?>
    <?php ($count=1); ?>
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

    <div class="container">
        <div data-simplebar class="card-height-add-admin" style="height: 700px !important; margin-top: 3% !important;">
            <div class="col text-center">
                <div class="justify-content-center">
                    <div class="card card-add-company">

                        <div class="card-header card-header-cute">
                            <h4 class="no-bottom" style="text-transform: uppercase">Agregar Patrocinador</h4>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="/superAdmin/addSponsors/create" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <table class="table-responsive table-card-inline">

                                    <tr class="tr-card-complete">
                                        <th class="th-card">
                                            <i class="fas fa-wallet"></i> Nombre del patrocinador
                                        </th>
                                        <td class="td-card"> <input name="name" type="text"
                                                                    class="form-control  <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                                    placeholder="Ingresa el nombre" aria-label="name"
                                                                    aria-describedby="basic-addon1" required autocomplete="name" autofocus
                                                                    value=<?php echo e(Request::old('name')); ?>>
                                        </td>
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
                                    </tr>

                                    <tr>
                                        <th class="th-card">
                                            <i class="fab fa-readme"></i> Descripción sobre el patrocinador
                                        </th>
                                        <td class="td-card">
                                            <div class="form-group">
                                                <textarea name="description" rows="5" style="background-color: #eff0ee"
                                                          class="form-control  <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                          placeholder="Ingresa la descripción" aria-label="description"
                                                          aria-describedby="basic-addon1" required autocomplete="description" autofocus
                                                          value=<?php echo e(Request::old('description')); ?>>
                                                </textarea>
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
                                            <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($company['companyId'] == 1): ?>
                                                    <div class="form-check">
                                                        <input class="form-check-input label-size" type="hidden" name="companies[<?php echo e($company['name']); ?>]" value="<?php echo e($company['companyId']); ?>" checked>
                                                    </div>
                                                <?php else: ?>
                                                    <div class="form-check">
                                                        <input class="form-check-input label-size" type="checkbox" name="companies[<?php echo e($company['name']); ?>]" value="<?php echo e($company['companyId']); ?>">
                                                        <label class="form-check-label label-size" for="defaultCheck1"><?php echo e($company['name']); ?></label>
                                                    </div>
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

                                    <tr>
                                        <th class="th-card">
                                            <i class="fas fa-link"></i> Link a su sitio WEB
                                        </th>
                                        <td class="td-card"> <input name="link" type="text"
                                                                    class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                                    placeholder="Ingresa el link" aria-label="link"
                                                                    aria-describedby="basic-addon1" required autocomplete="link" autofocus
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
                                        </td>
                                    </tr>

                                    <tr>
                                        <th class="th-card">
                                            <i class="far fa-file-image"></i> Imagen del patrocinador (formato .png)
                                        </th>
                                        <td class="td-card">
                                            <input type="file" name="image" id="file" class="adjust-file form-control <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required />
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
                                                <input class="form-check-input label-size" type="checkbox" name="show" value="1">
                                                <label class="form-check-label label-size" for="defaultCheck1">Si</label>
                                            </div>
                                        </td>
                                    </tr>

                                </table>

                                <div class="container">
                                    <button type="submit" class="button-size-08 btn btn-add btn-primary">Agregar Datos</button>
                                </div>

                                <div class="container">
                                    <?php echo $__env->make('errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/ICA/resources/views/superAdmin/addSponsors/create.blade.php ENDPATH**/ ?>