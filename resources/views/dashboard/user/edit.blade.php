@extends('layouts.app-dash-apartment')

@section('content')
    <div class="content">
        <div class="row justify-content-center">
            @if(session('success'))
                <div class="col-md-6">
                    <div class="alert alert-info alert-dismissible fade show">
                        <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                        </button>
                        <span>
                            {{__('profile.profileupdatedocorrectly')}}
                    </span>
                    </div>
                </div>
            @endif
            @if(count($errors) > 0)
                <div class="col-md-6">
                    <div class="alert alert-danger alert-dismissible fade show">
                        <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                        </button>
                        <span>
                            {{__('profile.profileupdatedfailed')}}
                    </span>
                    </div>
                    @foreach($errors->all() as $error)
                        <div class="callout alert alert-danger">
                            {{$error}}
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
        <div class="row justify-content-center p-5">

            <div class="col-md-6">
                <div class="card card-user">
                    <div class="card-header">
                        <h5 class="title text-center">{{__('profile.edit_profile')}}</h5>
                    </div>
                    <hr>
                    <div class="card-body ">
                        {{Form::open(['method' => 'PUT','action' => ['dashboard\UserController@update',auth()->user()->id],'files' => true])}}
                        <div class="row">
                            <label class="col-md-3 col-form-label">{{__('profile.name')}}</label>

                            <div class="col-md-8">
                                <div class="form-group">
                                    {{Form::text('name',old('name',Auth()->user()->name), ['id' => 'name','class' => 'form-control'])}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">{{__('profile.last_name')}}</label>
                            <div class="col-md-8">
                                <div class="form-group">
                                    {{Form::text('last_name',old('last_name',Auth()->user()->last_name), ['id' => 'last_name','class' => 'form-control'])}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">{{__('profile.email')}}</label>
                            <div class="col-md-8">
                                <div class="form-group">
                                    {{Form::text('email',old('email', Auth()->user()->email), ['id' => 'email','class' => 'form-control'])}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">{{__('profile.apartmentaddress')}}</label>
                            <div class="col-md-8">
                                <div class="form-group">
                                    {{Form::text('address',old('address',Auth()->user()->address), ['id' => 'address','class' => 'form-control'])}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">{{__('profile.secondaddress')}}</label>
                            <div class="col-md-8">
                                <div class="form-group">
                                    {{Form::text('second_address',old('second_address',Auth()->user()->second_address), ['id' => 'second_address','class' => 'form-control'])}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">{{__('profile.phone')}}</label>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <input type="tel" class="form-control" value="{{ old('phone') ?: Auth()->user()->phone }}" name="phone" id="phone">
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
                            {{Form::file('photo')}}
                        </span>
                                        <br />
                                        <a href="#" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row justify-content-center">
                            <div class="col-md-3 col-sm-4">
                                {{Form::submit(__('profile.update'),['class' => 'btn btn-primary'])}}
                            </div>
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection



