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
                        <form class="form-horizontal" action="{{url('dashboard/'.Auth::user()->id.'/update')}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{__('profile.name')}}</label>

                                <div class="col-md-8">
                                    <div class="form-group">

                                        <input type="text" class="form-control" value="{{ old('name') ?: $user->name }}" name="name" id="name">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{__('profile.last_name')}}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="{{ old('last_name') ?: $user->last_name }}" name="last_name" id="last_name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{__('profile.email')}}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="{{ old('email') ?: $user->email }}" name="email" id="email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{__('profile.apartmentaddress')}}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="{{ old('address') ?: $user->address }}" name="address" id="address">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{__('profile.secondaddress')}}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="{{ old('second_address') ?: $user->second_address }}" name="second_address" id="second_address">
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

                                    <button class="btn btn-info" type="submit" >{{__('profile.update')}}</button>
                                </div>
                            </div>
                        </form>
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
