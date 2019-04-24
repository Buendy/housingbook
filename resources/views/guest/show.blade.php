@extends('layouts.app-nav')
@section('content')
    <div class="blogs-5" data-parallax="true" style="background-image: url('{{asset('/img/bg32.jpg')}}');">
        <div class="container text-light mb-5">
            <div class="content-center mb-5">
                <div class="row mb-5">
                    <div class="col-md-8 ml-auto mr-auto mb-5">
                        <h1 class="title">{{$apartment->name}}</h1>
                        <h5>{{$apartment->short_description}}</h5>
                        <br><br><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                        <br>
                        <p class="blockquote blockquote-primary rounded">
                            {{$apartment->short_description}}
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
                                        <p><span class="text-left">{{$apartment->user->name}} </span><span class="text-right"><a href="" class="btn btn-sm btn-primary text-light">Ver perfil</a></span></p>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="container mb-5 mt-5 bg-primary text-light rounded pb-2 pt-4">
                        {{Form::open(['method' => 'POST', 'action' => ['RentController@store',$apartment->id]])}}
                        <div class="row align-middle">
                            <div class="col-md-1 mt-3">
                                <label>{{__('guest.checkin')}}</label>
                            </div>
                            <div class="col-md-4 mt-2">


                                <input type="text" name="entrada" class="form-control datepicker bg-light text-black" required>

                            </div>
                            <div class="col-md-1 mt-3">
                                <label>{{__('guest.checkout')}}</label>
                            </div>
                            <div class="col-md-4 mt-2">

                                <input type="text" name="salida" class="form-control datepicker bg-light text-black" required>

                            </div>
                            <div class="col-md-2">

                                    <button class="btn btn-primary mr-3">{{__('guest.rent')}}&nbsp;<i class="now-ui-icons shopping_cart-simple"></i></button>

                            </div>

                        </div>
                        {{Form::close()}}
                    </div>

                    <div class="container mb-5">
                        <div class="card card-plain">
                            <div class="card-header" role="tab" id="headingThree">
                                <a class="collapsed text-black" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    {{__('guest.services')}}
                                    <i class="now-ui-icons arrows-1_minimal-down"></i>
                                </a>
                                <hr>
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
                </div>
                <div class="section related-products" data-background-color="black">
                    <div class="container">
                        <h3 class="title text-center">{{__('guest.related')}}</h3>
                        <div class="row">
                            @forelse($randoms_apartments as $random_apartment)
                                <div class="col-sm-6 col-md-3">
                                    <div class="card card-product">
                                        <div class="card-image justify-content-center">
                                            <a href="{{route('apartments.show',$random_apartment->id)}}">
                                                <img class="img rounded" src="{{$random_apartment->photos[0]->url}}" />
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <a href="#pablo" class="card-link">{{$random_apartment->name}}</a>
                                            </h5>
                                            <div class="card-description">
                                                {{str_limit($random_apartment->short_description,50)}}
                                            </div>
                                            <div class="card-footer">
                                                <div class="price-container">
                                                    <span class="price">{{$random_apartment->city->name}}</span>
                                                </div>
                                                <button class="btn btn-neutral btn-icon btn-round pull-right" rel="tooltip" title="" data-placement="left" data-original-title="Add to wishlist">
                                                    <i class="now-ui-icons ui-2_favourite-28"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <h3>{{__('guest.norelated')}}</h3>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
