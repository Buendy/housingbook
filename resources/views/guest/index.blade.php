@extends('layouts.app-nav')

@section('content')



    <div class="blogs-5" style="background-image: url('{{asset('/img/aparts.jpg')}}');">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 text-center">
                    @if(session('success'))
                        <div class="alert alert-info alert-dismissible fade show">
                            <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="nc-icon nc-simple-remove"></i>
                            </button>
                            <span>{{session('success')}}</span>
                        </div>
                    @endif
                    @if(session('error'))

                        <div class="alert alert-danger alert-dismissible fade show">
                            <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="nc-icon nc-simple-remove"></i>
                            </button>
                            <span><h6>{{session('error')}}</h6></span>
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 ml-auto mr-auto">
                    <h2 class="title text-light">{{__('apartments.latest')}}</h2>
                    <div class="row">

                        @foreach($latest_apartment as $apartment)
                            <div class="col-md-4">
                                <div class="card card-blog">
                                    <div class="card-image">
                                        <a href="{{route('apartments.show',$apartment->id)}}">
                                            <img class="img rounded" src="{{url('/storage/photos/'.$apartment->photos[0]->local_url)}}">
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h6 class="category text-primary">{{$apartment->name}}</h6>
                                        <h5 class="card-title">
                                            {{$apartment->city->name}}
                                        </h5>

                                        <div class="card-footer">
                                            <div class="author">
                                                <img src="{{$apartment->user->photo}}" alt="..." class="avatar img-raised">
                                                <span>{{$apartment->user->name}}</span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="row">
            <div class="col-md-3">
                <div class="container p-2">
                    <h3>{{__('form.filter')}}</h3>
                    <hr>
                    <div class="container border shadow">
                        {{Form::open(['method' => 'POST', 'action'=>'ApartmentController@filter'])}}
                        <h4 class="card-title">
                            <button class="btn btn-default btn-icon btn-neutral pull-right" rel="tooltip" title="Reset Filter" type="reset">
                                <i class="arrows-1_refresh-69 now-ui-icons"></i>
                            </button>
                        </h4>
                        <h4 class="text-primary">{{__('form.categories')}}</h4>
                        <hr>
                        @foreach($categories as $category)
                            <div class="form-check">

                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="category[]" value="{{$category->id}}">
                                    <span class="form-check-sign bg-primary text-light"></span>
                                    {{__('form.' . $category->name)}}
                                </label>
                            </div>
                        @endforeach
                        <h4 class="text-primary">{{__('form.services')}}</h4>
                        <hr>
                        @foreach($services as $service)
                            <div class="form-check">

                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="service[]" value="{{$service->id}}">
                                    <span class="form-check-sign bg-primary text-light"></span>
                                    {{__('form.' . $service->name)}}
                                </label>
                            </div>
                        @endforeach
                        <h4 class="text-primary">{{__('form.price')}}</h4>
                        <hr>
                        <p>
                            <span id="price-left" class="price-left pull-left" data-currency="&euro;">{{$min}} &euro;</span>
                            <span class="rangePrice text-center justify-content-center" style="margin-left: 160px">{{$max/2}}</span>
                            <span id="price-right" class="price-right pull-right" data-currency="&euro;">{{$max}} &euro;</span>
                        </p>
                        <br>
                        <p><input type="range" name="range" class="form-control custom-range text-primary" max="{{$max}}" min="{{$min}}" id="slider"></p>
                        <button type="submit" class="btn btn-info" style="width: 100%">{{__('form.filtersend')}}</button>
                        {{Form::close()}}
                    </div>
                </div>
            </div>

            <div class="col-md-7">
                <div class="flash-message">
                    @if(count($errors) > 0)
                        <div class="col-md-5">
                            <div class="alert alert-danger alert-dismissible fade show">
                                <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="nc-icon nc-simple-remove"></i>
                                </button>

                            </div>
                            @foreach($errors->all() as $error)
                                <div class="callout alert alert-danger">
                                    {{$error}}
                                </div>
                            @endforeach
                        </div>
                    @endif

                </div>
                <h2 class="section-title">{{__('guest.apartments')}}</h2>
                <hr>
                <div class="row">
                    @forelse($apartments as $apartment)
                        <div class="col-md-4 ">
                            <div class="card card-blog ">
                                <div class="card-image">
                                    <a href="{{route('apartments.show',$apartment->id)}}">
                                        <img class="img rounded" src="{{url('/storage/photos/'.$apartment->photos[0]->local_url)}}">
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h6 class="category text-primary">{{$apartment->name}} </h6>
                                    <h5 class="card-title">
                                        {{$apartment->city->name}}
                                    </h5>
                                    <p>{{$apartment->short_description}}</p>

                                    <div class="card-footer text-center">
                                        <div class="author">
                                            <img src="{{$apartment->user->photo}}" alt="..." class="avatar img-raised">
                                            <span>{{$apartment->user->name}}</span>
                                        </div>

                                    </div>
                                    <div class="mt-2">
                                        <div class="text-light rounded" style="background-color: {{$apartment->category->color}};">
                                            <p  class="text-center">{{$apartment->category->name}}</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @empty
                        <h3>{{__('guest.noapartments')}}</h3>
                    @endforelse
                    <div class="mx-auto d-block">
                        @if($apartments instanceof \Illuminate\Pagination\LengthAwarePaginator )

                            {{$apartments->links()}}

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.0.min.js"></script>
    <script>
        let rango = $(".rangePrice");
        $('#slider').change(function(event){
            rango.text(event.currentTarget.value + "€");
        });
    </script>
@endsection
