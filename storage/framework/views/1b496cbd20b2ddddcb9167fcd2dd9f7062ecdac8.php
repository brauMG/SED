<?php $__env->startSection('content'); ?>
    <div class="layoutContainer">
        <div class="container mb-4">
            <div class="row">

                <div class="col text-center btn-hover">
                    <a href="<?php echo e(url('/analista')); ?>" class="btn btns-grid border-light btn-layout btn-grid">
                        <div><i class="material-icons" style="vertical-align: bottom">
                                insert_chart_outlined
                            </i></div>
                        <div>Lista de Pruebas</div>
                    </a>
                </div>

                <div class="col text-center btn-hover">
                    <a class="selected btn btns-grid border-light btn-layout btn-grid">
                        <div><i class="material-icons" style="vertical-align: bottom;">
                                show_chart
                            </i></div>
                        <div>Lista de Areas</div>
                    </a>
                </div>

                <div class="col text-center btn-hover">
                    <a href="<?php echo e(route('analistaViewResults',$areas[0]['areaId'])); ?>" class="btn btns-grid border-light btn-layout btn-grid">
                        <div><i class="material-icons" style="vertical-align: bottom;">
                                bar_chart
                            </i></div>
                        <div>Ver Resultados</div>
                    </a>
                </div>

            </div>
        </div>
    </div>
    <div class="container">
        <div data-simplebar class="table-responsive table-height">
            <div class="col text-center">
                <table class="table table-striped table-bordered mydatatable">
                    <thead class="table-header" style="background: #1b4b72;">
                    <tr>
                        <th class="" scope="col" style="tesxt-transform: uppercase">ÁREA</th>
                        <th class="" scope="col" style="tesxt-transform: uppercase">RESULTADOS</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = (array)$areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="td" style="font-size: large"><?php echo e($area['name']); ?></td>
                            <td class="td">
                                <a href="<?php echo e(route('analistaViewResults',$area['areaId'])); ?>" class="btn-table btn btn-very-short"> Ver <i class="far fa-folder-open"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    <tfoot class="table-footer" style="background: #1b4b72;">
                    <tr>
                        <th class="" scope="col" style="tesxt-transform: uppercase">ÁREA</th>
                        <th class="" scope="col" style="tesxt-transform: uppercase">RESULTADOS</th>
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


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/ICA/resources/views/analistas/areas.blade.php ENDPATH**/ ?>