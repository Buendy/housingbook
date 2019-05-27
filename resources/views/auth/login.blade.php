@extends('layouts.app-verify')

@section('content')
<div class="page-header header-filter" filter-color="orange">
    <div class="page-header-image" style="background-image:url('./img/login.jpg')"></div>
    <div class="content">
        <div class="container">
            <div class="row justify-content-center">

                @if ($errors->any())


                        <div class="col-md-6" id="alert">
                            <div class="alert alert-danger rounded"  role="alert">
                                <div class="container">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">
                      <i class="now-ui-icons ui-1_simple-remove"></i>
                    </span>
                                    </button>
                                    <p><strong>{{__('profile.ups')}}</strong></p>
                                    @foreach ($errors->all() as $error)
                                        <p>{{ $error }}</p>
                                    @endforeach

                                </div>
                            </div>
                        </div>



                @endif



            </div>

            <div class="col-md-5 ml-auto mr-auto">

                <div class="card card-login card-plain">




                    {{Form::open(['method' => 'POST', 'url'=>'login'])}}

                        @csrf
                        <div class="card-header text-center">
                            <div class="logo-container">
                                <img src="../img/now-logo.png" alt="">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="input-group no-border input-lg">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="users_circle-08"></i></span>
                                </div>
                                {{ Form::email('email', old('email'), ['placeholder' => __('profile.email'), 'class' => 'form-control']) }}
                            </div>
                            <div class="input-group no-border input-lg">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="text_caps-small"></i></span>
                                </div>
                                {{ Form::password('password', ['placeholder' => __('profile.password'), 'class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-primary btn-round btn-lg btn-block">{{__('auth.started')}}</button>
                        </div>
                        <div class="pull-left">
                            <h6>
                                <a href="{{route('register')}}" class="link footer-link">{{__('auth.account')}}</a>
                            </h6>
                        </div>
                        <div class="pull-right">
                            <h6>
                                <a href="{{url('password/reset')}}" class="link footer-link">{{__('auth.help')}}</a>
                            </h6>
                        </div>

                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
    </footer>
</div>

@endsection