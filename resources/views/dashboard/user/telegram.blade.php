@extends('layouts.app-dash-apartment')

@section('content')
    <div class="content">
        <div class="row justify-content-center">

            @if(session('success'))
                <div class="col-md-8">
                    <div class="alert alert-info alert-dismissible fade show">
                        <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                        </button>
                        <span>
                            {{__('profile.telegramupdatedcorrectly')}}
                    </span>
                    </div>
                </div>
            @endif
            @if(count($errors) > 0)
                <div class="col-md-8">
                    <div class="alert alert-danger alert-dismissible fade show">
                        <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                        </button>
                        <span>
                            {{__('profile.telegramupdatedfailed')}}
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
        <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card card-user">
                        <div class="card-header">
                            <h5 class="title text-center">{{__('profile.edit_telegram')}}</h5>
                            <div class="bg-warning rounded">
                                <p class="text-center text-white p-2">
                                    <strong>{{__('telegram.note')}}</strong>{{__('telegram.one')}} <strong>{{__('telegram.two')}}<span class="bg-light text-warning p-1 rounded"><a
                                                    href="https://web.telegram.org/#/im?p=@housingbook_bot" target="_blank">@housing_bot </a></span> {{__('telegram.three')}}</strong>."
                                </p>
                            </div>
                            <div>
                                <p class="text-center">
                                    <strong>
                                        <a href="{{url('dashboard/user/telegram/tutorial')}}" class="mx-auto d-block" target="_blank">{{__('profile.obtain_telegram')}}</a>
                                    </strong>
                                </p>
                            </div>

                            <div class="row justify-content-center">


                            </div>
                            <hr>
                            <div class="card-body ">
                                {{Form::open(['method' => 'PUT','action' => ['dashboard\UserController@telegramUpdate', auth()->user()->id]])}}
                                <div class="row">
                                    <label class="col-md-3 col-form-label">{{__('profile.telegram')}}</label>

                                    <div class="col-md-8">
                                        <div class="form-group">
                                            {{Form::text('telegram',old('name',Auth()->user()->telegram), ['id' => 'name','class' => 'form-control'])}}
                                        </div>
                                    </div>
                                </div>
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


