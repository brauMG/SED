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
                <a class="selected btn border-light btn-layout btn-grid btns-grid" disabled>
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

<div class="col text-center btn-hover2">
    <a href="<?php echo e(url('CreateCompany/addCompany/create')); ?>" class="btn btn-primary">
        <div><i class="material-icons">location_city</i></div>
        <div>Añadir Empresa</div>
    </a>
</div>

<div class="container">
    <div data-simplebar class="table-responsive table-height">
        <div class="col text-center">
            <table class="table table-striped table-bordered mydatatable">
                <thead class="table-header">
                    <tr>
                        <td class=''>#</td>
                        <td class=''>ESTADO</td>
                        <td class=''>EMPRESA</td>
                        <td class=''>DIRECCIÓN</td>
                        <td class=''>TELÉFONO</td>
                        <td class=''>CORREO</td>
                        <td class=''>REGISTRO</td>
                    </tr>
                </thead>
		<tbody class="">
		<?php $__currentLoopData = $Com; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $C): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($C->companyId != 1): ?>
			<tr>
				<td class="td-center"><?php echo e($count); ?></td>
				<td class="td-center">
                    <form class='form'  method="POST" action="<?php echo e(route('status',$C->companyId)); ?>">
                        <?php echo method_field('PUT'); ?>
                        <?php echo csrf_field(); ?>
                        <?php if($C->status == 0): ?>
                            <input type="hidden" name="status" style="width: 0px;border:none; " readonly value="1">
                            <input type="submit" value="Deshabilitado" class="btn btn-unavailable" disabled>
                             <?php endif; ?>
                        <?php if($C->status != 0): ?>
                            <input type="hidden" name="status" style="width: 0px;border:none; " readonly value="0">
                            <input type="submit" value="Habilitado" class="btn btn-available" disabled>
                        <?php endif; ?>
                    </form>
                </td>
                <td class="td td-center"><?php echo e($C -> name); ?></td>
                <td class="td td-center"><?php echo e($C -> address); ?></td>
                <td class="td td-center"><?php echo e($C -> phoneNumber); ?></td>
                <td class="td td-center"><?php echo e($C -> email); ?></td>
                <td class="td td-center">
                    <a href="<?php echo e(route('ShowCompanySA', $C->companyId)); ?>" class="btn-row btn btn-info"><i class="fas fa-bookmark"></i> Mostrar</a>
                    <a href="<?php echo e(route('EditCompany', $C->companyId)); ?>" class="btn-row btn btn-warning"><i class="fas fa-edit"></i> Editar</a>
                </td>
			</tr>
            <?php endif; ?>
            <?php ($count++); ?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tfoot class="table-footer">
                <tr>
                    <td class=''>#</td>
                    <td class=''>ESTADO</td>
                    <td class=''>EMPRESA</td>
                    <td class=''>DIRECCIÓN</td>
                    <td class=''>TELÉFONO</td>
                    <td class=''>CORREO</td>
                    <td class=''>REGISTRO</td>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/ICA/resources/views//superAdmin/viewCompanies/create.blade.php ENDPATH**/ ?>