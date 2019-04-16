@extends('layouts.app-nav')

@section('content')



    <div class="blogs-5" style="background-image: url('{{asset('/img/aparts.jpg')}}');">
        <div class="container">
            <div class="row">
                <div class="col-md-10 ml-auto mr-auto">
                    <h2 class="title text-light">{{__('apartments.latest')}}</h2>
                    <div class="row">

                        @foreach($latest_apartment as $apartment)
                            <div class="col-md-4">
                                <div class="card card-blog">
                                    <div class="card-image">
                                        <a href="#pablo">
                                            <img class="img rounded" src="{{$apartment->photo_image}}">
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
        <div class="container">
            <h2 class="section-title">{{__('guest.apartments')}}</h2>
            <div class="row">
                @forelse($apartments as $apartment)

                    <div class="col-md-4">
                        <div class="card card-blog">
                            <div class="card-image">
                                <a href="#pablo">
                                    <img class="img rounded" src="{{$apartment->photo_image}}">
                                </a>
                            </div>
                            <div class="card-body">
                                <h6 class="category text-primary">{{$apartment->name}}</h6>
                                <h5 class="card-title">
                                    {{$apartment->city->name}}
                                </h5>
                                <p>{{$apartment->short_description}}</p>

                                <div class="card-footer">
                                    <div class="author">
                                        <img src="{{$apartment->user->photo}}" alt="..." class="avatar img-raised">
                                        <span>{{$apartment->user->name}}</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <h3>{{__('guest.noapartments')}}</h3>
                @endforelse
                <div class="mx-auto d-block">
                    {{$apartments->links()}}
                </div>
            </div>
        </div>
    </div>


@endsection
