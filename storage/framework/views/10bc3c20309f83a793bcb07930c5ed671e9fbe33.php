<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<?php
use App\User;
use App\MaturityLevel;
use Illuminate\Support\Facades\URL;
?>
<head>
    <?php echo $__env->yieldContent('head'); ?>
    <link rel="icon" href="<?php echo e(URL::asset('/css/favicon.ico')); ?>" type="image/x-icon"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Sistema de Evaluación Directiva</title>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="<?php echo e(asset('js/customer.js')); ?>" defer></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/1fd9851a23.js" crossorigin="anonymous"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>

    
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>

    <!-- Styles -->
    <link href="<?php echo e(asset('bts4/css/bootstrap.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('bts4/css/layout.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('bts4/css/datatables.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('bts4/css/sponsors.css')); ?>" rel="stylesheet">


    
    <link rel="stylesheet" href="https://unpkg.com/simplebar@latest/dist/simplebar.css"/>
    <script src="https://unpkg.com/simplebar@latest/dist/simplebar.min.js"></script>

    
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
    <script src="<?php echo e(mix('js/app.js')); ?>" defer></script>

    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="<?php echo e(asset('js/datatables.js')); ?>"></script>
</head>
    <div class="navbar-ica bg-ica">
        <?php if(Auth::user()->hasRole('superadmin')): ?>
            <a class="navbar-brand ml-auto" style="color: white">
                <i class="fas fa-user-tie"></i>
                <h6>Super Administrador de <?php echo e(User::companyName()); ?>, <?php echo e(Auth::user()->username); ?></h6>
            </a>
            <a class="navbar-brand ml-auto" style="color: white" href="#">
                <div class="logout-button" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="text-align: right">
                    <i class="fas fa-sign-out-alt"></i>
                    <h6>Salir</h6>
                </div>
            </a>
        <?php elseif(Auth::user()->hasRole('admin')): ?>
            <a class="navbar-brand ml-auto" style="color: white">
                <i class="fas fa-user-tie"></i>
                <h6>Administrador de <?php echo e(User::companyName()); ?>, <?php echo e(Auth::user()->username); ?></h6>
            </a>
            <a class="navbar-brand ml-auto" style="color: white" href="#">
                <div class="logout-button" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="text-align: right">
                    <i class="fas fa-sign-out-alt"></i>
                    <h6>Salir</h6>
                </div>
            </a>
        <?php elseif(Auth::user()->hasRole('analista')): ?>
            <a class="navbar-brand ml-auto" style="color: white">
                <i class="fas fa-user-tie"></i>
                <h6>Analista de <?php echo e(User::companyName()); ?>, <?php echo e(Auth::user()->username); ?></h6>
            </a>
            <a class="navbar-brand ml-auto" style="color: white" href="#">
                <div class="logout-button" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="text-align: right">
                    <i class="fas fa-sign-out-alt"></i>
                    <h6>Salir</h6>
                </div>
            </a>
        <?php elseif(Auth::user()->hasRole('comun')): ?>
            <a class="navbar-brand ml-auto" style="color: white">
                <i class="fas fa-user-tie"></i>
                <h6>Usuario de <?php echo e(User::companyName()); ?>, <?php echo e(Auth::user()->username); ?></h6>
            </a>
            <a class="navbar-brand ml-auto" style="color: white" href="#">
                <div class="logout-button" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="text-align: right">
                    <i class="fas fa-sign-out-alt"></i>
                    <h6>Salir</h6>
                </div>
            </a>
        <?php endif; ?>
    </div>

    <div class="sidebar">
        <?php if(auth()->guard()->check()): ?>
            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST"
                  style="display: none;">
                <?php echo csrf_field(); ?>
            </form>
        <!-- ROUTES FOR SUPERADMIN -->
            <?php if(Auth::user()->hasRole('superadmin')): ?>
                <a class="side-font <?php if(request()->path() == 'CreateAdmin/addAdmin/create'): ?>){ active } <?php else: ?> {} <?php endif; ?>" href="<?php echo e(url('CreateAdmin/addAdmin/create' )); ?>"><span class="material-icons" style="vertical-align: bottom">library_add</span>
                    Añadir Administrador</a>
                <a class="side-font <?php if(request()->path() == 'CreateCompany/addCompany/create'): ?>){ active } <?php else: ?> {} <?php endif; ?>" href="<?php echo e(url('CreateCompany/addCompany/create')); ?>"><span class="material-icons" style="vertical-align: bottom">library_add</span>
                    Añadir Empresa</a>
                <a class="side-font <?php if(request()->path() == 'superAdmin/addSponsors/create'): ?>){ active } <?php else: ?> {} <?php endif; ?>" href="<?php echo e(url('/superAdmin/addSponsors/create')); ?>"><span class="material-icons" style="vertical-align: bottom">library_add</span>
                    Añadir Patrocinador</a>
                <a target="_blank" href="<?php echo e(URL::to('/')); ?>/files/tecManual.pdf" class="side-font"><i class="material-icons" style="vertical-align: bottom;">
                        get_app
                    </i> Manual de Usuario</a>
                <a class="logout_sidebar_button" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" style="background-color: #0000007d !important;">
                    <i class="material-icons" style="vertical-align: bottom;">
                        power_settings_new
                    </i> <?php echo e(__('Salir')); ?>

                </a>

                <!-- ROUTES FOR ADMIN -->
            <?php elseif(Auth::user()->hasRole('admin')): ?>
                    <a class="side-font <?php if(request()->path() == 'admins/area/addArea'): ?>){ active } <?php else: ?> {} <?php endif; ?>" href="<?php echo e(url('/admins/area/addArea')); ?>"><i class="material-icons" style="vertical-align: bottom;">
                            add_to_photos
                        </i> Añadir
                        Área</a>
                    <a class="side-font <?php if(request()->path() == 'admins/maturity/addML/create'): ?>){ active } <?php else: ?> {} <?php endif; ?>" href="<?php echo e(url('/admins/maturity/addML/create')); ?>">
                        <i class="material-icons" style="vertical-align: bottom;">
                            add_to_photos
                        </i> Añadir Nuevos Niveles de Madurez
                    </a>
                    <a class="side-font <?php if(request()->path() == 'addUser/create'): ?>){ active } <?php else: ?> {} <?php endif; ?>" href="<?php echo e(url('/addUser/create')); ?>"><i class="material-icons" style="vertical-align: bottom;">
                            add_to_photos
                        </i> Añadir
                    Usuario</a>
                    <a class="side-font <?php if(request()->path() == 'admins/area/test/create'): ?>){ active } <?php else: ?> {} <?php endif; ?>" href="<?php echo e(url('/admins/area/test/create')); ?>"><i class="material-icons" style="vertical-align: bottom;">
                        create
                    </i> Crear
                    Prueba</a>
                    <a class="side-font <?php if(request()->path() == 'admins/area/concept_test/create'): ?>){ active } <?php else: ?> {} <?php endif; ?>" href="<?php echo e(url('/admins/area/concept_test/create')); ?>"><i class="material-icons" style="vertical-align: bottom;">
                        text_rotation_none
                    </i> Agregar
                    Conceptos a Pruebas</a>
                    <a class="side-font <?php if(request()->path() == 'admins/history'): ?>){ active } <?php else: ?> {} <?php endif; ?>" href="<?php echo e(url('/admins/history')); ?>"><i class="material-icons" style="vertical-align: bottom;">
                        history
                    </i> Historial</a>
                    <a target="_blank" href="<?php echo e(URL::to('/')); ?>/files/manualAdmin.pdf" class="side-font"><i class="material-icons" style="vertical-align: bottom;">
                            get_app
                    </i> Manual de Usuario</a>
                    <a class="logout_sidebar_button" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();document.getElementById('logout-form').submit();" style="background-color: #0000007d !important;"><i class="material-icons" style="vertical-align: bottom;">
                            power_settings_new
                        </i> <?php echo e(__('Salir')); ?>

                    </a>
            <!-- ROUTES FOR ANALISTA -->
            <?php elseif(Auth::user()->hasRole('analista')): ?>
                <a class="side-font <?php if(request()->path() == 'analista'): ?>){ active } <?php else: ?> {} <?php endif; ?>" href="<?php echo e(url('/analista')); ?>"><i class="material-icons" style="vertical-align: bottom;">
                        insert_chart_outlined
                    </i>Lista de Pruebas</a>
                <a class="side-font <?php if(request()->path() == 'areas'): ?>){ active } <?php else: ?> {} <?php endif; ?>" href="<?php echo e(url('/areas')); ?>"><i class="material-icons" style="vertical-align: bottom;">
                        show_chart
                    </i> Lista de Áreas</a>
                <a class="side-font <?php if(request()->path() == 'analista/viewResults/1'): ?>){ active } <?php else: ?> {} <?php endif; ?>" href="<?php echo e(url('/analista/viewResults/1')); ?>"><i class="material-icons" style="vertical-align: bottom;">
                        bar_chart
                    </i> Ver Resultados</a>
                <a target="_blank" href="<?php echo e(URL::to('/')); ?>/files/manualAnalist.pdf" class="side-font"><i class="material-icons" style="vertical-align: bottom;">
                        get_app
                    </i> Manual de Usuario</a>
                <a class="logout_sidebar_button" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" style="background-color: #0000007d !important;"><i class="material-icons" style="vertical-align: bottom;">
                        power_settings_new
                    </i> <?php echo e(__('Salir')); ?>

                </a>
                <!-- ROUTES FOR COMUN -->
            <?php elseif(Auth::user()->hasRole('comun')): ?>
                <a class="side-font <?php if(request()->path() == 'comun'): ?>){ active } <?php else: ?> {} <?php endif; ?>" href="<?php echo e(url('/comun')); ?>"><i class="material-icons" style="vertical-align: bottom;">
                        home
                    </i> Inicio</a>
                <a target="_blank" href="<?php echo e(URL::to('/')); ?>/files/manual.pdf" class="side-font"><i class="material-icons" style="vertical-align: bottom;">
                        get_app
                    </i> Manual de Usuario</a>
                <a class="logout_sidebar_button" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" style="background-color: #0000007d !important;"><i class="material-icons" style="vertical-align: bottom;">
                        power_settings_new
                    </i> <?php echo e(__('Salir')); ?>

                </a>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <div class="fixContainer mb-4">
        <?php echo $__env->yieldContent('content'); ?>
        
    </div>
    <?php echo $__env->yieldContent('script'); ?>
</html>

<?php echo $__env->make('layouts.sponsors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/ICA/resources/views/layouts/app.blade.php ENDPATH**/ ?>