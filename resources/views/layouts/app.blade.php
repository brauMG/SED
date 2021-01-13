<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<?php
use App\User;
use App\MaturityLevel;
use Illuminate\Support\Facades\URL;
?>
<head>
    @yield('head')
    <link rel="icon" href="{{ URL::asset('/css/favicon.ico') }}" type="image/x-icon"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sistema de Evaluación Directiva</title>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="{{ asset('js/customer.js') }}" defer></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/1fd9851a23.js" crossorigin="anonymous"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>

    {{--Required for Charts--}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>

    <!-- Styles -->
    <link href="{{ asset('bts4/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('bts4/css/layout.css') }}" rel="stylesheet">
    <link href="{{ asset('bts4/css/datatables.css') }}" rel="stylesheet">
    <link href="{{ asset('bts4/css/sponsors.css') }}" rel="stylesheet">


    {{--Required for TableScrolling--}}
    <link rel="stylesheet" href="https://unpkg.com/simplebar@latest/dist/simplebar.css"/>
    <script src="https://unpkg.com/simplebar@latest/dist/simplebar.min.js"></script>

    {{--Required per Vue.js / Vuetify--}}
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
    <script src="{{ mix('js/app.js') }}" defer></script>

    {{--Required for tables--}}
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>--}}
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/datatables.js') }}"></script>
</head>
    <div class="navbar-ica bg-ica">
        @if(Auth::user()->hasRole('superadmin'))
            <a class="navbar-brand ml-auto" style="color: white">
                <i class="fas fa-user-tie"></i>
                <h6>Super Administrador de {{ User::companyName() }}, {{ Auth::user()->username }}</h6>
            </a>
            <a class="navbar-brand ml-auto" style="color: white" href="#">
                <div class="logout-button" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="text-align: right">
                    <i class="fas fa-sign-out-alt"></i>
                    <h6>Salir</h6>
                </div>
            </a>
        @elseif (Auth::user()->hasRole('admin'))
            <a class="navbar-brand ml-auto" style="color: white">
                <i class="fas fa-user-tie"></i>
                <h6>Administrador de {{ User::companyName() }}, {{ Auth::user()->username }}</h6>
            </a>
            <a class="navbar-brand ml-auto" style="color: white" href="#">
                <div class="logout-button" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="text-align: right">
                    <i class="fas fa-sign-out-alt"></i>
                    <h6>Salir</h6>
                </div>
            </a>
        @elseif (Auth::user()->hasRole('analista'))
            <a class="navbar-brand ml-auto" style="color: white">
                <i class="fas fa-user-tie"></i>
                <h6>Analista de {{ User::companyName() }}, {{ Auth::user()->username }}</h6>
            </a>
            <a class="navbar-brand ml-auto" style="color: white" href="#">
                <div class="logout-button" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="text-align: right">
                    <i class="fas fa-sign-out-alt"></i>
                    <h6>Salir</h6>
                </div>
            </a>
        @elseif (Auth::user()->hasRole('comun'))
            <a class="navbar-brand ml-auto" style="color: white">
                <i class="fas fa-user-tie"></i>
                <h6>Usuario de {{ User::companyName() }}, {{ Auth::user()->username }}</h6>
            </a>
            <a class="navbar-brand ml-auto" style="color: white" href="#">
                <div class="logout-button" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="text-align: right">
                    <i class="fas fa-sign-out-alt"></i>
                    <h6>Salir</h6>
                </div>
            </a>
        @endif
    </div>

    <div class="sidebar">
        @auth
            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                  style="display: none;">
                @csrf
            </form>
        <!-- ROUTES FOR SUPERADMIN -->
            @if(Auth::user()->hasRole('superadmin'))
                <a class="side-font @if(request()->path() == 'CreateAdmin/addAdmin/create')){ active } @else {} @endif" href="{{ url('CreateAdmin/addAdmin/create' ) }}"><span class="material-icons" style="vertical-align: bottom">library_add</span>
                    Añadir Administrador</a>
                <a class="side-font @if(request()->path() == 'CreateCompany/addCompany/create')){ active } @else {} @endif" href="{{ url('CreateCompany/addCompany/create') }}"><span class="material-icons" style="vertical-align: bottom">library_add</span>
                    Añadir Empresa</a>
                <a class="side-font @if(request()->path() == 'superAdmin/addSponsors/create')){ active } @else {} @endif" href="{{ url('/superAdmin/addSponsors/create') }}"><span class="material-icons" style="vertical-align: bottom">library_add</span>
                    Añadir Patrocinador</a>
                <a target="_blank" href="{{ URL::to('/') }}/files/tecManual.pdf" class="side-font"><i class="material-icons" style="vertical-align: bottom;">
                        get_app
                    </i> Manual de Usuario</a>
                <a class="logout_sidebar_button" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" style="background-color: #0000007d !important;">
                    <i class="material-icons" style="vertical-align: bottom;">
                        power_settings_new
                    </i> {{ __('Salir') }}
                </a>

                <!-- ROUTES FOR ADMIN -->
            @elseif(Auth::user()->hasRole('admin'))
                    <a class="side-font @if(request()->path() == 'admins/area/addArea')){ active } @else {} @endif" href="{{ url('/admins/area/addArea') }}"><i class="material-icons" style="vertical-align: bottom;">
                            add_to_photos
                        </i> Añadir
                        Área</a>
                    <a class="side-font @if(request()->path() == 'admins/maturity/addML/create')){ active } @else {} @endif" href="{{ url('/admins/maturity/addML/create') }}">
                        <i class="material-icons" style="vertical-align: bottom;">
                            add_to_photos
                        </i> Añadir Nuevos Niveles de Madurez
                    </a>
                    <a class="side-font @if(request()->path() == 'addUser/create')){ active } @else {} @endif" href="{{ url('/addUser/create') }}"><i class="material-icons" style="vertical-align: bottom;">
                            add_to_photos
                        </i> Añadir
                    Usuario</a>
                    <a class="side-font @if(request()->path() == 'admins/area/test/create')){ active } @else {} @endif" href="{{ url('/admins/area/test/create') }}"><i class="material-icons" style="vertical-align: bottom;">
                        create
                    </i> Crear
                    Prueba</a>
                    <a class="side-font @if(request()->path() == 'admins/area/concept_test/create')){ active } @else {} @endif" href="{{ url('/admins/area/concept_test/create') }}"><i class="material-icons" style="vertical-align: bottom;">
                        text_rotation_none
                    </i> Agregar
                    Conceptos a Pruebas</a>
                    <a class="side-font @if(request()->path() == 'admins/history')){ active } @else {} @endif" href="{{url('/admins/history')}}"><i class="material-icons" style="vertical-align: bottom;">
                        history
                    </i> Historial</a>
                    <a target="_blank" href="{{ URL::to('/') }}/files/manualAdmin.pdf" class="side-font"><i class="material-icons" style="vertical-align: bottom;">
                            get_app
                    </i> Manual de Usuario</a>
                    <a class="logout_sidebar_button" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" style="background-color: #0000007d !important;"><i class="material-icons" style="vertical-align: bottom;">
                            power_settings_new
                        </i> {{ __('Salir') }}
                    </a>
            <!-- ROUTES FOR ANALISTA -->
            @elseif (Auth::user()->hasRole('analista'))
                <a class="side-font @if(request()->path() == 'analista')){ active } @else {} @endif" href="{{ url('/analista') }}"><i class="material-icons" style="vertical-align: bottom;">
                        insert_chart_outlined
                    </i>Lista de Pruebas</a>
                <a class="side-font @if(request()->path() == 'areas')){ active } @else {} @endif" href="{{url('/areas')}}"><i class="material-icons" style="vertical-align: bottom;">
                        show_chart
                    </i> Lista de Áreas</a>
                <a class="side-font @if(request()->path() == 'analista/viewResults/1')){ active } @else {} @endif" href="{{url('/analista/viewResults/1')}}"><i class="material-icons" style="vertical-align: bottom;">
                        bar_chart
                    </i> Ver Resultados</a>
                <a target="_blank" href="{{ URL::to('/') }}/files/manualAnalist.pdf" class="side-font"><i class="material-icons" style="vertical-align: bottom;">
                        get_app
                    </i> Manual de Usuario</a>
                <a class="logout_sidebar_button" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" style="background-color: #0000007d !important;"><i class="material-icons" style="vertical-align: bottom;">
                        power_settings_new
                    </i> {{ __('Salir') }}
                </a>
                <!-- ROUTES FOR COMUN -->
            @elseif(Auth::user()->hasRole('comun'))
                <a class="side-font @if(request()->path() == 'comun')){ active } @else {} @endif" href="{{ url('/comun') }}"><i class="material-icons" style="vertical-align: bottom;">
                        home
                    </i> Inicio</a>
                <a target="_blank" href="{{ URL::to('/') }}/files/manual.pdf" class="side-font"><i class="material-icons" style="vertical-align: bottom;">
                        get_app
                    </i> Manual de Usuario</a>
                <a class="logout_sidebar_button" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" style="background-color: #0000007d !important;"><i class="material-icons" style="vertical-align: bottom;">
                        power_settings_new
                    </i> {{ __('Salir') }}
                </a>
            @endauth
        @endif
    </div>
    <div class="fixContainer mb-4">
        @yield('content')
        @extends('layouts.sponsors')
    </div>
    @yield('script')
</html>
