<!DOCTYPE html>
<html lang="en">

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
                    <a data-toggle="collapse" href="#collapseExample" class="collapsed">
              <span>
                {{Auth::user()->name}}
                  <b class="caret"></b>
              </span>
                    </a>
                    <div class="clearfix"></div>
                    <div class="collapse" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="#" id="profile">
                                    <span class="sidebar-mini-icon">MP</span>
                                    <span class="sidebar-normal">{{__('dashboard.profile')}}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('user.edit')}}" id="profileedit">
                                    <span class="sidebar-mini-icon">EP</span>
                                    <span class="sidebar-normal">{{__('dashboard.edit')}}</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" id="profilepassword">
                                    <span class="sidebar-mini-icon">PC</span>
                                    <span class="sidebar-normal">{{__('dashboard.password')}}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('user.telegram')}}" id="profiletelegram">
                                    <span class="sidebar-mini-icon">TI</span>
                                    <span class="sidebar-normal">{{__('dashboard.telegram')}}</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav">
                <li id="activo1">
                    <a href="#" id="dashboard">
                        <i class="nc-icon nc-bank nc-bullet-list-67"></i>
                        <p>{{__('menu.dashboard')}}</p>
                    </a>
                </li>
                <li id="activo2">
                    <a data-toggle="collapse" href="#mapsExamples">
                        <i class="nc-icon nc-pin-3"></i>
                        <p>
                            {{__('menu.apartment')}}
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="mapsExamples">
                        <ul class="nav">
                            <li>
                                <a href="{{ url('/dashboard/apartment/create') }}">
                                    <span class="sidebar-mini-icon">AA</span>
                                    <span class="sidebar-normal">{{__('profile.createapartment')}}</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" id="apartmentmanage">
                                    <span class="sidebar-mini-icon">EA</span>
                                    <span class="sidebar-normal">{{__('profile.manage')}}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li id="activo3">
                    <a data-toggle="collapse" href="#History">
                        <i class="fa fa-history"></i>
                        <p>
                            {{__('menu.history')}}
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse " id="History">
                        <ul class="nav">
                            <li>
                                <a href="#" id="history">
                                    <span class="sidebar-mini-icon">H</span>
                                    <span class="sidebar-normal">{{__('menu.history')}}</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" id="invoices">
                                    <span class="sidebar-mini-icon">I</span>
                                    <span class="sidebar-normal">{{__('menu.invoices')}}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
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

        <br><br><br>
        <div class="mt-5 row justify-content-center">
            @if(count($errors) > 0)
                <div class="col-md-5">
                    @foreach($errors->all() as $error)
                        <div class="callout alert alert-danger">
                            {{$error}}
                        </div>
                    @endforeach
                </div>
            @endif
            @if(session('success'))
                <div class="col-md-5">
                    <div class="alert alert-info">
                        {{session('success')}}
                    </div>
                </div>
            @endif

            @if(session('error'))
                <div class="col-md-5">
                    <div class="alert alert-info">
                        {{session('error')}}
                    </div>
                </div>
            @endif
        </div>
        <div id="ajaxviews"></div>

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
<script>
    $(document).ready(function() {

        $.ajax(
            {
                url: "/dashboard/index",
                type: 'GET',
            }).done(

            function(data)
            {
                $('#ajaxviews').html(data.html);
            }
        );

        $("#dashboard").click(function(event){
            event.preventDefault();
            location.reload();
        });

        $("#history").click(function(event){
            event.preventDefault();
            $.ajax(
                {
                    url: "/dashboard/invoices/index",
                    type: 'GET',
                }).done(

                function(data)
                {
                    $('#ajaxviews').html(data.html);
                }
            );
        });

        $("#invoices").click(function(event){
            event.preventDefault();
            $.ajax(
                {
                    url: "/dashboard/invoices/invoices",
                    type: 'GET',
                }).done(

                function(data)
                {
                    $('#ajaxviews').html(data.html);
                }
            );
        });

        $("#profile").click(function(event){
            event.preventDefault();
            $.ajax(
                {
                    url: "/dashboard/user/show",
                    type: 'GET',
                }).done(

                function(data)
                {
                    $('#ajaxviews').html(data.html);
                }
            );
        });

        $("#profilepassword").click(function(event){
            event.preventDefault();
            $.ajax(
                {
                    url: "/dashboard/user/password",
                    type: 'GET',
                }).done(

                function(data)
                {
                    $('#ajaxviews').html(data.html);
                }
            );
        });

        $("#apartmentmanage").click(function(event){
            event.preventDefault();
            $.ajax(
                {
                    url: "/dashboard/apartment/index",
                    type: 'GET',
                }).done(

                function(data)
                {
                    $('#ajaxviews').html(data.html);
                }
            );
        });

        enlaceActivo();
        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

        demo.initVectorMap();

        function enlaceActivo() {
            url = window.location;

            activo1 = $('#activo1');
            activo2 = $('#activo2');
            activo3 = $('#activo3');
            apartment = new RegExp('apartment');
            invoices = new RegExp('invoices');

            activo1.removeClass('active');
            activo2.removeClass('active');
            activo3.removeClass('active');

            if(apartment.test(url)){
                activo2.addClass('active');
            }else if(invoices.test(url)){
                activo3.addClass('active');
            }else{
                activo1.addClass('active');
            }
        }

    });
</script>
</body>



</html>
