@extends('layouts.app-dash')
@section('content')
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
            <h3 class="text-center">{{__('profile.updateapartment')}}</h3>
            <div class="row">
                <div class="col-md-6">
                    {{Form::open(['method' => 'PUT', 'action' => ['dashboard\ApartmentController@update',$apartment->id], 'files' => true])}}
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
                                                <input class="form-check-input" name="services[]" type="checkbox" value="{{$service->id}}">
                                                <span class="form-check-sign bg-success"></span>
                                                {{$service->name}} <i class="{{$service->icon}} bg-primary rounded-circle text-light p-2"></i>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <h4 class="card-title">{{__('form.city')}}</h4>
                                    <select class="selectpicker" data-size="7" name="city" data-style="btn btn-primary btn-round" required>
                                        <option disabled>{{__('form.city')}}</option>
                                        @foreach($cities as $city)
                                            <option value="{{$city->id}}">{{$city->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <h4 class="card-title">{{__('form.categories')}}</h4>
                                    <select class="selectpicker" name="category" data-style="btn btn-info btn-round" data-size="7" required>
                                        <option disabled>{{__('form.categories')}}</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
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
                            {{__('profile.profileupdatedocorrectly')}}
                    </span>
                        </div>

                    @endif
                    @if(count($errors) > 0)

                        <div class="alert alert-danger rounded"  role="alert">
                            <div class="container">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">
                      <i class="now-ui-icons ui-1_simple-remove"></i>
                    </span>
                                </button>
                                <p><strong>{{__('profile.ups')}}</strong></p>
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach

                            </div>
                        </div>



                    @endif
                </div>
            </div>
@endsection
