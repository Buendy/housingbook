
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('img/favicon.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

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

<body class="login-page">
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
<div class="page-header header-filter" filter-color="orange">
    <div class="page-header-image" style="background-image:url('{{asset('img/bg11.jpg')}}')"></div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="info info-hover">
                <div class="icon icon-info icon-circle">
                    <i class="now-ui-icons ui-1_email-85"></i>
                </div>
                <h4 class="info-title">{{__('auth.verify')}}</h4>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-1 mt-2">
                <div class="card-header text-black p-1"><h4>{{ __('auth.verify_title') }}</h4></div>

                <div class="card-body text-black">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            <p>{{ __('auth.mail') }}</p>
                        </div>
                    @endif
                    {{ __('auth.continue') }} <a class="text-info" href="{{ route('verification.resend') }}">{{ __('auth.continue_2') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
    <footer class="footer">
    </footer>
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
<script>
    $(function() {
        $('#alert').click(function(){
            $('#box-two').css("transform","translate(250px,0)");
        });
    });
</script>
</body>

</html>



