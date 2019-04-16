@extends('layouts.app-nav')
@include('partials.header')
@section('content')
    <div class="wrapper">
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div id="productCarousel" class="carousel slide" data-ride="carousel" data-interval="8000">
                            <ol class="carousel-indicators">
                                <li data-target="#productCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#productCarousel" data-slide-to="1"></li>
                                <li data-target="#productCarousel" data-slide-to="2"></li>
                                <li data-target="#productCarousel" data-slide-to="3"></li>
                            </ol>
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item active">
                                    <img class="d-block img-raised" src="{{$apartment->photos[0]->url}}" alt="{{$apartment->name}}">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block img-raised" src="{{$apartment->photos[1]->url}}" alt="{{$apartment->name}}">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block img-raised" src="{{$apartment->photos[2]->url}}" alt="{{$apartment->name}}">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block img-raised" src="{{$apartment->photos[3]->url}}" alt="{{$apartment->name}}">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#productCarousel" role="button" data-slide="prev">
                                <button type="button" class="btn btn-primary btn-icon btn-round btn-sm" name="button">
                                    <i class="now-ui-icons arrows-1_minimal-left"></i>
                                </button>
                            </a>
                            <a class="carousel-control-next" href="#productCarousel" role="button" data-slide="next">
                                <button type="button" class="btn btn-primary btn-icon btn-round btn-sm" name="button">
                                    <i class="now-ui-icons arrows-1_minimal-right"></i>
                                </button>
                            </a>
                        </div>
                        <p class="blockquote blockquote-primary">
                            "And thank you for turning my personal jean jacket into a couture piece. Wear yours with mirrored sunglasses on vacation."
                            <br>
                            <br>
                            <small>Kanye West</small>
                        </p>
                    </div>
                    <div class="col-md-6 ml-auto mr-auto">
                        <h2 class="title"> {{$apartment->name}} </h2>
                        <h5 class="category">{{$apartment->address}}</h5>
                        <h5 class="main-price">{{$apartment->city->name}}</h5>
                        <div id="accordion" role="tablist" aria-multiselectable="true" class="card-collapse">
                            <div class="card card-plain">
                                <div class="card-header" role="tab" id="headingOne">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        {{__('guest.description')}}
                                        <i class="now-ui-icons arrows-1_minimal-down"></i>
                                    </a>
                                </div>
                                <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="card-body">
                                        <p>{{$apartment->description}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-plain">
                                <div class="card-header" role="tab" id="headingTwo">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        {{__('guest.owner')}}
                                        <i class="now-ui-icons arrows-1_minimal-down"></i>
                                    </a>
                                </div>
                                <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="card-body">
                                        <p>{{$apartment->user->name}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-plain">
                                <div class="card-header" role="tab" id="headingThree">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        {{__('guest.services')}}
                                        <i class="now-ui-icons arrows-1_minimal-down"></i>
                                    </a>
                                </div>
                                <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                                    <div class="card-body">
                                        <ul>
                                            @forelse($apartment->services as $service)
                                                <li>{{$service->name}}</li>
                                            @empty
                                                <p>{{__('guest.noservices')}}</p>
                                            @endforelse
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <a href="{{route('profile.editapartment',$apartment->id)}}" class="btn btn-primary mr-3 text-white">{{__('profile.edit')}}&nbsp;<i class="now-ui-icons shopping_cart-simple"></i></a>
                            {{Form::open(['action' => ['ApartmentController@destroy',$apartment->id], 'method' => 'DELETE', 'class' => ['d-inline-block']])}}
                            <button type="submit" data-toggle="tooltip" title="{{__('profile.delete')}}" class="btn btn-primary mr-3 text-white">{{__('profile.edit')}} <i class="now-ui-icons shopping_cart-simple"></i></button>
                            {{Form::close()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection