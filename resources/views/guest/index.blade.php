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
        <div class="container">
            <div class="flash-message">
                @if(session('success'))
                    <div class="col-md-5">
                        <div class="alert alert-info alert-dismissible fade show">
                            <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="nc-icon nc-simple-remove"></i>
                            </button>
                            <span>
                            {{session('success')}}
                    </span>
                        </div>
                    </div>
                @endif
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
            <div class="row">
                @forelse($apartments as $apartment)

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
