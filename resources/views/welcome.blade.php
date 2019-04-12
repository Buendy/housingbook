@extends('layouts.app-nav')

@section('content')

    <div class="page-header clear-filter">
        <div class="rellax-header rellax-header-sky" data-rellax-speed="-4">
            <div class="page-header-image" style="background-image: url('./img/presentation-page/nuk-pro-back-sky.jpg')">
            </div>
        </div>
        <div class="rellax-header rellax-header-buildings" data-rellax-speed="0">
            <div class="page-header-image page-header-city" style="background-image: url('./img/presentation-page/nuk-pro-buildings.png')">
            </div>
        </div>
        <div class="rellax-text-container rellax-text" style="font-size: 10px">
            <h1 class="h1-seo rellax-text" data-rellax-speed="-1">HousingBook</h1>

        </div>
        <h3 class="h3-description rellax-text" data-rellax-speed="-1">Busca y encuentra tu casa de alquiler</h3>


    </div>

    <div class="section section-components" data-background-color="dark-red">
        <div class="container">
            <div class="row mt-1" >
                <div class="col-md-8 ml-auto mr-auto">
                    <h2 class="text-center title">Busca casa en cualquier lugar
                        <br><br>
                        <small class="description">Encuentra tú casa en cualquier ciudad... </small>


                    </h2>
                    <form method="" action="">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" value="" placeholder="Introduce una ciudad" class="form-control" autocomplete="family-name" />
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center"">
                        <div class="col-md-4">
                            <button type="button" class="btn btn-primary btn-round btn-block">Buscar casas</button>
                        </div>
                </div>
                </form>
                <h2 class="text-center title">

                    <small class="description">o si lo prefieres, elige tu estilo.</small>


                </h2>

            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="card-container first-card">
                    <div class="card-component">
                        <a href="index.html#basic-elements" target="_blank">
                            <div class="front">
                                <img src="{{ asset('img/presentation-page/basic_thumb.jpg')}}">
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-container second-card">
                    <div class="card-component">
                        <a href="index.html#cards" target="_blank">
                            <div class="front">
                                <img src="{{ asset('img/presentation-page/cards_thumb.jpg')}}">
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-container third-card">
                    <div class="card-component">
                        <a href="sections.html" target="_blank">
                            <div class="front">
                                <img src="{{ asset('img/presentation-page/sections_thumb.jpg')}}">
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-container fourth-card">
                    <div class="card-component">
                        <a href="examples/product-page.html" target="_blank">
                            <div class="front">
                                <img src="{{ asset('img/presentation-page/pages2_thumb.jpg')}}">
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>





@endsection
