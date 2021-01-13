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
        <div data-simplebar class="card-height-add-admin">
            <div class="col text-center">
                <div class="justify-content-center">
                    <div class="card card-add-company">

                        <div class="card-header card-header-cute">
                            <h4 class="no-bottom" style="text-transform: uppercase">Ver Registro de Compañia</h4>
                        </div>
                        <?php if( session('mensaje') ): ?>
                            <div class="container-edits" style="margin-top: 2%">
                                <div class="alert alert-success" class='message' id='message'><?php echo e(session('mensaje')); ?></div>
                            </div>
                        <?php endif; ?>
                            <?php echo csrf_field(); ?>
                            <?php if($admin->status == 1): ?>
                                <?php if($admin->companyId == 1): ?>
                                <?php else: ?>
                                    <div class="container" role="group">
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#ChangeStatusModal"><i class="fas fa-times-circle" style="background-color: red;color:white;"></i> Deshabilitar</button>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php if($admin->status != 1): ?>
                                <?php if($admin->companyId == 1): ?>
                                <?php else: ?>
                                    <div class="container" role="group">
                                        <button class="btn btn-success" data-toggle="modal" data-target="#ChangeStatusModal"><i class="fas fa-check-circle" style="background-color: #5cb85c;color:white;"></i> Habilitar</button>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                        <!--TABLES-->
                    <div class="container-edits">
                        <form id="formCompany" style="margin-bottom: 2% !important;">
                            <?php echo method_field('PUT'); ?>
                            <?php echo csrf_field(); ?>
                                <table class="table-responsive table-card-inline" id="EditCompany_SA">

                                    <tr class="tr-card-complete">
                                        <th class="th-card"><i class="fas fa-building"></i> Empresa</th>
                                        <td class="td-card"><input type="text" name="name" id="nameC" class="form-control" readonly value="<?php echo e($admin->name); ?>"></td>
                                    </tr>

                                    <tr class="tr-card-complete">
                                        <th class="th-card"><i class="fas fa-map-marked-alt"></i> Dirección</th>
                                        <td class="td-card"><input type="text" name="address" id="addressC" class="form-control" readonly value="<?php echo e($admin->address); ?>">
                                        </td>
                                    </tr>

                                    <tr class="tr-card-complete">
                                        <th class="th-card"><i class="fas fa-phone-square-alt"></i> Teléfono</th>
                                        <td class="td-card"><input type="text" name="phoneNumber" id="phoneNumberC" class="form-control" readonly value="<?php echo e($admin->phoneNumber); ?>"></td>
                                    </tr>

                                    <tr class="tr-card-complete">
                                        <th class="th-card"><i class="fas fa-envelope-open-text"></i> Email</th>
                                        <td class="td-card"><input type="email" name="email" id="emailC" class="form-control" readonly value="<?php echo e($admin->email); ?>"></td>
                                    </tr>

                                    <?php if($admin->status == 1): ?>
                                        <tr class="tr-card-complete">
                                            <th class="th-card"><i class="fas fa-check-circle"></i> Estado Actual</th>
                                            <td class="td-card"><input type="text" name="estado" id="emailC" class="form-control" readonly value="Habilitado"></td>
                                        </tr>
                                    <?php else: ?>
                                        <tr class="tr-card-complete">
                                            <th class="th-card"><i class="fas fa-times-circle"></i> Estado Actual</th>
                                            <td class="td-card"><input type="text" name="estado" id="emailC" class="form-control" readonly value="Deshabilitado"></td>
                                        </tr>
                                    <?php endif; ?>

                                </table>
                        </form>
                        <div id="buttContainer">
                            <div class='container'>
                                <a href="<?php echo e(route('EditCompany', $admin->companyId)); ?>" class="btn btn-warning"><i class="fas fa-edit"></i> Editar</a>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" id="ChangeStatusModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #8c8e0e">
                    <h5 class="modal-title upcase"  id="exampleModalLongTitle" style="color: white">Cambiar Estado</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo e(route('ChangeStatus', $admin->companyId)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div style="background-color: white;color: black;">
                        <center>
                            <div class="modal-body" >
                                ¿Deseas cambiar el estado actual de esta empresa?
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/ICA/resources/views/superAdmin/viewCompanies/showCompany.blade.php ENDPATH**/ ?>