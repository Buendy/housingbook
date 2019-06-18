@extends('layouts.app-nav')

@section('content')

    <div class="blogs-5" style="background-image: url('{{asset('img/header.jpg')}}');">
        <div class="container">
            <h1 class="mt-5 text-light mb-5">{{__('profile.reservations')}}</h1>
        </div>

    </div>

    <div class="container mt-5">
        <h3 class="text-center">{{__('profile.pendingreservations')}}</h3>
        <hr>

        <div class="row justify-content-center">
            <div class="col-md-8"></div>
            <div class="col-md-2">
                <h5 class="text-center">{{__('profile.entry')}}</h5>
            </div>
            <div class="col-md-2">
                <h5 class="text-center">{{__('profile.exit')}}</h5>
            </div>
        </div>
        @forelse($pending as $item)
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <p class="text-center p-1 text-light rounded" style="background-color: {{$item->category->color}};">{{$item->name}}</p>
                </div>
                @if(config('app.locale') == 'es')
                    <div class="col-md-2">
                        <p class="text-center p-1 text-light rounded bg-info ">{{date("d/m/Y", strtotime($item->pivot->entry))}}</p>
                    </div>
                    <div class="col-md-2">
                        <p class="text-center p-1 text-light rounded bg-info">{{date("d/m/Y", strtotime($item->pivot->exit))}}</p>
                    </div>
                @else
                    <div class="col-md-2">
                        <p class="text-center p-1 text-light rounded bg-info ">{{$item->pivot->entry}}</p>
                    </div>
                    <div class="col-md-2">
                        <p class="text-center p-1 text-light rounded bg-info">{{$item->pivot->exit}}</p>
                    </div>
                @endif
            </div>
        @empty
            <h3 class="text-center text-primary">{{__('profile.noreservations')}}</h3>
        @endforelse
        <h3 class="mt-5 text-center">{{__('profile.pastreservations')}}</h3>
        <hr>
        <div class="row justify-content-center">
            <div class="col-md-8"></div>
            <div class="col-md-2">
                <h5 class="text-center">{{__('profile.entry')}}</h5>
            </div>
            <div class="col-md-2">
                <h5 class="text-center">{{__('profile.exit')}}</h5>
            </div>
        </div>
        @forelse($past as $item)
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <p class="text-center p-1 text-light rounded" style="background-color: {{$item->category->color}};">{{$item->name}}</p>
                </div>
                @if(config('app.locale') == 'es')
                    <div class="col-md-2">
                        <p class="text-center p-1 text-light rounded bg-info ">{{date("d/m/Y", strtotime($item->pivot->entry))}}</p>
                    </div>
                    <div class="col-md-2">
                        <p class="text-center p-1 text-light rounded bg-info">{{date("d/m/Y", strtotime($item->pivot->exit))}}</p>
                    </div>
                @else
                    <div class="col-md-2">
                        <p class="text-center p-1 text-light rounded bg-info ">{{$item->pivot->entry}}</p>
                    </div>
                    <div class="col-md-2">
                        <p class="text-center p-1 text-light rounded bg-info">{{$item->pivot->exit}}</p>
                    </div>
                @endif
            </div>
        @empty
            <h3 class="text-center text-primary">{{__('profile.noreservationspass')}}</h3>
        @endforelse
    </div>
    @include('partials.footer')

@endsection
