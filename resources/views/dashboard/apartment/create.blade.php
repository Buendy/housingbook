@extends('layouts.app-dash-apartment')

@section('content')


    <div class="content p-5">
        <h3 class="">{{__('profile.createapartment')}}</h3>
        <div class="row">
            <div class="col-md-6">
                {{Form::open(['method' => 'POST', 'id' => 'upload_form', 'action' => 'dashboard\ApartmentController@store','files' => true])}}
                <div class="card ">
                    <div class="card-body ">
                        <h4 class="card-title">{{__('form.general')}}</h4>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{__('form.nameapartment')}}</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    {{Form::text('name', old('name'),['placeholder' => __('form.placeholdername'), 'class' => 'form-control','required'])}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{__('form.address')}}</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    {{Form::text('address', old('address'),['placeholder' => __('form.placeholderaddress'), 'class' => 'form-control','required'])}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{__('form.shortapartment')}}</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    {{Form::text('short_description', old('short_description'),['placeholder' => __('form.placeholdershort'), 'class' => 'form-control','required'])}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{__('form.descriptionapartment')}}</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    {{Form::textarea('description', old('description'),['placeholder' => __('form.placeholderdescription'), 'class' => 'form-control','required'])}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{__('form.price')}}</label>
                            <div class="col-sm-10 checkbox-radios">
                                <div class="form-group">
                                    <label class="form-check-label">
                                        <input type="number" name="price" class="form-control bg-warning" min="1">
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
                                        <option value="{{$city->id}}">{{$city->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <h4 class="card-title">{{__('form.categories')}}</h4>
                                <select class="form-control" name="category" data-style="btn btn-info btn-round" data-size="7" required>
                                    <option disabled>{{__('form.categories')}}</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{__('form.' . $category->name)}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <br>
                        <div class="row justify-content-center">

                            <div class="col-md-3 col-sm-4">

                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail img-circle">
                                        <img src="{{asset('assets/img/placeholder.jpg')}}" alt="...">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                                    <div>
                        <span class="btn btn-round btn-rose btn-file">
                          <span class="fileinput-new">{{__('apartments.addphoto')}}</span>
                          <span class="fileinput-exists">{{__('apartments.changephoto')}}</span>
                           {{Form::file('photos[]', ['id' => 'photos', 'multiple' => 'multiple'])}}
                        </span>
                                        <br />
                                        <a href="#" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> {{__('apartments.removephoto')}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <i class="mx-auto d-block justify-content-center">{{__('apartments.4photos')}}</i>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <button type="submit" class="btn btn-info" style="width: 100%">{{__('form.submit')}}</button>
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
                            {{__(session('success'))}}
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
