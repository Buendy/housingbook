@extends('layouts.app-nav')
@include('partials.header')
@section('content')
    <div class="section section-components" data-background-color="dark-red">
        <div class="container">
            <div class="row mt-1" >
                <div class="col-md-8 ml-auto mr-auto">
                    <h2 class="text-center title">{{__('welcome.search')}}
                        <br><br>
                        <small class="description">{{__('welcome.anywhere')}}</small>


                    </h2>
                    {{Form::open(['method' => 'GET','action' => 'ApartmentController@search'])}}
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::text('search','',['placeholder' => __('welcome.input'), 'class' => 'form-control','autocomplete' => 'family-name', 'required'])}}
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary btn-round btn-block">{{__('welcome.searchs')}}</button>
                        </div>
                    </div>
                    {{Form::close()}}
                    <h2 class="text-center title">

                        <small class="description">{{__('welcome.prefeer')}}</small>


                    </h2>

                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="card-container first-card">
                        <div class="card-component">
                            <a href="{{route('searchCategory',  1)}}">
                                <div class="front">
                                    <img src="{{ asset('img/mountain.jpg')}}">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card-container second-card">
                        <div class="card-component">
                            <a href="{{route('searchCategory',  2)}}">
                                <div class="front">
                                    <img src="{{ asset('img/city.jpg')}}">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card-container third-card">
                        <div class="card-component">
                            <a href="{{route('searchCategory',  3)}}">
                                <div class="front">
                                    <img src="{{ asset('img/campo.jpg')}}">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card-container fourth-card">
                        <div class="card-component">
                            <a href="{{route('searchCategory',  4)}}">
                                <div class="front">
                                    <img src="{{ asset('img/beach.jpg')}}">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





@endsection
