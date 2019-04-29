@extends('layouts.app')

@section('content')
    <div class="container p-5">
        <div class="row justify-content-center">
            @if ($message = Session::get('success'))
                <div class="w3-panel w3-green w3-display-container">
        <span onclick="this.parentElement.style.display='none'"
              class="w3-button w3-green w3-large w3-display-topright">&times;</span>
                    <p>{!! $message !!}</p>
                </div>
                {{Session::forget('success')}}
            @endif
            @if ($message = Session::get('error'))
                <div class="w3-panel w3-red w3-display-container">
        <span onclick="this.parentElement.style.display='none'"
              class="w3-button w3-red w3-large w3-display-topright">&times;</span>
                    <p>{!! $message !!}</p>
                </div>
                {{Session::forget('error')}}
            @endif
            <div class="col-md-6 p-5">
                <h3 class="bg-info text-light p-3 text-center">PAYWITH PAYPAL</h3>
                <form class="form-control" method="POST" id="payment-form"  action="{{route('paypal-pay')}}">
                    {{ csrf_field() }}
                    <h3 class="text-info">Payment Form</h3>
                    <p>Demo PayPal form - Integrating paypal in laravel</p>
                    <p>
                        <label class="text-info"><b>Enter Amount</b></label>
                        <input class="form-group" name="amount" type="number"></p>
                    <p>
                        <label class="text-info"><b>Enter name</b></label>
                        <input class="form-group" name="name" type="text"></p>
                    <button class="btn btn-info">Pay with PayPal</button></p>
                </form>

            </div>
        </div>
    </div>



    @endsection