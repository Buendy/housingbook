@extends('layouts.app-dash')

@section('content')

    <div class="wrapper ">
        <div class="sidebar" data-color="brown" data-active-color="danger">
            <!--
              Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
          -->

            <div class="sidebar-wrapper">
                <div class="user">
                    <div class="photo">
                        <img src="{{asset('assets/img/faces/ayo-ogunseinde-2.jpg')}}" />
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
                                    <a href="#">
                                        <span class="sidebar-mini-icon">MP</span>
                                        <span class="sidebar-normal">My Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="sidebar-mini-icon">EP</span>
                                        <span class="sidebar-normal">Edit Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="sidebar-mini-icon">S</span>
                                        <span class="sidebar-normal">Settings</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <ul class="nav">
                    <li class="active">
                        <a href="{{route('dashboard')}}">
                            <i class="nc-icon nc-bank nc-bullet-list-67"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#mapsExamples">
                            <i class="nc-icon nc-pin-3"></i>
                            <p>
                                {{__('menu.apartment')}}
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse " id="mapsExamples">
                            <ul class="nav">
                                <li>
                                    <a href="{{route('apartment.createapartment')}}">
                                        <span class="sidebar-mini-icon">AA</span>
                                        <span class="sidebar-normal">{{__('profile.createapartment')}}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('profile.manage')}}">
                                        <span class="sidebar-mini-icon">EA</span>
                                        <span class="sidebar-normal">{{__('profile.manage')}}</span>
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
                        <a class="navbar-brand" href="#pablo">HousingBook</a>
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
                                        <span class="d-lg-none d-md-block">Stats</span>
                                    </p>{{__('menu.return')}}
                                </a>
                            </li>
                            <li class="nav-item btn-rotate dropdown">
                                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name . ' - ' . Auth::user()->email }}
                                    <p>
                                        <span class="d-lg-none d-md-block">Some Actions</span>
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="now-ui-icons arrows-1_share-66" aria-hidden="true"></i>
                                        <p>{{ __('Logout') }}</p>

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
            <!-- End Navbar -->
            <!-- <div class="panel-header">

        <canvas id="bigDashboardChart"></canvas>


      </div> -->
            <div class="content">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-5 col-md-4">
                                        <div class="icon-big text-center icon-warning">
                                            <i class="nc-icon nc-globe text-warning"></i>
                                        </div>
                                    </div>
                                    <div class="col-7 col-md-8">
                                        <div class="numbers">
                                            <p class="card-category">Capacity</p>
                                            <p class="card-title">150GB
                                            <p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <hr>
                                <div class="stats">
                                    <i class="fa fa-refresh"></i> Update Now
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-5 col-md-4">
                                        <div class="icon-big text-center icon-warning">
                                            <i class="nc-icon nc-money-coins text-success"></i>
                                        </div>
                                    </div>
                                    <div class="col-7 col-md-8">
                                        <div class="numbers">
                                            <p class="card-category">Revenue</p>
                                            <p class="card-title">$ 1,345
                                            <p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <hr>
                                <div class="stats">
                                    <i class="fa fa-calendar-o"></i> Last day
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-5 col-md-4">
                                        <div class="icon-big text-center icon-warning">
                                            <i class="nc-icon nc-vector text-danger"></i>
                                        </div>
                                    </div>
                                    <div class="col-7 col-md-8">
                                        <div class="numbers">
                                            <p class="card-category">Errors</p>
                                            <p class="card-title">23
                                            <p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <hr>
                                <div class="stats">
                                    <i class="fa fa-clock-o"></i> In the last hour
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-5 col-md-4">
                                        <div class="icon-big text-center icon-warning">
                                            <i class="nc-icon nc-favourite-28 text-primary"></i>
                                        </div>
                                    </div>
                                    <div class="col-7 col-md-8">
                                        <div class="numbers">
                                            <p class="card-category">Followers</p>
                                            <p class="card-title">+45K
                                            <p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <hr>
                                <div class="stats">
                                    <i class="fa fa-refresh"></i> Update now
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card  card-tasks">
                            <div class="card-header ">
                                <h4 class="card-title">Tasks</h4>
                                <h5 class="card-category">Backend development</h5>
                            </div>
                            <div class="card-body ">
                                <div class="table-full-width table-responsive">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" checked>
                                                        <span class="form-check-sign"></span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td class="img-row">
                                                <div class="img-wrapper">
                                                    <img src="../assets/img/faces/ayo-ogunseinde-2.jpg" class="img-raised" />
                                                </div>
                                            </td>
                                            <td class="text-left">Sign contract for "What are conference organizers afraid of?"</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                                                    <i class="nc-icon nc-ruler-pencil"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="" class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Remove">
                                                    <i class="nc-icon nc-simple-remove"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox">
                                                        <span class="form-check-sign"></span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td class="img-row">
                                                <div class="img-wrapper">
                                                    <img src="../assets/img/faces/erik-lucatero-2.jpg" class="img-raised" />
                                                </div>
                                            </td>
                                            <td class="text-left">Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                                                    <i class="nc-icon nc-ruler-pencil"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="" class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Remove">
                                                    <i class="nc-icon nc-simple-remove"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" checked>
                                                        <span class="form-check-sign"></span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td class="img-row">
                                                <div class="img-wrapper">
                                                    <img src="../assets/img/faces/kaci-baum-2.jpg" class="img-raised" />
                                                </div>
                                            </td>
                                            <td class="text-left">Using dummy content or fake information in the Web design process can result in products with unrealistic
                                            </td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                                                    <i class="nc-icon nc-ruler-pencil"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="" class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Remove">
                                                    <i class="nc-icon nc-simple-remove"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox">
                                                        <span class="form-check-sign"></span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td class="img-row">
                                                <div class="img-wrapper">
                                                    <img src="../assets/img/faces/joe-gardner-2.jpg" class="img-raised" />
                                                </div>
                                            </td>
                                            <td class="text-left">But I must explain to you how all this mistaken idea of denouncing pleasure</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                                                    <i class="nc-icon nc-ruler-pencil"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="" class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Remove">
                                                    <i class="nc-icon nc-simple-remove"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <hr>
                                <div class="stats">
                                    <i class="fa fa-refresh spin"></i> Updated 3 minutes ago
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <footer class="footer footer-black  footer-white ">
                    <div class="container-fluid">
                        <div class="row">
                            <nav class="footer-nav">
                                <ul>
                                    <li>
                                        <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>
                                    </li>
                                    <li>
                                        <a href="http://blog.creative-tim.com/" target="_blank">Blog</a>
                                    </li>
                                    <li>
                                        <a href="https://www.creative-tim.com/license" target="_blank">Licenses</a>
                                    </li>
                                </ul>
                            </nav>
                            <div class="credits ml-auto">
              <span class="copyright">
                ©
                <script>
                  document.write(new Date().getFullYear())
                </script>, made with <i class="fa fa-heart heart"></i> by Creative Tim
              </span>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

    </div>


@endsection
