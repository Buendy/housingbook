@extends('layouts.app-verify')

@section('content')
@include('partials.navbar')

<div class="page-header header-filter" filter-color="black">
    <div class="page-header-image" style="background-image:url(./img/bg18.jpg)"></div>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-5 ml-auto mr-auto">

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
                                        <a type="" class="" data-toggle="modal" data-target="#exampleModal">{{__('auth.conditions2')}}</a>.
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
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">{{__('auth.conditions3')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-dark">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aliquam, cum cupiditate distinctio dolore eaque facere, fugit illum impedit nemo officia, quam ratione soluta totam ullam vero voluptatibus? Ea, minus!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">

    </footer>
</div>
@endsection
