@extends('layouts.app-nav')

@section('content')

    <div class="blogs-5" style="background-image: url('{{asset('img/header.jpg')}}');">
        <div class="container">
            <h1 class="mt-5 text-light mb-5">Mis reservas</h1>
        </div>

    </div>

    <div class="container mt-5">
        <h3 class="text-center">Listado de reservas pendientes</h3>
        <hr>

        <div class="row justify-content-center">
            <div class="col-md-8"></div>
            <div class="col-md-2">
                <h5 class="text-center">Entrada</h5>
            </div>
            <div class="col-md-2">
                <h5 class="text-center">Salida</h5>
            </div>
        </div>
        @foreach($reservations as $reservation)
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <p class="text-center p-1 text-light rounded" style="background-color: {{$reservation->category->color}};">{{$reservation->name}}</p>
                </div>
                <div class="col-md-2">
                    <p class="text-center p-1 text-light rounded bg-info ">{{date("d/m/Y", strtotime($reservation->pivot->entry))}}</p>
                </div>
                <div class="col-md-2">
                    <p class="text-center p-1 text-light rounded bg-info">{{date("d/m/Y", strtotime($reservation->pivot->entry))}}</p>
                </div>
            </div>


        @endforeach
        <h3 class="mt-5 text-center">Listado de reservas pasadas</h3>
        <hr>
        <div class="row justify-content-center">
            <div class="col-md-8"></div>
            <div class="col-md-2">
                <h5 class="text-center">Entrada</h5>
            </div>
            <div class="col-md-2">
                <h5 class="text-center">Salida</h5>
            </div>
        </div>
        @foreach($reservations as $reservation)
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <p class="text-center p-1 text-light rounded" style="background-color: {{$reservation->category->color}};">{{$reservation->name}}</p>
                </div>
                <div class="col-md-2">
                    <p class="text-center p-1 text-light rounded bg-info ">{{date("d/m/Y", strtotime($reservation->pivot->entry))}}</p>
                </div>
                <div class="col-md-2">
                    <p class="text-center p-1 text-light rounded bg-info">{{date("d/m/Y", strtotime($reservation->pivot->entry))}}</p>
                </div>
            </div>


        @endforeach
    </div>

@endsection
