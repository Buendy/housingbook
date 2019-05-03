@extends('layouts.app')

@section('content')
    <div class="container p-5 bg-info">
        <div class="row justify-content-center">
            <div class="col-md-7 p-5">
                <h3 class="bg-light text-info border rounded shadow p-3 text-center">PAYWITH PAYPAL</h3>
            </div>
        </div>
        <div class="row justify-content-center text-center">
            <div class="col-md-7 p-5 bg-light border rounded shadow">
                <h3 >{{__('form.confirm_text')}}</h3>
                <hr>
                <h6>{{__('form.confirm_par')}}</h6>
                <div class="row justify-content-around">
                    <div class="col-md-6">
                        <p><strong>{{__('form.nameapartment')}}</strong></p>
                        <p><strong>{{__('form.total_price')}}</strong></p>
                        <p><strong>{{__('form.stay')}}</strong></p>
                    </div>
                    <div class="col-md-6">
                        <p class="bg-secondary text-light rounded">{{$apartment->name}}</p>
                        <p class="bg-warning text-light rounded">{{$apartment->price * $days}} &euro;</p>
                        <p class="bg-secondary text-light rounded">{{$entrada . " -- " . $salida}}</p>
                    </div>
                </div>
                <form class="" method="POST" id="payment-form"  action="{{route('paypal-pay')}}">
                    {{ csrf_field() }}

                    <input class="form-group" hidden name="amount" type="number" value="{{$apartment->price * $days}}">
                    <input class="form-group" hidden name="name" type="text" value="{{$apartment->name}}">
                    <input type="submit" class="btn btn-info" value="{{__('form.confirm')}}">
                </form>
            </div>
        </div>
    </div>
    <div class="container bg-secondary text-center" >
        <p><img src="https://upload.wikimedia.org/wikipedia/commons/a/a4/Paypal_2014_logo.png" style="width: 193px; height: 185px" alt=""></p>
        <div class="rellax-text-container rellax-text" style="font-size: 5px">
            <h1 class="h1-seo rellax-text" data-rellax-speed="-1">HousingBook</h1>

        </div>
    </div>




    @endsection