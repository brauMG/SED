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
                    <a href="<?php echo e(url('/areas')); ?>" class="btn btns-grid border-light btn-layout btn-grid">
                        <div><i class="material-icons" style="vertical-align: bottom;">
                                show_chart
                            </i></div>
                        <div>Lista de Areas</div>
                    </a>
                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="container-dropdown-evidence">
            <div class="dropdown dropping">
                <button class="btn dropdown-toggle dp-areas" type="button" id="dropdownMenu2" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" style="">
                    <?php echo e($selectedConcept['description']); ?>

                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <?php $__currentLoopData = $concepts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $concept): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($selectedConcept['description'] == $concept->description): ?>
                        <?php else: ?>
                            <a class="dropdown-item" href="<?php echo e(route('analistaTest',[$concept->testId,$concept->conceptId])); ?>"><?php echo e($concept->description); ?></a>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                            <form method="post" target="_blank" action="/test">
                                <input type="hidden" name="email" value="<?php echo e($email); ?>">
                                <input type="hidden" name="commonUserId" value="<?php echo e($commonUserId); ?>">
                                <input type="hidden" name="username" value="<?php echo e($name); ?> <?php echo e($lastName); ?>">
                                <input type="hidden" name="testName" value="<?php echo e($testName); ?>">
                                <input type="hidden" name="analistName" value="<?php echo e($analistFirstName); ?> <?php echo e($analistLastName); ?>">
                                <?php for($i = 0; $i < count($emailsAdmins); $i++): ?>
                                    <input type="hidden" name="emailsAdmins[<?php echo e($i); ?>]" value="<?php echo e($emailsAdmins[$i]); ?>">
                                <?php endfor; ?>
                                <?php for($i = 0; $i < count($emailsAnalistas); $i++): ?>
                                    <input type="hidden" name="emailsAnalistas[<?php echo e($i); ?>]" value="<?php echo e($emailsAnalistas[$i]); ?>">
                                <?php endfor; ?>
                                <?php echo csrf_field(); ?>
                                    <div class="container">
                                    <tr class='row'>
                                        <p class='' style="text-align: start"><i class="fas fa-user-check"></i><strong> Usuario:</strong> <?php echo e($name); ?> <?php echo e($lastName); ?></p>
                                        <p class='' style="text-align: start"><i class="fas fa-inbox"></i><strong> Correo:</strong> <?php echo e($email); ?></p>
                                    </tr>
                                    </div>
                                <table class="table-responsive table-card-inline">
                                    <thead>
                                    <tr class='tr-card-complete'>
                                        <th class='bold th-evidence-analist' id="address addy" scope="col"><i class="fas fa-tasks"></i> Atributos</th>
                                        <th class='bold th-evidence-analist' id="address addy" scope="col"><i class="fas fa-download"></i> Descargar</th>
                                        <th class='bold th-evidence-analist' id="address addy" scope="col"><i class="far fa-check-circle"></i> Validar</th>
                                        <th class='bold th-evidence-analist' id="address addy" scope="col"><i class="far fa-check-circle"></i> Sugerencia</th>
                                    </tr>
                                    </thead>
                                    <?php $__currentLoopData = $maturityLevels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $maturityLevel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class='heady'>
                                            <th class='th-card bold' id="address addy" >
                                                <?php echo e($maturityLevel->description); ?>

                                            </th>
                                        </tr>
                                        <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($attribute->conceptMLId == $maturityLevel->conceptMLId): ?>
                                                <tr>
                                                    <td style="text-align: justify">
                                                        <?php echo e($attribute->description); ?>

                                                    </td>
                                                    <input type="hidden" name="attribute-name[]" value="<?php echo e($attribute->attributeId); ?>">
                                                    <?php for($i=0;$i < sizeof($attributesWithEvidences);$i++): ?>
                                                        <?php if($attribute->attributeId == $attributesWithEvidences[$i]->attributeId): ?>
                                                            <a type="hidden" <?php echo e($with_evidence = 1); ?>></a>
                                                            <td>
                                                                <a target="_blank" href="/storage/upload/<?php echo e($attributesWithEvidences[$i]->link); ?>" class="btn btn-evidence">
                                                                    <div><i class="material-icons" style="vertical-align: bottom">cloud_download</i>
                                                                    </div>
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <div class="form-check">
                                                                    <label
                                                                        for="attributeCheck<?php echo e($attributesWithEvidences[$i]->attributeId); ?>">
                                                                    </label>
                                                                    <input type="hidden"  name="attributeCheck[<?php echo e($attributesWithEvidences[$i]->attributeId); ?>]" value="off" >
                                                                    <input type="checkbox" class="form-check-input" name="attributeCheck[<?php echo e($attributesWithEvidences[$i]->attributeId); ?>]" id="attributeCheck<?php echo e($attributesWithEvidences[$i]->attributeId); ?>"
                                                                           <?php if($attributesWithEvidences[$i]->verified === 1): ?>checked
                                                                    <?php else: ?>
                                                                        <?php endif; ?>>
                                                                    <label class="form-check-label" for="exampleCheck1">Validar evidencia</label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-check">
                                                                    <label
                                                                        for="suggestionCheck<?php echo e($attributesWithEvidences[$i]->attributeId); ?>">
                                                                    </label>
                                                                    <input type="hidden"  name="suggestionCheck[<?php echo e($attributesWithEvidences[$i]->attributeId); ?>]" value="off" >
                                                                    <input type="checkbox" class="form-check-input" name="suggestionCheck[<?php echo e($attributesWithEvidences[$i]->attributeId); ?>]" id="suggestionCheck<?php echo e($attributesWithEvidences[$i]->attributeId); ?>">
                                                                    <label class="form-check-label" for="exampleCheck1">Enviar sugerencia</label>
                                                                </div>
                                                            </td>
                                                        <?php endif; ?>
                                                    <?php endfor; ?>
                                                    <?php if($with_evidence == 1): ?>
                                                        <a type="hidden" <?php echo e($with_evidence = 0); ?>></a>
                                                    <?php else: ?>
                                                        <td>
                                                            <a class="btn btn-no-evidence">
                                                                <div>
                                                                    <i class="material-icons" style="vertical-align: bottom">cloud_off</i>
                                                                </div>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" value="off" disabled>
                                                                <label class="form-check-label" for="exampleCheck1">Validar evidencia</label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" value="off" disabled>
                                                                <label class="form-check-label" for="exampleCheck1">Enviar sugerencia</label>
                                                            </div>
                                                        </td>

                                                        <a type="hidden"<?php echo e($with_evidence = 0); ?>></a>
                                                    <?php endif; ?>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </table>
                                <div class="container">
                                    <tr>
                                        <th class="th-card"><i class="fas fa-question-circle"></i> Observación adicional: </th>
                                        <td class="td-card"> <div class="form-group">
                                                <textarea class="form-control" rows="5" name="observation" style="background-color: #eff0ee"></textarea>
                                            </div>
                                        </td>
                                    </tr>
                                </div>
                                    <?php if(count($attributesWithEvidences) == 0): ?>
                                    <div class="container">
                                        <button class="button-size-08 btn btn-add btn-primary" style="background-color: #a21612; color: white" disabled>Aún Sin Responder</button>
                                    </div>
                                    <?php else: ?>
                                        <div class="container">
                                            <button type="submit" class="button-size-08 btn btn-add btn-primary">Enviar Resultados</button>
                                        </div>
                                    <?php endif; ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/ICA/resources/views/analistas/test/test.blade.php ENDPATH**/ ?>