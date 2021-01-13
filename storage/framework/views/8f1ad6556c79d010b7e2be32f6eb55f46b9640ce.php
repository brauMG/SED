<?php $__env->startSection('content'); ?>
    <div class="layoutContainer">
        <div class="container mb-4">
            <div class="row">

                <div class="col text-center btn-hover">
                    <a href="<?php echo e(url('/comun')); ?>" class="btn btns-grid border-light btn-layout btn-grid" style="width: 30% !important;">
                        <div><i class="material-icons" style="vertical-align: bottom;">
                                home
                            </i> </div>
                        <div>Inicio</div>
                    </a>
                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="container-dropdown-evidence">
            <div class="dropdown dropping">
                <button class="btn dropdown-toggle dp-areas" type="button" id="dropdownMenu2" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" style="}">
                    <?php echo e($selectedConcept['description']); ?>

                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <input type="hidden" <?php echo e($count = count($concepts)); ?>>
                    <?php $__currentLoopData = $concepts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $concept): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($selectedConcept['description'] == $concept->description): ?>
                            <?php if($count == 1): ?>
                                <a>
                                    <button class="dropdown-item " type="button" disabled>No hay mas conceptos
                                    </button>
                                </a>
                            <?php endif; ?>
                        <?php else: ?>
                            <a href="<?php echo e(route('comunTest',[$concept->testId,$concept->conceptId])); ?>">
                                <button class="dropdown-item " type="button"><?php echo e($concept->description); ?>

                                </button>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>

    <div data-simplebar class="card-height-add-test">
        <div class="col text-center">
            <div class="justify-content-center">
                <div class="card card-add-company">
                    <div class="card-header card-header-cute">
                        <h4 class="no-bottom" style="text-transform: uppercase"><?php echo e($test['name']); ?></h4>
                        </div>
                        <div class="card-body">
                        <div class="message">
                                <?php if(session("success")): ?>
                                <h4 class='alert-success' id='message'><?php echo e(session('success')); ?></h4>

                                <?php endif; ?>
                            </div>
                            <table class="table-responsive table-card-inline">
                                <thead>
                                    <tr class='tr-card-complete'>
                                        <th class='bold th-evidence' id="address addy" scope="col" style="padding-bottom: 1%"><i class="fas fa-tasks"></i> Atributos</th>
                                        <th class='bold th-evidence' id="address addy" scope="col" style="padding-bottom: 1%"><i class="fas fa-upload"></i> Subir</th>
                                        <th class='bold th-evidence' id="address addy" scope="col" style="padding-bottom: 1%"><i class="far fa-eye"></i> Mirar</th>
                                    </tr>
                                </thead>
                                    <?php $__currentLoopData = $maturityLevels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $maturityLevel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class='heady'>
                                            <th class='th-card bold' id="address addy"><?php echo e($maturityLevel->description); ?></th>
                                        </tr>
                                        <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($attribute->conceptMLId == $maturityLevel->conceptMLId): ?>
                                            <tr>
                                                <td style="text-align: justify">
                                                    <?php echo e($attribute->description); ?>

                                                </td>
                                                <?php for($i=0;$i < sizeof($attributesWithEvidences);$i++): ?>
                                                    <?php if($attribute->attributeId == $attributesWithEvidences[$i]->attributeId): ?>
                                                        <a type="hidden" <?php echo e($with_evidence = 1); ?>></a>
                                                        <td>
                                                            <a href="/upload/<?php echo e($attributesWithEvidences[$i]->evidenceId); ?>/edit">
                                                                <button class="btn btn-evidence" style="background-color: #f7b600 !important; color: black !important;"><strong>Reemplazar evidencia</strong></button>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a href="/storage/upload/<?php echo e($attributesWithEvidences[$i]->link); ?>" target="_blank" class="btn btn-evidence" style="background-color: #329013 !important;"><i class="far fa-eye"></i></a>
                                                        </td>
                                                    <?php endif; ?>
                                                <?php endfor; ?>
                                                <?php if($with_evidence == 1): ?>
                                                    <a type="hidden" <?php echo e($with_evidence = 0); ?>></a>
                                                <?php else: ?>
                                                    <td>
                                                        <a href="/upload/<?php echo e($attribute->attributeId); ?>" class="btn btn-evidence" style="background-color: #12334a !important;"><i class="fas fa-upload"></i></a>
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-evidence" style="background-color: #fb0000 !important;"><i class="fas fa-lock"></i></a>
                                                    </td>
                                                    <a type="hidden"<?php echo e($with_evidence = 0); ?>></a>
                                                <?php endif; ?>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/ICA/resources/views/comunes/test/test.blade.php ENDPATH**/ ?>