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
                    <a class="selected btn btns-grid border-light btn-layout btn-grid">
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
        <div data-simplebar class="table-responsive table-height" style="height: 890px !important;">
            <table class="table table-striped table-bordered mydatatable">
                <thead class="table-header">
                <tr>
                    <th class="" scope="col" style="text-transform: uppercase">Usuario</th>
                    <th class="" scope="col" style="text-transform: uppercase">Acción</th>
                    <th class="" scope="col" style="text-transform: uppercase">Fecha</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $Historial; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $History): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="td"><?php echo e($History->username); ?></td>
                        <td class="td"><?php echo e($History->action); ?></td>
                        <td class="td"><?php echo e($History->date); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                <tfoot>
                <tr>
                    <th class="" scope="col" style="text-transform: uppercase">Usuario</th>
                    <th class="" scope="col" style="text-transform: uppercase">Acción</th>
                    <th class="" scope="col" style="text-transform: uppercase">Fecha</th>
                </tr>
                </tfoot>
            </table>

            <div class="container">
                <form method="POST" action="<?php echo e(route('HistoryDeleteA')); ?>" id="fromhistory">
                    <?php echo method_field('PUT'); ?>
                    <?php echo csrf_field(); ?>
                    <input type="button" class="btn btn-danger btn-unavailable" name="delete" value="Borrar Registros" onclick="$('#NoteDeleteHitorial').modal();">
                </form>
            </div>
        </div>
    </div>

                <div class="modal show" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" id="NoteDeleteHitorial">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content"style="background-color: #D9534F;color: white;">
                      <div class="modal-header ">
                        <h5 class="modal-title"  id="exampleModalLongTitle">Elminación del Historial</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                       <div style="background-color: white;color: black;">
                           <center>
                                 <div class="modal-body">
                                    ¿Desea eliminar los datos del Historial?
                                  </div>
                            </center>
                       </div>
                      <div class="modal-footer" style="background-color: white;color: black;">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" onclick="DeleteHistory();">Aceptar</button>
                      </div>
                    </div>
                  </div>
                </div>
    <script>
        $('.mydatatable').DataTable();
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/ICA/resources/views/admins/history.blade.php ENDPATH**/ ?>