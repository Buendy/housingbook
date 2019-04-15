@extends('layouts.app-nav')
@include('partials.header')
@section('content')
    <div class="section">
        <div class="container">
            <h2 class="section-title">Latest Offers</h2>
            <div class="row">
                @forelse($apartments as $apartment)
                    <div class="col-md-4">
                        <div class="card card-product card-plain">
                            <div class="card-image">
                                <img class="img rounded" src="{{$apartment->photo_image}}" />
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="{{route('apartments.show',$apartment->id)}}">{{$apartment->name}}</a>
                                </h4>
                                <p class="card-description">{{$apartment->description}}</p>
                                <div class="card-footer">
                                    <div class="price-container">
                                        <span class="price price-new"> {{$apartment->address}}</span>
                                    </div>
                                    <div class="stats stats-right">
                                        <button type="button" rel="tooltip" title="" class="btn btn-icon btn-neutral" data-original-title="Saved to Wishlist">
                                            <i class="now-ui-icons ui-2_favourite-28"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <h3>No hay apartamentos en estos momentos</h3>
                @endforelse
                <div class="mx-auto d-block">
                    {{$apartments->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection