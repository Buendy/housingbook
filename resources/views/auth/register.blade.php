@extends('layouts.app-verify')

@section('content')


<div class="page-header header-filter" filter-color="black">
    <div class="page-header-image" style="background-image:url(./img/bg18.jpg)"></div>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-4 ml-auto mr-auto">

                        @if ($errors->any())



                                <div class="alert alert-danger rounded"  id="alert" role="alert">
                                    <div class="container">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">
                      <i class="now-ui-icons ui-1_simple-remove"></i>
                    </span>
                                        </button>
                                        <p><strong>Ups!</strong> {{__('auth.error')}}</p>
                                        @foreach ($errors->all() as $error)
                                            <p>{{ $error }}</p>
                                        @endforeach

                                    </div>
                                </div>




                        @endif
                </div>
                <div class="col-md-4 mr-auto">
                    <div class="card card-signup">
                        <div class="card-body">
                            <h4 class="card-title text-center">{{__('auth.register')}}</h4>
                            {!! Form::open(['route'=>'register' , 'method'=>'post']) !!}

                                @csrf
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="users_circle-08"></i></span>
                                    </div>
                                    {{ Form::text('name', old('name'), ['placeholder' => __('profile.name'), 'class' => 'form-control']) }}
                                </div>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="text_caps-small"></i></span>
                                    </div>
                                    {{ Form::text('lastname', old('lastname'), ['placeholder' => __('profile.last_name'), 'class' => 'form-control']) }}
                                </div>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="text_caps-small"></i></span>
                                    </div>
                                    {{ Form::text('address', old('address'), ['placeholder' => __('profile.address'), 'class' => 'form-control']) }}
                                </div>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="text_caps-small"></i></span>
                                    </div>
                                    {{ Form::text('phone', old('phone'), ['placeholder' => __('profile.phone'), 'class' => 'form-control']) }}
                                </div>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ui-1_email-85"></i></span>
                                    </div>
                                    {{ Form::email('email', old('email'), ['placeholder' => __('profile.email'), 'class' => 'form-control']) }}
                                </div>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ui-1_email-85"></i></span>
                                    </div>
                                    {{ Form::password('password', ['placeholder' => __('profile.password'), 'class' => 'form-control']) }}
                                </div>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ui-1_email-85"></i></span>
                                    </div>
                                    {{ Form::password('password_confirmation', ['placeholder' => __('profile.password_confirm'), 'class' => 'form-control']) }}
                                </div>
                                <!-- If you want to add a checkbox to this form, uncomment this code -->
                                <div class="form-check">
                                    <label class="form-check-label">

                                        <input class="form-check-input" type="checkbox" name="conditions">

                                        <span class="form-check-sign"></span>
                                        {{__('auth.conditions')}}
                                        <a href="#something">{{__('auth.conditions2')}}</a>.
                                    </label>
                                </div>
                                <div class="card-footer text-center">
                                    <button class="btn btn-primary btn-round btn-lg">{{__('auth.started2')}}</button>
                                </div>

                            {!! Form::close() !!}
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
