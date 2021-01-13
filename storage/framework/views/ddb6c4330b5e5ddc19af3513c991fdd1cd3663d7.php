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

    <div class="container btn-container">

        <input type="button" id="back_area" class="btn btn-primary" value="Regresar" style="display:none;" onclick="BackAreaTest()">

        <input type="button" id="editTest" class="btn btn-warning" value="Editar" style="display:none;" onclick="ShowEditar()">

        <input type="button" id="deleteTest" class="btn btn-danger" value="Eliminar Prueba" style="display:none;" onclick="$('#NoteDeleteTest').modal();">

        <input type="button" id="deleteConcept" class="btn btn-danger" value="Eliminar Concepto" style="display:none;" onclick="$('#NoteDeleteConcept').modal();">

        <input type="button" id="SaveTest" class="btn btn-success" value="Guardar Cambios" style="display:none;" onclick="$('#NoteUpdate').modal();">

        <input type="button" id="CancelTest" class="btn btn-danger" value="Cancelar y Salir" style="display:none;" onclick="EditarTest(false)">

    </div>

    <div class="container">
        <div data-simplebar class="card-height-add-test" style="height: 800px !important;">
            <div class="col text-center">
                <div class="justify-content-center">
                    <div class="card card-add-company">
                        <div class="card-header card-header-cute">
                            <h4 class="no-bottom" style="text-transform: uppercase" id="title_test"><?php echo e($company -> name); ?></h4>
                        </div>
                        <div class="card-body">

                            <form class="form" method="POST" action="<?php echo e(route('UpdateTest', $conceptId)); ?>" style="margin-bottom: 2% !important;" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class='container'>
                                    <input type="submit" class="button-size-08 btn btn-add btn-warning" value="Guardar Cambios">
                                    <a href="<?php echo e(route('CancelTest')); ?>" class="btn btn-primary"><i class="fas fa-sync-alt"></i> Cancelar</a>
                                </div>

                            <div class="form-edits" style="margin-bottom: 2% !important;">
                                <?php if( session('mensaje') ): ?>
                                    <div class="container-edits" style="margin-top: 2%">
                                        <div class="alert alert-success" class='message' id='message'><?php echo e(session('mensaje')); ?></div>
                                    </div>
                                <?php endif; ?>
                                <?php if( session('mensajeError') ): ?>
                                    <div class="container-edits" style="margin-top: 2%">
                                        <div class="alert alert-primary" class='message' id='message'><?php echo e(session('mensajeError')); ?></div>
                                    </div>
                                <?php endif; ?>
                                <table class='table-responsive table-card-inline'>

                                    <tr class="tr-card-complete">
                                        <th class="th-card"><span class="material-icons" style="vertical-align: bottom">speaker_notes</span> Prueba</th>
                                        <td class="td-card">
                                            <input type="text" name="testName" class="form-control <?php $__errorArgs = ['testName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e($testData['name']); ?>" required>
                                            <?php $__errorArgs = ['testName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </td>
                                    </tr>

                                    <tr class="tr-card-complete">
                                        <div class="col-auto my-1">
                                            <th class="th-card"><span class="material-icons" style="vertical-align: bottom">contacts</span> Usuario</th>
                                            <td class="td-card">
                                            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="username">
                                                <option selected value="<?php echo e($test_user_data['id']); ?>"><?php echo e($test_user_data['username']); ?></option>
                                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($user['id']); ?>" style="background-color: #81d4fa"><?php echo e($user['username']); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            </td>
                                        </div>
                                    </tr>

                                    <tr>
                                        <div class="input-group mb-3">
                                            <th class="th-card" id="groupML"><i class="fas fa-layer-group"></i> Grupo de Niveles de Madurez</th>
                                            <td class="td-card">
                                                <select data-old="<?php echo e(old('groupML')); ?>"  type='text' required class="custom-select <?php $__errorArgs = ['groupML'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="groupML">
                                                    <option value="<?php echo e($actualGroupML[0]['MLGroupId']); ?>"> <?php echo e($actualGroupML[0]['name']); ?> </option>
                                                    <?php $__currentLoopData = $groupML; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ML): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($ML->MLGroupId); ?>">
                                                            <?php echo e($ML->name); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <?php $__errorArgs = ['groupML'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($message); ?></strong>
                                                </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </td>
                                        </div>
                                    </tr>

                                    <tr class="tr-card-complete">
                                        <th class="th-card"><span class="material-icons" style="vertical-align: bottom">featured_play_list</span> Concepto</th>
                                        <td class="td-card">
                                            <input type="text" name="conceptName" class="form-control" value="<?php echo e($test_concept_data['description']); ?>" required>
                                        </td>
                                    </tr>

                                    <tr class='tr-card-complete'>
                                        <!--Atributo1-->
                                        <td  class='bold' id="address addy" colspan="2">Nivel de Madurez:
                                            <label style="font-weight: bold">1</label><br>
                                            <i class="fas fa-star"></i>
                                        </td>
                                    </tr>

                                    <tr class="tr-card-complete">
                                        <th class="th-card"><i class="fas fa-user-tag"></i> Atributo 1</th>
                                        <td class="td-card">
                                            <input type="text" name="attribute1" class="form-control" value="<?php echo e($attribute[0]['AD']); ?>" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="th-card"><i class="fas fa-question-circle"></i> Sugerencia</th>
                                        <td class="td-card">
                                            <div class="form-group">
                                                <textarea class="form-control" rows="5" name="suggestion1" required><?php echo e($attribute[0]['AS']); ?></textarea>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr class="tr-card-complete">
                                        <th class="th-card"><i class="fas fa-user-tag"></i> Atributo 2</th>
                                        <td class="td-card">
                                            <input type="text" name="attribute2" class="form-control" value="<?php echo e($attribute[1]['AD']); ?>" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="th-card"><i class="fas fa-question-circle"></i> Sugerencia</th>
                                        <td class="td-card">
                                            <div class="form-group">
                                                <textarea class="form-control" rows="5" name="suggestion2" required><?php echo e($attribute[1]['AS']); ?></textarea>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr class="tr-card-complete">
                                        <th class="th-card"><i class="fas fa-user-tag"></i> Atributo 3</th>
                                        <td class="td-card">
                                            <input type="text" name="attribute3" class="form-control" value="<?php echo e($attribute[2]['AD']); ?>" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="th-card"><i class="fas fa-question-circle"></i> Sugerencia</th>
                                        <td class="td-card">
                                            <div class="form-group">
                                                <textarea class="form-control" rows="5" name="suggestion3" required><?php echo e($attribute[2]['AS']); ?></textarea>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr class='tr-card-complete'>
                                        <!--Atributo1-->
                                        <td  class='bold' id="address addy" colspan="2">Nivel de Madurez:
                                            <label style="font-weight: bold">2</label><br>
                                            <i class="fas fa-star"></i><i class="fas fa-star"></i>
                                        </td>
                                    </tr>

                                    <tr class="tr-card-complete">
                                        <th class="th-card"><i class="fas fa-user-tag"></i> Atributo 4</th>
                                        <td class="td-card">
                                            <input type="text" name="attribute4" class="form-control" value="<?php echo e($attribute[3]['AD']); ?>" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="th-card"><i class="fas fa-question-circle"></i> Sugerencia</th>
                                        <td class="td-card">
                                            <div class="form-group">
                                                <textarea class="form-control" rows="5" name="suggestion4" required><?php echo e($attribute[3]['AS']); ?></textarea>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr class="tr-card-complete">
                                        <th class="th-card"><i class="fas fa-user-tag"></i> Atributo 5</th>
                                        <td class="td-card">
                                            <input type="text" name="attribute5" class="form-control" value="<?php echo e($attribute[4]['AD']); ?>" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="th-card"><i class="fas fa-question-circle"></i> Sugerencia</th>
                                        <td class="td-card">
                                            <div class="form-group">
                                                <textarea class="form-control" rows="5" name="suggestion5" required><?php echo e($attribute[4]['AS']); ?></textarea>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr class="tr-card-complete">
                                        <th class="th-card"><i class="fas fa-user-tag"></i> Atributo 6</th>
                                        <td class="td-card">
                                            <input type="text" name="attribute6" class="form-control" value="<?php echo e($attribute[5]['AD']); ?>" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="th-card"><i class="fas fa-question-circle"></i> Sugerencia</th>
                                        <td class="td-card">
                                            <div class="form-group">
                                                <textarea class="form-control" rows="5" name="suggestion6" required><?php echo e($attribute[5]['AS']); ?></textarea>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr class='tr-card-complete'>
                                        <!--Atributo1-->
                                        <td  class='bold' id="address addy" colspan="2">Nivel de Madurez:
                                            <label style="font-weight: bold">3</label><br>
                                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                        </td>
                                    </tr>

                                    <tr class="tr-card-complete">
                                        <th class="th-card"><i class="fas fa-user-tag"></i> Atributo 7</th>
                                        <td class="td-card">
                                            <input type="text" name="attribute7" class="form-control" value="<?php echo e($attribute[6]['AD']); ?>" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="th-card"><i class="fas fa-question-circle"></i> Sugerencia</th>
                                        <td class="td-card">
                                            <div class="form-group">
                                                <textarea class="form-control" rows="5" name="suggestion7" required><?php echo e($attribute[6]['AS']); ?></textarea>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr class="tr-card-complete">
                                        <th class="th-card"><i class="fas fa-user-tag"></i> Atributo 8</th>
                                        <td class="td-card">
                                            <input type="text" name="attribute8" class="form-control" value="<?php echo e($attribute[7]['AD']); ?>" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="th-card"><i class="fas fa-question-circle"></i> Sugerencia</th>
                                        <td class="td-card">
                                            <div class="form-group">
                                                <textarea class="form-control" rows="5" name="suggestion8" required><?php echo e($attribute[7]['AS']); ?></textarea>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr class="tr-card-complete">
                                        <th class="th-card"><i class="fas fa-user-tag"></i> Atributo 9</th>
                                        <td class="td-card">
                                            <input type="text" name="attribute9" class="form-control" value="<?php echo e($attribute[8]['AD']); ?>" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="th-card"><i class="fas fa-question-circle"></i> Sugerencia</th>
                                        <td class="td-card">
                                            <div class="form-group">
                                                <textarea class="form-control" rows="5" name="suggestion9" required><?php echo e($attribute[8]['AS']); ?></textarea>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr class='tr-card-complete'>
                                        <!--Atributo1-->
                                        <td  class='bold' id="address addy" colspan="2">Nivel de Madurez:
                                            <label style="font-weight: bold">4</label><br>
                                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                        </td>
                                    </tr>

                                    <tr class="tr-card-complete">
                                        <th class="th-card"><i class="fas fa-user-tag"></i> Atributo 10</th>
                                        <td class="td-card">
                                            <input type="text" name="attribute10" class="form-control" value="<?php echo e($attribute[9]['AD']); ?>" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="th-card"><i class="fas fa-question-circle"></i> Sugerencia</th>
                                        <td class="td-card">
                                            <div class="form-group">
                                                <textarea class="form-control" rows="5" name="suggestion10" required><?php echo e($attribute[9]['AS']); ?></textarea>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr class="tr-card-complete">
                                        <th class="th-card"><i class="fas fa-user-tag"></i> Atributo 11</th>
                                        <td class="td-card">
                                            <input type="text" name="attribute11" class="form-control" value="<?php echo e($attribute[10]['AD']); ?>" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="th-card"><i class="fas fa-question-circle"></i> Sugerencia</th>
                                        <td class="td-card">
                                            <div class="form-group">
                                                <textarea class="form-control" rows="5" name="suggestion11" required><?php echo e($attribute[10]['AS']); ?></textarea>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr class="tr-card-complete">
                                        <th class="th-card"><i class="fas fa-user-tag"></i> Atributo 12</th>
                                        <td class="td-card">
                                            <input type="text" name="attribute12" class="form-control" value="<?php echo e($attribute[11]['AD']); ?>" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="th-card"><i class="fas fa-question-circle"></i> Sugerencia</th>
                                        <td class="td-card">
                                            <div class="form-group">
                                                <textarea class="form-control" rows="5" name="suggestion12" required><?php echo e($attribute[11]['AS']); ?></textarea>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr class='tr-card-complete'>
                                        <!--Atributo1-->
                                        <td  class='bold' id="address addy" colspan="2">Nivel de Madurez:
                                            <label style="font-weight: bold">5</label><br>
                                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                        </td>
                                    </tr>

                                    <tr class="tr-card-complete">
                                        <th class="th-card"><i class="fas fa-user-tag"></i> Atributo 13</th>
                                        <td class="td-card">
                                            <input type="text" name="attribute13" class="form-control" value="<?php echo e($attribute[12]['AD']); ?>" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="th-card"><i class="fas fa-question-circle"></i> Sugerencia</th>
                                        <td class="td-card">
                                            <div class="form-group">
                                                <textarea class="form-control" rows="5" name="suggestion13" required><?php echo e($attribute[12]['AS']); ?></textarea>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr class="tr-card-complete">
                                        <th class="th-card"><i class="fas fa-user-tag"></i> Atributo 14</th>
                                        <td class="td-card">
                                            <input type="text" name="attribute14" class="form-control" value="<?php echo e($attribute[13]['AD']); ?>" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="th-card"><i class="fas fa-question-circle"></i> Sugerencia</th>
                                        <td class="td-card">
                                            <div class="form-group">
                                                <textarea class="form-control" rows="5" name="suggestion14" required><?php echo e($attribute[13]['AS']); ?></textarea>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr class="tr-card-complete">
                                        <th class="th-card"><i class="fas fa-user-tag"></i> Atributo 15</th>
                                        <td class="td-card">
                                            <input type="text" name="attribute15" class="form-control" value="<?php echo e($attribute[14]['AD']); ?>" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="th-card"><i class="fas fa-question-circle"></i> Sugerencia</th>
                                        <td class="td-card">
                                            <div class="form-group">
                                                <textarea class="form-control" rows="5" name="suggestion15" required><?php echo e($attribute[14]['AS']); ?></textarea>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                                <div class='container'>
                                    <input type="submit" class="button-size-08 btn btn-add btn-warning" value="Guardar Cambios">
                                    <a href="<?php echo e(route('CancelTest')); ?>" class="btn btn-primary"><i class="fas fa-sync-alt"></i> Cancelar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/ICA/resources/views/admins/area/test/editTest.blade.php ENDPATH**/ ?>