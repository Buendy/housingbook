@extends('layouts.app-dash')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-1">

            </div>
            <div class="col-md-6">
                <div class="card card-user">
                    <div class="card-header">
                        <h5 class="title text-center">{{__('profile.edit_telegram')}}</h5>
                        <div class="row">
                            <a href="{{url('dashboard/'. auth()->user()->id.'/telegram/tutorial')}}" class="text-center justify-content-center mx-auto d-block" target="_blank">{{__('profile.obtain_telegram')}}</a>
                        <!-- hay que hablar primero al bot y en la DB tener el ID del usuario al que se espera enviar el mensaje por telegram!
                        El bot se llama housingbook_bot -->
                    </div>
                    <hr>
                    <div class="card-body ">
                        {{Form::open(['method' => 'PUT','action' => ['dashboard\UserController@telegramUpdate',auth()->user()->id]])}}
                        <div class="row">
                            <label class="col-md-3 col-form-label">{{__('profile.telegram')}}</label>

                            <div class="col-md-8">
                                <div class="form-group">
                                    {{Form::text('telegram',old('name',$user->telegram), ['id' => 'name','class' => 'form-control'])}}
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
            @if(session('success'))
                <div class="col-md-5">
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
                <div class="col-md-5">
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
    </div>


@endsection
