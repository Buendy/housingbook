@extends('layouts.app-dash-apartment')

@section('content')


    <div class="content">
        <h3 class="text-center">{{__('profile.updateapartment')}}</h3>
        <div class="row">
            <div class="col-md-6">
                {{Form::open(['id' => 'form_update', 'action' => ['dashboard\ApartmentController@update',$apartment->id], 'method' => 'PUT','files' => true])}}

                <div class="card ">
                    <div class="card-body ">
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{__('form.nameapartment')}}</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    {{Form::text('name', old('name',$apartment->name),['placeholder' => __('form.placeholdername'), 'class' => 'form-control','required'])}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{__('form.address')}}</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    {{Form::text('address', old('address',$apartment->address),['placeholder' => __('form.placeholderaddress'), 'class' => 'form-control','required'])}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{__('form.shortapartment')}}</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    {{Form::text('short_description', old('short_description',$apartment->short_description),['placeholder' => __('form.placeholdershort'), 'class' => 'form-control','required'])}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{__('form.descriptionapartment')}}</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    {{Form::textarea('description', old('description',$apartment->description),['placeholder' => __('form.placeholderdescription'), 'class' => 'form-control','required'])}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{__('form.price')}}</label>
                            <div class="col-sm-10 checkbox-radios">
                                <div class="form-group">
                                    <label class="form-check-label">
                                        <input type="number" name="price" class="form-control bg-warning" min="1" value="{{$apartment->price}}">
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{__('form.services')}}</label>
                            <div class="col-sm-10 checkbox-radios">

                                @foreach($services as $service)
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            @foreach($apartmentServices as $apartmentService)
                                                <input class="form-check-input" name="services[]" type="checkbox" value="{{$service->id}}">
                                                @if($apartmentService->name == $service->name)
                                                    <span class="form-check-sign bg-success"></span>
                                                    <input class="form-check-input" name="services[]" type="checkbox" value="{{$service->id}}" checked>
                                                    @break
                                                @else
                                                    <input class="form-check-input" name="services[]" type="checkbox" value="{{$service->id}}">
                                                @endif
                                            @endforeach                                                <span class="form-check-sign bg-success"></span>
                                            {{__('form.' . $service->name)}} <i class="{{$service->icon}} bg-primary rounded-circle text-light p-2"></i>
                                        </label>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-4">
                                <h4 class="card-title">{{__('form.city')}}</h4>
                                <select class="form-control" data-size="7" name="city" data-style="btn btn-primary btn-round" required>
                                    <option disabled>{{__('form.city')}}</option>
                                    @foreach($cities as $city)
                                        @if($city->id == $apartment->city_id)
                                            <option value="{{$city->id}}" selected>{{$city->name}}</option>
                                        @else
                                            <option value="{{$city->id}}">{{$city->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <h4 class="card-title">{{__('form.categories')}}</h4>
                                <select class="form-control" name="category" data-style="btn btn-info btn-round" data-size="7" required>
                                    <option disabled>{{__('form.categories')}}</option>
                                    @foreach($categories as $category)
                                        @if($category->id == $apartment->category_id)
                                            <option value="{{$category->id}}" selected>{{__('form.' . $category->name)}}</option>
                                        @else
                                            <option value="{{$category->id}}">{{__('form.' . $category->name)}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row justify-content-center">
                                    <div class="col-md-4 col-sm-4">
                                        <div class="fileinput fileinput-new text-center rounded-circle" data-provides="fileinput">
                                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                            <div>
                        <span class="btn btn-rose btn-round btn-file">
                          <span class="fileinput-new">{{__('form.imageapartment')}}</span>
                        <!--{{Form::file('photos[]')}}-->
                            <input type="file" name="photos[]" multiple/>
                        </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <button type="submit" class="btn btn-info" style="width: 100%">{{__('form.update')}}</button>
                    </div>
                </div>
                {{Form::close()}}
            </div>
            <div class="col-md-6">
                @if(session('success'))
                    <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="nc-icon nc-simple-remove"></i>
                    </button>
                    <div class="alert alert-info alert-dismissible fade show">
                            <span>
                            {{__('form.apartmentupdate')}}
                    </span>
                    </div>

                @endif
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show">
                        <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                        </button>
                        <span>{{__('form.apartmentcreatefail')}}</span>
                    </div>
                    <div class="alert alert-danger alert-dismissible fade show">
                        <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                        </button>
                        <span> {{__(session('error'))}}</span>
                    </div>
                @endif
                @if(count($errors) > 0)

                    <div class="alert alert-danger alert-dismissible fade show">
                        <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                        </button>
                        <span>{{__('form.apartmentcreatefail')}}</span>
                    </div>
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible fade show">
                            <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="nc-icon nc-simple-remove"></i>
                            </button>
                            <span>{{$error}}</span>
                        </div>
                    @endforeach

                @endif

            </div>
        </div>
    </div>

@endsection