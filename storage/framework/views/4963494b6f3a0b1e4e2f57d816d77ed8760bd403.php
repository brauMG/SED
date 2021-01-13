<?php $__env->startSection('content'); ?>
<?php if(empty($tests)): ?>
    <div class="container">
        <div class="row justify-content-center">
            <h1>Por el momento no tienes ninguna prueba asignada, contacta a tu administrador para que se asigne una.</h1>
        </div>
    </div>
    <?php else: ?>

    <div class="col text-center btn-hover2">
        <a target="_blank" href="<?php echo e(URL::to('/')); ?>/files/manual.pdf" class="btn btn-primary">
            <div class="button-2 fix-0">
                <div><i class="material-icons" style="vertical-align: bottom;">
                        get_app
                    </i></div>
                <div>Manual de Usuario</div>
            </div>
        </a>
    </div>

    <div class="container">
        <div data-simplebar class="table-responsive table-height" style="height: 935px !important;">
            <div class="col text-center">
                <table class="table table-striped table-bordered mydatatable">
                    <thead class="table-header" style="background: #1b4b72;">
                    <tr>
                        <th class="" scope="col" style="text-transform: uppercase">área</th>
                        <th class="" scope="col" style="text-transform: uppercase">NOMBRE DE LA PRUEBA</th>
                        <th class="" scope="col" style="text-transform: uppercase">NOMBRE DEL CONCEPTO</th>
                        <th class="" scope="col" style="text-transform: uppercase">fecha de asignación</th>
                        <th class="" scope="col" style="text-transform: uppercase">VER PRUEBA</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = (array)$concepts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $concept): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="td" style="font-size: large"><?php echo e($concept->areaName); ?></td>
                            <?php $__currentLoopData = (array)$tests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($test['testId'] == $concept->testId): ?>
                                    <td class="td" style="font-size: large"><?php echo e($test['name']); ?></td>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <td class="td" style="font-size: large"><?php echo e($concept->description); ?></td>
                                <td class="td" style="font-size: large"><?php echo e($concept->date); ?></td>
                                <td class="td">
                                <a href="<?php echo e(route('comunTest',[$concept->testId,$concept->conceptId])); ?>" class="Button_See btn"> Ver </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    <tfoot class="table-footer" style="background: #1b4b72;">
                    <tr>
                        <th class="" scope="col" style="text-transform: uppercase">área</th>
                        <th class="" scope="col" style="text-transform: uppercase">NOMBRE DE LA PRUEBA</th>
                        <th class="" scope="col" style="text-transform: uppercase">NOMBRE DEL CONCEPTO</th>
                        <th class="" scope="col" style="text-transform: uppercase">fecha de asignación</th>
                        <th class="" scope="col" style="text-transform: uppercase">VER PRUEBA</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <?php endif; ?>
<script>
    $('.mydatatable').DataTable();
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/ICA/resources/views/comunes/index.blade.php ENDPATH**/ ?>