@extends('layouts.app-nav')
@include('partials.header')
@section('content')
    <div class="container">
        <h3 class="text-center">{{__('profile.createapartment')}}</h3>
        @if(count($errors) > 0)
            @foreach($errors->all() as $error)
                <div class="callout alert">
                    {{$error}}
                </div>
            @endforeach
        @endif

        @if(session('success'))
            <div class="alert alert-info">
                {{session('success')}}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-info">
                {{session('error')}}
            </div>
        @endif

        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    {{Form::open(['method' => 'POST', 'action' => 'ApartmentController@store', 'files' => true])}}
                        <div class="card ">
                            <div class="card-body ">
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{__('form.nameapartment')}}</label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            {{Form::text('name', '',['placeholder' => __('form.placeholdername'), 'class' => 'form-control','required'])}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{__('form.address')}}</label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            {{Form::text('address', '',['placeholder' => __('form.placeholderaddress'), 'class' => 'form-control','required'])}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{__('form.shortapartment')}}</label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            {{Form::text('short_description', '',['placeholder' => __('form.placeholdershort'), 'class' => 'form-control','required'])}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{__('form.descriptionapartment')}}</label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            {{Form::textarea('description', '',['placeholder' => __('form.placeholderdescription'), 'class' => 'form-control','required'])}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-lg-5 col-md-4 col-sm-3">
                                                <select class="selectpicker" data-size="7" name="city" data-style="btn btn-primary btn-round" required>
                                                    <option disabled>{{__('form.city')}}</option>
                                                    @foreach($cities as $city)
                                                        <option value="{{$city->id}}">{{$city->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-lg-5 col-md-4 col-sm-3">
                                                <select class="selectpicker" name="services[]" data-style="btn btn-info btn-round" multiple data-size="7" required>
                                                    <option disabled>{{__('form.services')}}</option>
                                                    @foreach($services as $service)
                                                        <option value="{{$service->id}}">{{$service->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-lg-5 col-md-4 col-sm-3">
                                                <select class="selectpicker" name="categories[]" data-style="btn btn-info btn-round" multiple data-size="7" required>
                                                    <option disabled>{{__('form.categories')}}</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-4">
                                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                                    <div>
                        <span class="btn btn-rose btn-round btn-file">
                          <span class="fileinput-new">{{__('form.imageapartment')}}</span>
                            <!--{{Form::file('photos[]')}}-->
                            <input type="file" name="photos[]" required multiple/>
                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <button type="submit" class="btn btn-info btn-round">{{__('form.submit')}}</button>
                            </div>
                        </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
@endsection