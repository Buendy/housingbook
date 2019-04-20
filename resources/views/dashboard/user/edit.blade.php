@extends('layouts.app-dash')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-1">

            </div>
            <div class="col-md-6">
                <div class="card card-user">
                    <div class="card-header">
                        <h5 class="title text-center">{{__('profile.edit_profile')}}</h5>
                    </div>
                    <hr>
                    <div class="card-body ">
                        {{Form::open(['method' => 'PUT','action' => ['dashboard\UserController@update',auth()->user()->id]])}}
                        <div class="row">
                            <label class="col-md-3 col-form-label">{{__('profile.name')}}</label>

                            <div class="col-md-8">
                                <div class="form-group">
                                    {{Form::text('name',old('name',$user->name), ['id' => 'name','class' => 'form-control'])}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">{{__('profile.last_name')}}</label>
                            <div class="col-md-8">
                                <div class="form-group">
                                    {{Form::text('last_name',old('last_name',$user->last_name), ['id' => 'last_name','class' => 'form-control'])}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">{{__('profile.email')}}</label>
                            <div class="col-md-8">
                                <div class="form-group">
                                    {{Form::text('email',old('email',$user->email), ['id' => 'email','class' => 'form-control'])}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">{{__('profile.apartmentaddress')}}</label>
                            <div class="col-md-8">
                                <div class="form-group">
                                    {{Form::text('address',old('address',$user->address), ['id' => 'address','class' => 'form-control'])}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">{{__('profile.secondaddress')}}</label>
                            <div class="col-md-8">
                                <div class="form-group">
                                    {{Form::text('second_address',old('second_address',$user->second_address), ['id' => 'second_address','class' => 'form-control'])}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">{{__('profile.phone')}}</label>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <input type="tel" class="form-control" value="{{ old('phone') ?: $user->phone }}" name="phone" id="phone">
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">

                            <div class="col-md-3 col-sm-4">

                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail img-circle">
                                        <img src="{{asset('assets/img/placeholder.jpg')}}" alt="...">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                                    <div>
                        <span class="btn btn-round btn-rose btn-file">
                          <span class="fileinput-new">Add Photo</span>
                          <span class="fileinput-exists">Change</span>
                          <input type="file" name="..." />
                        </span>
                                        <br />
                                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row justify-content-center">
                            <div class="col-md-3 col-sm-4">
                                {{Form::submit(__('profile.update'))}}
                            </div>
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="alert alert-danger alert-dismissible fade show">
                    <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="nc-icon nc-simple-remove"></i>
                    </button>
                    <span>
                            <b> Danger - </b> This is a regular notification made with ".alert-danger"</span>
                </div>
            </div>
        </div>
    </div>


@endsection
