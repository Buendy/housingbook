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
                                    <img class="d-block img-raised" src="{{url('/storage/photos/'.$apartment->photos[0]->local_url)}}" alt="{{$apartment->name}}">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block img-raised" src="{{url('/storage/photos/'.$apartment->photos[1]->local_url)}}" alt="{{$apartment->name}}">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block img-raised" src="{{url('/storage/photos/'.$apartment->photos[2]->local_url)}}" alt="{{$apartment->name}}">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block img-raised" src="{{url('/storage/photos/'.$apartment->photos[3]->local_url)}}" alt="{{$apartment->name}}">
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
                            <small>{{$apartment->user->name}}</small>
                        </p>
                    </div>
                    <div class="col-md-6 ml-auto mr-auto">
                        <h2 class="title"> {{$apartment->name}} </h2>
                        <h5 class="category">{{$apartment->address}}</h5>
                        <h5 class="main-price">{{$apartment->city->name}}</h5>
                        <h6>{{__('guest.priceper')}}: <span class="text-warning">{{$apartment->price}} &euro;</span></h6>
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
                                        <p><span class="text-left">{{$apartment->user->name}} </span><span class="text-right"><a href="{{route('profile.index',$apartment->user->name)}}" class="btn btn-sm btn-primary text-light" target="_blank">{{__('apartments.profile')}}</a></span></p>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="container mb-5 mt-5 bg-primary text-light rounded pb-2 pt-4">
                        {{Form::open(['method' => 'POST', 'action' => ['RentController@validation', $apartment->id]])}}
                        <div class="row align-middle">
                            <div class="col-md-1 mt-3">
                                <label>{{__('guest.checkin')}}</label>
                            </div>
                            <div class="col-md-4 mt-2">


                                <input type="text" name="entrada" id="datepicker" class="form-control bg-light text-black" autocomplete="off" required>

                            </div>
                            <div class="col-md-1 mt-3">
                                <label>{{__('guest.checkout')}}</label>
                            </div>
                            <div class="col-md-4 mt-2">

                                <input type="text" name="salida" id="datepicker2" class="form-control bg-light text-black" autocomplete="off" required>

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
                                <div class="card-body text-center">

                                    @forelse($apartment->services as $service)
                                        <div class="d-inline-block p-5">
                                            <div class="">
                                                <p>{{__('form.' . $service->name)}}</p>
                                                <i class="fas {{$service->icon}} border border-info rounded-circle p-4 text-info" style="font-size:30px;"></i>
                                            </div>
                                        </div>
                                    @empty
                                        <p>{{__('guest.noservices')}}</p>
                                    @endforelse

                                </div>
                            </div>
                        </div>

                    </div>
                </div>




                <div class="rounded border shadow container mb-5">
                    <div class="title">
                        <h2>
                            <small>{{__('guest.apartmentcomments')}}</small>
                        </h2>
                    </div>
                    @auth
                        @if(auth()->user()->apartmentsUser()->where('apartment_id', $apartment->id)->where('exit', '<' , \Carbon\Carbon::now())->exists()
                        && auth()->user()->comments()->where('apartment_id',$apartment->id)->doesntExist())
                            <div class="form-group shadow rounded pt-4 pr-4 pl-4">
                                {{Form::open(['method' => 'POST','action' => ['CommentController@store',$apartment->id]])}}
                                <label for="">{{__('form.shareyouropinion')}}</label>
                                {{Form::textarea('comment',old('comment'), ['class' => 'form-control'])}}
                                <p class="text-right">{{Form::submit(__('form.comment'), ['class' => 'btn btn-primary'])}}</p>
                                {{Form::close()}}
                            </div>
                        @endif
                    @endauth
                    <hr>
                    <div class="row">
                        <div class="col-md-8 ml-auto mr-auto">
                            <div class="media-area">
                                <h3 class="title text-center">
                                    <small>{{count($apartment->comments)}} {{__('guest.comments')}}</small>
                                </h3>
                                @foreach($apartment->comments as $comment)
                                    @if($comment->user->id == auth()->user()->id)
                                        <div class="container mb-5 mt-5 bg-primary text-light rounded pb-2 pt-4">
                                            <div class="col-md-2">
                                                {{Form::open(['method' => 'DELETE','action' => ['CommentController@destroy',$comment->id,$apartment->id]])}}
                                                <button type="submit" class="btn btn-primary mr-3">{{__('guest.removecomment')}}&nbsp;<i class="now-ui-icons ui-1_simple-remove"></i></button>
                                                {{Form::close()}}
                                            </div>
                                        </div>
                                    @endif
                                    <div class="media">
                                        <a class="pull-left" href="#pablo">
                                            <div class="avatar">
                                                <img class="media-object img-raised" src="{{$comment->user->photo}}" alt="..." />
                                            </div>
                                        </a>
                                        <div class="media-body">
                                            <h5 class="media-heading">{{$comment->user->name}}
                                                <small class="text-muted">&middot; {{Config::get('app.locale') == 'es' ? date("d/m/Y H:i:s", strtotime($comment->created_at)) : $comment->created_at}}</small>
                                            </h5>
                                            <p>{{$comment->text}}</p>

                                        </div>
                                    </div>
                                @endforeach
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
                                                <img class="img rounded" src="{{url('/storage/photos/'.$random_apartment->photos[0]->local_url)}}" />
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <span class="card-link">{{$random_apartment->name}}</span>
                                            </h5>
                                            <div class="card-description">
                                                {{str_limit($random_apartment->short_description,50)}}
                                            </div>
                                            <div class="">
                                                <div class="text-center justify-content-center">
                                                    <span class="text-black">{{$random_apartment->city->name}}</span>
                                                </div>
                                                <!--<button class="btn btn-neutral btn-icon btn-round pull-right" rel="tooltip" title="" data-placement="left" data-original-title="Add to wishlist">
                                                    <i class="now-ui-icons ui-2_favourite-28"></i>
                                                </button>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center justify-content-center mx-auto d-block">
                                    <h3>{{__('guest.norelated')}}</h3>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker3.css"/>
    <script type="text/javascript">

        let array = {!! json_encode($allDates) !!};
        let language = "{!! config('app.locale'); !!}";
        let formato;

        formato = language == "es" ? "dd/mm/yyyy" : "yyyy-mm-dd";

        ;(function($){
            $.fn.datepicker.dates['es'] = {
                days: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"],
                daysShort: ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb"],
                daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
                months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
                today: "Hoy",
                monthsTitle: "Meses",
                clear: "Borrar",
                weekStart: 1,
            };
        }(jQuery));

        $('#datepicker').datepicker({
            format: formato,
            language: language,
            todayBtn: "linked",
            clearBtn: true,
            todayHighlight: true,
            autoclose: true,
            datesDisabled: array
        });

        $('#datepicker2').datepicker({
            format: formato,
            language: language,
            clearBtn: true,
            todayBtn: "linked",
            todayHighlight: true,
            autoclose: true,
            datesDisabled: array
        });

    </script>

@endsection
