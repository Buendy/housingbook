@extends('layouts.app-nav')

@section('content')

    <div class="blogs-5" style="background-image: url('{{asset('/img/aparts.jpg')}}');">
        <div class="container">
            <div class="row">
                <div class="col-md-10 ml-auto mr-auto">
                    <div class="row justify-content-center">
                        <h2 class="title text-light">{{__('apartments.cities')}}</h2>
                    </div>
                    <div class="row">
                        <iframe src="https://www.google.com/maps/d/u/1/embed?mid=1PTfcZSQ0RahxXZR2__f9eHAD_CHHDcHr" width="1280" height="960"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
