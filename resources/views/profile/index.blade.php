<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200|Open+Sans+Condensed:700" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/now-ui-kit.css?v=1.2.2')}}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{asset('demo/demo.css')}}" rel="stylesheet" />
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-NKDMSK6');
    </script>
    <!-- End Google Tag Manager -->
</head>

<body class="profile-page">
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
@include('partials.navbar')
<div class="wrapper">
    <div class="page-header page-header-small header-filter" filter-color="orange">
        <div class="page-header-image" data-parallax="true" style="background-image:url('../img/bg5.jpg');">
        </div>
        <div class="container">
            <div class="photo-container">
                <img src="{{$user->photo}}" alt="{{$user->name}}" style="width: 100px; height: 100px;">
            </div>
            <h3 class="title">{{$user->name}}</h3>
            <p class="category">{{$user->last_name}}</p>
            <div class="content">
                <div class="social-description">
                    <div class="social-description">
                        <h2>{{count($user->apartments)}}</h2>
                        <p>{{__('menu.apartment')}}</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--<div class="section">
        <div class="container">
            @if($user->id == Auth::user()->id)
                <div class="button-container">
                    <a href="{{route('apartment.index')}}" class="btn btn-primary btn-round btn-lg">{{__('profile.manage')}}</a>
                    <a href="{{route('apartment.createapartment')}}" class="btn btn-primary btn-round btn-lg">{{__('profile.createapartment')}}</a>
                    <a href="{{url('dashboard/user/edit')}}" class="btn btn-primary btn-round btn-lg">{{__('profile.editprofile')}}</a>
                </div>
            @endif
        </div>
    </div>-->

    <br><br><br>
    <div class="container">
        <div class="row justify-content-center">
        @foreach($user->apartments as $apartment)
                <div class="col-md-8 mb-5 shadow rounded p-3">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">

                            <ul class="nav nav-pills nav-pills-primary nav-pills-icons flex-column" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#link{{$nums}}" role="tablist">
                                        <i class="now-ui-icons text_align-left"></i> {{__('apartments.details')}}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#link{{$nums + 1}}" role="tablist">
                                        <i class="now-ui-icons media-1_camera-compact"></i> {{__('apartments.photos')}}
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-8">
                            <div class="tab-content">
                                <div class="tab-pane active" id="link{{$nums}}">
                                    <h6 class="text-primary">
                                        {{$apartment->name}}
                                    </h6>

                                        {{$apartment->short_description}}

                                </div>
                                <div class="tab-pane ml-5" id="link{{$nums + 1}}">
                                    <div id="productCarousel{{$nums + 1}}" class="carousel slide" data-ride="carousel" data-interval="8000" style="width: 80%; height: 80%;">
                                        <ol class="carousel-indicators">
                                            <li data-target="#productCarousel" data-slide-to="0" class="active"></li>
                                            <li data-target="#productCarousel" data-slide-to="1"></li>
                                            <li data-target="#productCarousel" data-slide-to="2"></li>
                                            <li data-target="#productCarousel" data-slide-to="3"></li>
                                        </ol>
                                        <div class="carousel-inner" role="listbox">

                                            <div class="carousel-item active">
                                                <img class="d-block img-raised" src="{{url('/storage/photos/'.$apartment->photos[0]->local_url)}}" alt="{{$apartment->name}}">
                                            </div>
                                            <div class="carousel-item">
                                                <img class="d-block img-raised" src="{{url('/storage/photos/'.$apartment->photos[1]->local_url)}}" alt="{{$apartment->name}}">
                                            </div>
                                            <div class="carousel-item">
                                                <img class="d-block img-raised" src="{{url('/storage/photos/'.$apartment->photos[2]->local_url)}}" alt="{{$apartment->name}}">
                                            </div>
                                            <div class="carousel-item">
                                                <img class="d-block img-raised" src="{{url('/storage/photos/'.$apartment->photos[3]->local_url)}}" alt="{{$apartment->name}}">
                                            </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#productCarousel{{$nums + 1}}" role="button" data-slide="prev">
                                            <button type="button" class="btn btn-primary btn-icon btn-round btn-sm" name="button">
                                                <i class="now-ui-icons arrows-1_minimal-left"></i>
                                            </button>
                                        </a>
                                        <a class="carousel-control-next" href="#productCarousel{{$nums + 1}}" role="button" data-slide="next">
                                            <button type="button" class="btn btn-primary btn-icon btn-round btn-sm" name="button">
                                                <i class="now-ui-icons arrows-1_minimal-right"></i>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        <?php $nums = $nums + 2;?>
        @endforeach

    </div>

</div>
<!--   Core JS Files   -->
<script src="{{ asset('js/core/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('js/core/bootstrap.min.js')}}" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="{{ asset('js/plugins/bootstrap-switch.js')}}"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="{{ asset('js/plugins/nouislider.min.js')}}" type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="{{ asset('js/plugins/moment.min.js')}}"></script>
<!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="{{ asset('js/plugins/bootstrap-tagsinput.js')}}"></script>
<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="{{ asset('js/plugins/bootstrap-selectpicker.js')}}" type="text/javascript"></script>
<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="{{ asset('js/plugins/bootstrap-datetimepicker.js')}}" type="text/javascript"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('js/now-ui-kit.js?v=1.2.2')}}" type="text/javascript"></script>
<!-- Library for parallax, used just in Presentation Page -->
<script src="{{ asset('js/plugins/presentation-page/rellax.min.js')}}" type="text/javascript"></script>
<!-- Place this tag in your head or just before your close body tag. -->
<script async="" defer="" src="https://buttons.github.io/buttons.js"></script>
</body>

</html>
