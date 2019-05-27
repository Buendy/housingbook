@extends('layouts.app-verify')

@section('content')
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>

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

    </div>
@endsection



