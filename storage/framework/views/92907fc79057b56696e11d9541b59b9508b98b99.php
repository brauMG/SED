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
                    <a href="<?php echo e(url('/admins/area/test/listTest')); ?>" class="btn btns-grid border-light btn-layout btn-grid">
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

    <div class='container'>
        <div data-simplebar class="card-height-add-sponsor">
            <div class="col text-center">
                <div class="justify-content-center">
                    <div class="card card-add-company">

                        <div class="card-header card-header-cute">
                            <h4 class="no-bottom" style="text-transform: uppercase">Ver Registro de Nivel de Madurez</h4>
                        </div>
                        <?php if( session('mensaje') ): ?>
                            <div class="container-edits" style="margin-top: 2%">
                                <div class="alert alert-success" class='message' id='message'><?php echo e(session('mensaje')); ?></div>
                            </div>
                        <?php endif; ?>
                        <?php if( session('mensajeError') ): ?>
                            <div class="container-edits" style="margin-top: 2%">
                                <div class="alert alert-danger" class='message' id='message'><?php echo e(session('mensajeError')); ?></div>
                            </div>
                        <?php endif; ?>
                        <div class="container-edits">
                            <div class="container btn-group" role="group">
                                <input type="button" class="btn" value="Datos" style="background-color: #0F4C75; color: white" disabled>
                            </div>
                            <!--TABLES-->
                            <form class="form-edits" id="from" style="margin-bottom: 2% !important;">
                                <?php echo csrf_field(); ?>
                                <table class="table-responsive table-card-inline" id="tAdmin">
                                    <tr class="tr-card-complete">
                                        <th class="th-card"><i class="fas fa-link"></i> Nombre del grupo</th>
                                        <td class="td-card">
                                            <input type="text" name="link" id="linkS"  class="form-control" readonly value="<?php echo e($group[0]['name']); ?>">
                                        </td>
                                    </tr>
                                    <?php ($count=1); ?>
                                    <?php $__currentLoopData = $maturity_levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ml): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="tr-card-complete">
                                            <th class="th-card">Nivel <i class="fas fa-hashtag"></i><?php echo e($count); ?></th>
                                            <td class="td-card">
                                                <input type="text" name="maturityName[<?php echo e($ml['maturityLevelId']); ?>]" id="<?php echo e($count); ?>" class="form-control DescMaturity" readonly value="<?php echo e($ml['description']); ?>">
                                            </td>
                                        </tr>
                                        <?php ($count++); ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </table>
                            </form>
                            <div id="buttContainer">
                                <div class='container'>
                                    <a href="<?php echo e(route('EditML', $groupId->MLGroupId)); ?>" class="btn btn-warning"><i class="fas fa-edit"></i> Editar</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" id="DeleteModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #761b18">
                    <h5 class="modal-title upcase"  id="exampleModalLongTitle" style="color: white">Eliminar Grupo de Niveles de Madures</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo e(route('DeleteML', [$groupId->MLGroupId])); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div style="background-color: white;color: black;">
                        <center>
                            <div class="modal-body" >
                                ¿Deseas eliminar por completo los datos del grupo? Esto eliminara todas las pruebas vinculadas al mismo.
                            </div>
                            <div class="spinner-border m-5" role="status" style="display: none;">
                                <span class="sr-only">Cargando...</span>
                            </div>
                        </center>
                    </div>

                    <div class="modal-footer" style="background-color: white;color: black;">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/ICA/resources/views/admins/maturity/viewML/showML.blade.php ENDPATH**/ ?>