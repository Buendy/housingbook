<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('img/Logo web 4.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        HousingBook
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <!-- CSS Files -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/paper-dashboard.css?v=2.0.1')}}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{asset('assets/demo/demo.css')}}" rel="stylesheet" />
    <style>
        .red-tooltip + .tooltip > .tooltip-inner {background-color: #f00;}
        .btns-calendar button{
            background-color: #f48942;
        }
        .btns-calendar button:hover{
            background-color: #c46e35;
        }
        .fondo{
            background-color: #e2e0dc;
        }
    </style>
</head>

<body class="">

<div class="wrapper ">
    <div class="sidebar" data-color="brown" data-active-color="danger">
        <!--
          Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
      -->

        <div class="sidebar-wrapper">
            <div class="user">
                <div class="photo">
                    <img src="{{url('/storage/photos/'.auth()->user()->photo)}}"  />
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" class="collapsed" disabled="">
              <span>
                {{Auth::user()->name}}
                  <b class="caret"></b>
              </span>
                    </a>

                </div>
            </div>
            <ul class="nav">
                <li id="activo1" class="active" >
                    <a href="{{route('dashboard')}}" class="active" id="dashboard">
                        <i class="nc-icon nc-minimal-left"></i>
                        <p>{{__('menu.return_dashboard')}}</p>
                    </a>
                </li>

            </ul>

        </div>
    </div>
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <div class="navbar-minimize">
                        <button id="minimizeSidebar" class="btn btn-icon btn-round">
                            <i class="nc-icon nc-minimal-right text-center visible-on-sidebar-mini"></i>
                            <i class="nc-icon nc-minimal-left text-center visible-on-sidebar-regular"></i>
                        </button>
                    </div>
                    <div class="navbar-toggle">
                        <button type="button" class="navbar-toggler">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </button>
                    </div>
                    <a class="navbar-brand" href="/">HousingBook</a><img src="{{asset('img/icono.png')}}" alt="" width="50" height="50">
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navigation">

                    <ul class="navbar-nav">

                        <li class="nav-item">

                            <a class="nav-link btn-magnify" href="{{route('apartments.public')}}">
                                <i class="nc-icon nc-minimal-left"></i>
                                <p>
                                    <span class="d-lg-none d-md-block"></span>
                                </p>{{__('menu.return')}}
                            </a>
                        </li>
                        <li class="nav-item btn-rotate dropdown">
                            <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name . ' - ' . Auth::user()->email }}
                                <p>
                                    <span class="d-lg-none d-md-block"></span>
                                </p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                <a href="" data-toggle="modal" data-target="#apartment" class="dropdown-item">
                                    <i class="now-ui-icons arrows-1_share-66" aria-hidden="true"></i>
                                    <p>{{ __('menu.Logout') }}</p>
                                </a>

                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <span>{{__('menu.language')}}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right"
                                aria-labelledby="navbarDropdown" role="menu">
                                <li>
                                    <a href="{{route('set_language', ['es'])}}" class="dropdown-item">
                                        {{__('menu.spain')}}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('set_language', ['en'])}}" class="dropdown-item">
                                        {{__('menu.english')}}
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>

        <!-- Modal -->
        <div id="apartment" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content bg-light">
                    <div class="modal-header" style="height:20px;">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p class="justify-content-center text-center">{{__('auth.session')}}</p>
                    </div>
                    <div class="modal-footer" style="margin-right: 10px">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <input type="submit" class="btn btn-danger" value="{{__('apartments.accept')}}" name="{{__('apartments.accept')}}">
                        </form>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">{{__('apartments.cancel')}}</button>
                    </div>
                </div>

            </div>
        </div>
        <!-- End Navbar -->
        <!-- <div class="panel-header">

    <canvas id="bigDashboardChart"></canvas>


  </div> -->
        @yield('content')


    </div>

</div>

<!--   Core JS Files   -->
<script src="{{asset('assets/js/core/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/core/popper.min.js')}}"></script>
<script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/moment.min.js')}}"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="{{asset('assets/js/plugins/bootstrap-switch.js')}}"></script>
<!--  Plugin for Sweet Alert -->
<script src="{{asset('assets/js/plugins/sweetalert2.min.js')}}"></script>
<!-- Forms Validations Plugin -->
<script src="{{asset('assets/js/plugins/jquery.validate.min.js')}}"></script>
<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="{{asset('assets/js/plugins/jquery.bootstrap-wizard.js')}}"></script>
<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="{{asset('assets/js/plugins/bootstrap-selectpicker.js')}}"></script>
<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="{{asset('assets/js/plugins/bootstrap-datetimepicker.js')}}"></script>
<!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
<script src="{{asset('assets/js/plugins/jquery.dataTables.min.js')}}"></script>
<!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="{{asset('assets/js/plugins/bootstrap-tagsinput.js')}}"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{asset('assets/js/plugins/jasny-bootstrap.min.js')}}"></script>
<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="{{asset('assets/js/plugins/fullcalendar.min.js')}}"></script>
<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
<script src="{{asset('assets/js/plugins/jquery-jvectormap.js')}}"></script>
<!--  Plugin for the Bootstrap Table -->
<script src="{{asset('assets/js/plugins/nouislider.min.js')}}"></script>
<!-- Chart JS -->
<script src="{{asset('assets/js/plugins/chartjs.min.js')}}"></script>
<!--  Notifications Plugin    -->
<script src="{{asset('assets/js/plugins/bootstrap-notify.js')}}"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{asset('assets/js/paper-dashboard.min.js?v=2.0.1')}}" type="text/javascript"></script>
<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
<script src="{{asset('assets/demo/demo.js')}}"></script>

</body>



</html>
