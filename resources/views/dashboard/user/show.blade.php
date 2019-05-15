@extends('layouts.app-dash')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-user">
                    <div class="image">
                        <img src="{{asset('img/bg19.jpg')}}" alt="...">
                    </div>
                    <div class="card-body">
                        <div class="author">
                            <a href="#">
                                <img class="avatar border-gray" src="{{Auth()->user()->photo}}" alt="...">
                                <h5 class="title">{{Auth()->user()->name}}</h5>
                            </a>
                            <p class="description">
                                {{Auth()->user()->last_name}}
                            </p>
                        </div>

                    </div>
                    <div class="card-footer">
                        <hr>
                        <div class="button-container">
                            <div class="row">
                                <div class="col-lg-3 col-md-6 col-6 ml-auto">

                                </div>
                                <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto">
                                    <h5>{{count(Auth()->user()->apartments)}}
                                        <br>
                                        <small>{{__('menu.apartment')}}</small>
                                    </h5>
                                </div>
                                <div class="col-lg-3 mr-auto">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="title">{{__('profile.profile')}}</h5>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-md-5 pr-1">
                                    <div class="form-group">
                                        <label>{{__('profile.email')}}</label>
                                        <input type="text" class="form-control" disabled="" value="{{Auth()->user()->email}}">
                                    </div>
                                </div>
                                <div class="col-md-3 px-1">
                                    <div class="form-group">
                                        <label>{{__('profile.name')}}</label>
                                        <input type="text" class="form-control" disabled=""  value="{{Auth()->user()->name}}">
                                    </div>
                                </div>
                                <div class="col-md-4 pl-1">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">{{__('profile.last_name')}}</label>
                                        <input type="email" class="form-control" disabled="" value="{{Auth()->user()->last_name}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>{{__('profile.apartmentaddress')}}</label>
                                        <input type="text" class="form-control" disabled="" value="{{Auth()->user()->address}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>{{__('profile.secondaddress')}}</label>
                                        <input type="text" class="form-control" disabled="" value="{{Auth()->user()->second_address}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>{{__('profile.phone')}}</label>
                                        <input type="text" class="form-control" disabled=""  value="{{Auth()->user()->phone}}">
                                    </div>
                                </div>
                                <div class="col-md-7"></div>
                                <div class="col-md-1">
                                    <a class="btn btn-round btn-outline-info" href="{{url('dashboard/user/edit')}}">Editar</a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @endsection
