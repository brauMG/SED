<?php $__env->startSection('content'); ?>
    <div class="layoutContainer">
        <div class="container mb-4">
            <div class="row">
                <div class="col text-center btn-hover">
                    <a class="selected btn border-light btn-layout btn-grid btns-grid" disabled>
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
    <?php if( session('mensaje') ): ?>
        <div class="container-edits" style="margin-top: 2%">
            <div class="alert alert-success" class='message' id='message'><?php echo e(session('mensaje')); ?></div>
        </div>
    <?php endif; ?>
    <div class="col text-center btn-hover2">
        <a href="<?php echo e(url('CreateAdmin/addAdmin/create')); ?>" class="btn btn-primary" style="margin-right: 3%">
            <div><i class="material-icons">person_add</i></div>
            <div>Añadir Administrador</div>
        </a>

        <a target="_blank" href="<?php echo e(URL::to('/')); ?>/files/manualAdmin.pdf" class="btn btn-primary">
            <div class="button-2 fix-0">
                <div><i class="material-icons" style="vertical-align: bottom;">
                        get_app
                    </i></div>
                <div>Manual de Usuario</div>
            </div>
        </a>
    </div>

        <div class="container">
            <div data-simplebar class="table-responsive table-height" style="height: 820px !important;">
            <div class="col text-center">
            <table class="table table-striped table-bordered mydatatable">
                <thead class="table-header">
                <tr>
                    <th class="">ESTADO DE SU EMPRESA</th>
                    <th class="">EMPRESA</th>
                    <th class="">ADMINISTRADOR</th>
                    <th class="">USUARIO</th>
                    <th class="">TELÉFONO DE LA EMPRESA</th>
                    <th class="">CORREO DE LA EMPRESA</th>
                    <th class="">REGISTRO PERSONAL</th>
                </tr>
                </thead>
                <tbody class="">
                <?php $__currentLoopData = $Admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="td-center">
                            <form class='form' method="POST" action="<?php echo e(route('ChangeStatus',$users->companyId)); ?>">
                                <?php echo method_field('PUT'); ?>
                                <?php echo csrf_field(); ?>
                                <?php if($users->status == 0): ?>
                                    <input type="hidden" name="status" style="width: 0px;border:none; " readonly value="1">
                                    <input type="submit" value="Deshabilitado" class="btn btn-unavailable" disabled><?php endif; ?>
                                <?php if($users->status != 0): ?>
                                    <input type="hidden" name="status" style="width: 0px;border:none; " readonly value="0">
                                    <input type="submit" value="Habilitado" class="btn btn-available" disabled>
                                <?php endif; ?>
                            </form>
                        </td>
                        <td class="td td-center"><?php echo e($users->name); ?></td>
                        <td class="td td-center"><?php echo e($users->firstName." ".$users->lastName); ?></td>
                        <td class="td td-center"><?php echo e($users -> username); ?></td>
                        <td class="td td-center"><?php echo e($users->phoneNumber); ?></td>
                        <td class="td td-center"><?php echo e($users->email); ?></td>
                        <td class="td td-center">
                            <a href="<?php echo e(route('ViewAdmin', $users->id)); ?>" class="btn-row btn btn-info"><i class="fas fa-bookmark"></i> Mostrar</a>
                            <a href="<?php echo e(route('EditAdmin', $users->id)); ?>" class="btn-row btn btn-warning"><i class="fas fa-edit"></i> Editar</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                <tfoot class="table-footer">
                <tr>
                    <th class="">ESTADO DE SU EMPRESA</th>
                    <th class="">EMPRESA</th>
                    <th class="">ADMINISTRADOR</th>
                    <th class="">USUARIO</th>
                    <th class="">TELÉFONO DE LA EMPRESA</th>
                    <th class="">CORREO DE LA EMPRESA</th>
                    <th class="">REGISTRO PERSONAL</th>
                </tr>
                </tfoot>
            </table>
            </div>
            </div>
        </div>
    <script>
        $('.mydatatable').DataTable();
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/ICA/resources/views/superAdmin/index.blade.php ENDPATH**/ ?>