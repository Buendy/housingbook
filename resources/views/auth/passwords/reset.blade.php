@extends('layouts.app-verify')

@section('content')
<div class="page-header header-filter" filter-color="orange">
    <div class="page-header-image" style="background-image:url('{{asset('img/bg17.jpg')}}')"></div>
    <div class="content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="info info-hover">
                        <div class="icon icon-primary icon-circle">
                            <i class="now-ui-icons arrows-1_refresh-69"></i>
                        </div>
                        <h4 class="info-title">{{__('passwords.recovery')}}</h4>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card card-login card-plain">
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            {{Form::open(['method' => 'POST', 'route'=>'password.update'])}}
                            @csrf
                            <div class="input-group no-border input-lg">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="users_circle-08"></i></span>
                                </div>
                                <input type="hidden" name="token" value="{{ $token }}">
                                <input id="email" type="email" placeholder="{{__('profile.email')}}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                                <div class="input-group no-border input-lg">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="text_caps-small"></i></span>
                                    </div>
                                    <input id="password" type="password" placeholder="{{__('profile.password')}}" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="input-group no-border input-lg">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="text_caps-small"></i></span>
                                    </div>
                                    {{ Form::password('password_confirmation', ['placeholder' => __('profile.password_confirm'), 'class' => 'form-control']) }}
                                </div>
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-primary btn-round btn btn-block">{{__('passwords.reset')}}</button>
                            </div>
                            {{Form::close()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
    </footer>
</div>
@endsection

