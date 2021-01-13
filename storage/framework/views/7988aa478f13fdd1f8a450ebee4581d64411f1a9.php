<?php $__env->startSection('content'); ?>
    <div class="layoutContainer" >
        <div class="container mb-4">
            <div class="row">
                <div class="col text-center btn-hover">
                    <a href="<?php echo e(url('/admin')); ?>" class="btn btns-grid border-light btn-layout btn-grid">
                            <div><i class="material-icons" style="vertical-align: bottom;">
                                    format_list_numbered
                                </i></div>
                            <div>Lista de Áreas</div>
                    </a>
                </div>
                <div class="col text-center btn-hover">
                    <a href="<?php echo e(url('/admins/maturity/index')); ?>" class="btn btns-grid border-light btn-layout btn-grid">
                        <div><i class="material-icons" style="vertical-align: bottom;">
                                format_list_numbered
                            </i></div>
                        <div>Lista de Niveles de Madurez</div>
                    </a>
                </div>
                <div class="col text-center btn-hover">
                    <a href="<?php echo e(url('/admins/user/index')); ?>" class="btn btns-grid border-light btn-layout btn-grid">
                            <div><i class="material-icons" style="vertical-align: bottom;">
                                    format_list_numbered
                                </i></div>
                            <div>Lista de Usuarios</div>
                    </a>
                </div>
                <div class="col text-center btn-hover">
                    <a class="selected btn btns-grid border-light btn-layout btn-grid">
                            <div><i class="material-icons" style="vertical-align: bottom;">
                                    format_list_numbered
                                </i></div>
                            <div>Lista de Pruebas</div>
                    </a>
                </div>
                <div class="col text-center btn-hover">
                    <a href="<?php echo e(url('/admins/history')); ?>" class="btn btns-grid border-light btn-layout btn-grid">
                            <div><i class="material-icons" style="vertical-align: bottom;">
                                    history
                                </i></div>
                            <div>Historial</div>
                    </a>
                </div>
                <?php if(empty($areas)): ?>
                    <div class="col text-center btn-hover">
                        <a href="" class="btn btns-grid border-light btn-layout btn-grid">
                            <div><i class="material-icons" style="vertical-align: bottom;">
                                    remove_red_eye
                                </i></div>
                            <div>Ver Resultados</div>
                        </a>
                    </div>

                <?php else: ?>
                    <div class="col text-center btn-hover">
                        <a href="<?php echo e(route('adminViewResults',$areas[0]->areaId)); ?>" class="btn btns-grid border-light btn-layout btn-grid">
                            <div><i class="material-icons" style="vertical-align: bottom;">
                                    remove_red_eye
                                </i></div>
                            <div>Ver Resultados</div>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="col text-center btn-hover2">
            <a href="<?php echo e(url('/admins/area/test/create')); ?>" class="btn btn-primary" style="margin-right: 3%">
                    <div><i class="material-icons"style="vertical-align: bottom;">
                            create
                        </i></div>
                    <div>Crear Prueba</div>
            </a>
            <a href="<?php echo e(url('/admins/area/concept_test/create')); ?>" class="btn btn-primary">
                    <div><i class="material-icons" style="vertical-align: bottom;">
                            text_rotation_none
                        </i></div>
                    <div>Añadir Conceptos a Pruebas</div>
            </a>
        </div>
    </div>

    <div class="container">
        <?php if( session('mensaje') ): ?>
            <div class="container-edits" style="margin-top: 2%">
                <div class="alert alert-success" class='message' id='message'><?php echo e(session('mensaje')); ?></div>
            </div>
        <?php endif; ?>
        <div data-simplebar class="table-responsive table-height" style="height: 800px !important;">
            <div class="col text-center">
                <table class="table table-striped table-bordered mydatatable">
                    <thead class="table-header">
                    <tr>
                        <th style="text-transform: uppercase">area de la prueba</th>
                        <th style="text-transform: uppercase">nombre de la prueba</th>
                        <th style="text-transform: uppercase">concepto</th>
                        <th style="text-transform: uppercase">usuario asignado</th>
                        <th style="text-transform: uppercase">registro</th>
                    </tr>
                    </thead>
                    <tbody class="" id="TableCustom">
                    <?php $__currentLoopData = $dataTests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="td td-center"><?php echo e($test['areaName']); ?></td>
                            <td class="td td-center"><?php echo e($test['testName']); ?></td>
                            <td class="td td-center"><?php echo e($test['conceptName']); ?></td>
                            <td class="td td-center"><?php echo e($test['user']); ?></td>
                            <td class="td td-center">
                                <a href="<?php echo e(route('ShowTest', $test['conceptId'])); ?>" class="btn-row btn btn-info"><i class="fas fa-bookmark"></i> Mostrar</a>
                                <a href="<?php echo e(route('EditTest', $test['conceptId'])); ?>" class="btn-row btn btn-warning"><i class="fas fa-edit"></i> Editar</a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    <tfoot class="table-footer">
                    <tr>
                        <th style="text-transform: uppercase">area de la prueba</th>
                        <th style="text-transform: uppercase">nombre de la prueba</th>
                        <th style="text-transform: uppercase">concepto</th>
                        <th style="text-transform: uppercase">usuario asignado</th>
                        <th style="text-transform: uppercase">registro</th>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/ICA/resources/views/admins/area/test/listTest.blade.php ENDPATH**/ ?>