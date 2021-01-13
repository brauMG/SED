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
                <div class="col text-center btn-hover">
                    <a href="" class="selected btn btns-grid border-light btn-layout btn-grid">
                        <div><i class="material-icons" style="vertical-align: bottom;">
                                remove_red_eye
                            </i></div>
                        <div>Ver Resultados</div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <?php if(empty($areas)): ?>
         <div class="container">
             <div class="container bg-light" style="border-radius: 25px;">
                 <div class="row justify-content-center row-left">
                     <div style="text-align: center">
                         <h5 class="display-4">No hay ningún área creada.</h5>
                         <a href="<?php echo e(url('/admins/area/addArea')); ?>">
                             <h5>Puedes crear una aquí.</h5>
                         </a>
                     </div>
                 </div>
             </div>
             <?php else: ?>
                 <div class="dropdown" style="text-align: center">
                     <button class="btn dropdown-toggle dp-areas" type="button" id="dropdownMenu2" data-toggle="dropdown"
                             aria-haspopup="true" aria-expanded="false">
                         <?php echo e($areaSeleccionada->name); ?>

                     </button>
                     <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                         <?php $__currentLoopData = $areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <a href="<?php echo e(route('adminViewResults',$area['areaId'])); ?>">
                                 <button class="dropdown-item " type="button"><?php echo e($area['name']); ?>

                                 </button>
                             </a>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </div>
                 </div>
         </div>
         <?php if(empty($tests)): ?>
             <div class="container" style="text-align: center">
                 <div class="row justify-content-center row-left" style="margin-left: 12%">
                     <div class='center'>
                         <h5 class="display-4">Esta área no tiene pruebas asignadas.</h5>
                         <a href="<?php echo e(url('/admins/area/test/create')); ?>">
                             <h5 style="color: #0F4C75">Puedes crear y asignar una aquí.</h5>
                         </a>
                     </div>
                 </div>
             </div>
         <?php else: ?>
         <?php endif; ?>
         <div class="fixContainer mb-4">
         <div class="container adjust">
             <div data-simplebar class="card-height-add-test">
                 <?php $__currentLoopData = $tests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <div class="col text-center">
                             <div class="justify-content-center">
                                 <div class="card card-see-results" style="border: solid">
                                     <div class="card-header card-header-cute">
                                         <h4 class="no-bottom" style="text-transform: uppercase"><?php echo e($test['name']); ?></h4>
                                     </div>
                                     <div class="card-body" style="background-color: rgba(176, 249, 255, 0.39) !important;">
                                         <div class="container" style="text-align: right">
                                             <i class="far fa-calendar-plus"></i> <strong>Creado el:</strong> <?php echo e($test['startedAt']); ?>

                                             <br>
                                             <i class="fas fa-user-tag"></i> <strong>Usuario asignado:</strong> <?php echo e($test['username']); ?>

                                             <br>
                                             <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                 <?php if($level['MLGroupId'] == $test['MLGroupId']): ?>
                                                    <i class="fas fa-user-tag"></i> <strong>Nivel de madurez aplicado:</strong> <?php echo e($level['name']); ?>

                                                 <?php endif; ?>
                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                         </div>

                                         <div class="row bg-transparent rounded mb-0 column" style="background-color: white !important;">
                                         <div class="col-xl-6 max" style="padding-top: 5%; padding-left: 10%">
                                             <div class="row row2 ">
                                                 <table class="table-responsive table-card-inline">
                                                     <thead class="thead"  style="text-align: left">
                                                     <tr class="tr-card-complete">
                                                         <th scope="col" class="th-card"><i class="fab fa-font-awesome-alt"></i> Concepto</th>
                                                         <th scope="col" class="th-card"><i class="far fa-star"></i> Puntuación</th>
                                                         <th scope="col" class="th-card"><i class="fas fa-level-up-alt"></i> Madurez</th>
                                                     </tr>
                                                     </thead>
                                                     <tbody class="fonts" style="text-align: left">
                                                     <?php $__currentLoopData = (array)$testsConcepts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testConcept): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                         <?php if($testConcept->testId == $test['testId']): ?>
                                                             <tr class="tr-card-complete" pa>
                                                                 <td class="td" style="padding-top: 1%"><i class="fas fa-flag"></i> <?php echo e($testConcept->description); ?></td>
                                                                 <td class="td" style="padding-top: 1%"><i class="fas fa-star"></i> <?php echo e($results[array_search($testConcept,$testsConcepts)]['COUNT(evidenceID)']); ?> de 15
                                                                 </td>
                                                                 <input type="hidden" <?php echo e($total = $total + $results[array_search($testConcept,$testsConcepts)]['COUNT(evidenceID)']); ?> <?php echo e($promedio = $promedio + 1); ?>>
                                                                 <td class="td"style="padding-top: 1%"><i class="fas fa-clipboard"></i>
                                                                     <?php if($results[array_search($testConcept,$testsConcepts)]['COUNT(evidenceID)']===0): ?>
                                                                         Incompleto
                                                                     <?php endif; ?>
                                                                     <?php switch($results[array_search($testConcept,$testsConcepts)]['COUNT(evidenceID)']):
                                                                             case ($results[array_search($testConcept,$testsConcepts)]['COUNT(evidenceID)']<3): ?>
                                                                             <?php $__currentLoopData = $maturityLevels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                             <?php if($test['MLGroupId'] == $item['MLGroupId']): ?>
                                                                                <?php if($item['level']==1): ?>
                                                                                     <?php echo e($item['description']); ?>

                                                                                <?php endif; ?>
                                                                             <?php endif; ?>
                                                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                         <?php break; ?>
                                                                             <?php case ($results[array_search($testConcept,$testsConcepts)]['COUNT(evidenceID)']<6): ?>
                                                                             <?php $__currentLoopData = $maturityLevels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                             <?php if($test['MLGroupId'] == $item['MLGroupId']): ?>
                                                                                 <?php if($item['level']==2): ?>
                                                                                     <?php echo e($item['description']); ?>

                                                                                 <?php endif; ?>
                                                                             <?php endif; ?>
                                                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                         <?php break; ?>
                                                                             <?php case ($results[array_search($testConcept,$testsConcepts)]['COUNT(evidenceID)']<9): ?>
                                                                             <?php $__currentLoopData = $maturityLevels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                             <?php if($test['MLGroupId'] == $item['MLGroupId']): ?>
                                                                                 <?php if($item['level']==3): ?>
                                                                                     <?php echo e($item['description']); ?>

                                                                                 <?php endif; ?>
                                                                             <?php endif; ?>
                                                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                         <?php break; ?>
                                                                             <?php case ($results[array_search($testConcept,$testsConcepts)]['COUNT(evidenceID)']<12): ?>
                                                                             <?php $__currentLoopData = $maturityLevels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                             <?php if($test['MLGroupId'] == $item['MLGroupId']): ?>
                                                                                 <?php if($item['level']==4): ?>
                                                                                     <?php echo e($item['description']); ?>

                                                                                 <?php endif; ?>
                                                                             <?php endif; ?>
                                                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                         <?php break; ?>
                                                                             <?php case ($results[array_search($testConcept,$testsConcepts)]['COUNT(evidenceID)']<=15): ?>
                                                                             <?php $__currentLoopData = $maturityLevels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                             <?php if($test['MLGroupId'] == $item['MLGroupId']): ?>
                                                                                 <?php if($item['level']==5): ?>
                                                                                     <?php echo e($item['description']); ?>

                                                                                 <?php endif; ?>
                                                                             <?php endif; ?>
                                                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                         <?php break; ?>
                                                                     <?php endswitch; ?>
                                                                 </td>
                                                             </tr>
                                                         <?php endif; ?>
                                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                     </tbody>
                                                 </table>
                                             </div>
                                         </div>
                                         <div class="row2 col-xl-6 max my-auto ">
                                             <div class="card bg-transparent" style="border: none; ">
                                                 <div class="card-body">
                                                     <div class="chart" *ngIf="showchart">
                                                         <canvas id="myChart<?php echo e(array_search($test,$tests)); ?>"></canvas>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 <?php endif; ?>
             </div>
         </div>
         </div>
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('script'); ?>
    <script>
                <?php $__currentLoopData = $tests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            var ctx = document.getElementById("myChart<?php echo e(array_search($test,$tests)); ?>");
            var lineChart = new Chart(ctx, {
                type: 'horizontalBar',
                data: {
                    labels: [
                        <?php $__currentLoopData = (array)$testsConcepts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testConcept): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($testConcept->testId == $test['testId']): ?>
                            "<?php echo e($testConcept->description); ?>",
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    ],
                    datasets: [{
                        data:
                            [
                                <?php $__currentLoopData = (array)$testsConcepts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testConcept): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($testConcept->testId == $test['testId']): ?>
                                <?php echo e($results[array_search($testConcept,$testsConcepts)]['COUNT(evidenceID)']); ?>,
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            ],
                        backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360","#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360","#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
                        hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774","#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774","#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"],
                        borderWidth: 5,
                        scaleSteps: 5,
                        scaleStepWidth: 50,
                        scaleStartValue: 0,
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                suggestedMin: 0,
                                min: 0,
                            }
                        }],
                        xAxes: [{
                            ticks: {
                                beginAtZero: true,
                                suggestedMin: 0,
                                min: 0,
                            }
                        }]
                    },
                    legend: {
                        display: false
                    },
                    tooltips: {
                        enabled: true
                    }
                }
            });
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/ICA/resources/views/admins/viewResults/results.blade.php ENDPATH**/ ?>