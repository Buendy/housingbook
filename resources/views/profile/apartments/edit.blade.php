@extends('layouts.app-nav')
@include('partials.header')
@section('content')
    <div class="container">
        <h3 class="text-center">{{__('profile.editapartment')}}</h3>
        <div class="content">
            <div class="row">
                <div class="col-md-4">
                    <div class="card ">
                        <div class="card-header ">
                            <h5 class="card-title">Datetimepicker</h5>
                        </div>
                        <div class="card-body ">
                            <div class="form-group">
                                <input type="text" class="form-control datetimepicker" value="10/05/2018">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card ">
                        <div class="card-header ">
                            <h5 class="card-title">Date Picker</h5>
                        </div>
                        <div class="card-body ">
                            <div class="form-group">
                                <input type="text" class="form-control datepicker" value="10/05/2018">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card ">
                        <div class="card-header ">
                            <h5 class="card-title">Time Picker</h5>
                        </div>
                        <div class="card-body ">
                            <div class="form-group">
                                <input type="text" class="form-control timepicker" value="10/05/2018">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="card-title">Toggle Buttons</h4>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="category">Default</p>
                                            <input class="bootstrap-switch" type="checkbox" data-toggle="switch" checked="" data-on-color="default" data-off-color="default" data-on-label="ON" data-off-label="OFF">
                                            <input class="bootstrap-switch" type="checkbox" data-toggle="switch" data-off-color="default" data-on-color="default" data-on-label="ON" data-off-label="OFF">
                                        </div>
                                        <div class="col-md-4">
                                            <p class="category">Plain</p>
                                            <input class="bootstrap-switch" type="checkbox" data-toggle="switch" checked="" data-on-color="primary" data-off-color="primary">
                                            <input class="bootstrap-switch" type="checkbox" data-toggle="switch" data-off-color="primary" data-on-color="primary">
                                        </div>
                                        <div class="col-md-4">
                                            <p class="category">With Icons</p>
                                            <input class="bootstrap-switch" type="checkbox" data-toggle="switch" checked data-on-label="<i class='nc-icon nc-check-2'></i>" data-off-label="<i class='nc-icon nc-simple-remove'></i>" data-on-color="success" data-off-color="success" />
                                            <input class="bootstrap-switch" type="checkbox" data-toggle="switch" data-on-label="<i class='nc-icon nc-check-2'></i>" data-off-label="<i class='nc-icon nc-simple-remove'></i>" data-on-color="success" data-off-color="success" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h4 class="card-title">Customisable Select</h4>
                                    <div class="row">
                                        <div class="col-lg-5 col-md-6 col-sm-3">
                                            <select class="selectpicker" data-size="7" data-style="btn btn-primary btn-round" title="Single Select">
                                                <option disabled selected>Single Option</option>
                                                <option value="2">Foobar</option>
                                                <option value="3">Is great</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-5 col-md-6 col-sm-3">
                                            <select class="selectpicker" data-style="btn btn-info btn-round" multiple title="Choose City" data-size="7">
                                                <option disabled> Multiple Options</option>
                                                <option value="2">Paris </option>
                                                <option value="3">Bucharest</option>
                                                <option value="4">Rome</option>
                                                <option value="5">New York</option>
                                                <option value="6">Miami </option>
                                                <option value="7">Piatra Neamt</option>
                                                <option value="8">Paris </option>
                                                <option value="9">Bucharest</option>
                                                <option value="10">Rome</option>
                                                <option value="11">New York</option>
                                                <option value="12">Miami </option>
                                                <option value="13">Piatra Neamt</option>
                                                <option value="14">Paris </option>
                                                <option value="15">Bucharest</option>
                                                <option value="16">Rome</option>
                                                <option value="17">New York</option>
                                                <option value="18">Miami </option>
                                                <option value="19">Piatra Neamt</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="card-title">Tags</h4>
                                    <input type="text" value="Amsterdam,Washington,Sydney,Beijing" class="tagsinput" data-role="tagsinput" data-color="primary" />
                                </div>
                                <div class="col-md-6">
                                    <h4 class="card-title">Dropdown & Dropup</h4>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-3">
                                            <div class="dropdown">
                                                <button class="dropdown-toggle btn btn-primary btn-round btn-block" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Dropdown
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                                    <div class="dropdown-header">Dropdown header</div>
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <a class="dropdown-item" href="#">Something else</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-3">
                                            <div class="dropup">
                                                <button type="button" class="dropdown-toggle btn btn-primary btn-round btn-block" data-toggle="dropdown">
                                                    Dropup
                                                </button>
                                                <div class="dropdown-menu">
                                                    <div class="dropdown-header">Dropdown header</div>
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="card-title">Progress Bars</h4>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <br/>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <br/>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-success" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="progress-bar progress-bar-warning" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="progress-bar progress-bar-info" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h4 class="card-title">Sliders</h4>
                                    <div id="sliderRegular" class="slider slider-success"></div>
                                    <br>
                                    <div id="sliderDouble" class="slider slider-primary"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-sm-4">
                                    <h4 class="card-title">Regular Image</h4>
                                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail">
                                            <img src="../../assets/img/image_placeholder.jpg" alt="...">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                        <div>
                        <span class="btn btn-rose btn-round btn-file">
                          <span class="fileinput-new">Select image</span>
                          <span class="fileinput-exists">Change</span>
                          <input type="file" name="..." />
                        </span>
                                            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    <h4 class="card-title">Avatar</h4>
                                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail img-circle">
                                            <img src="../../assets/img/placeholder.jpg" alt="...">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                                        <div>
                        <span class="btn btn-round btn-rose btn-file">
                          <span class="fileinput-new">Add Photo</span>
                          <span class="fileinput-exists">Change</span>
                          <input type="file" name="..." />
                        </span>
                                            <br />
                                            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
            </div>
        </div>
    </div>
@endsection