@extends('layouts.app-dash')


@section('content')

    <div class="content">
        @if(count(Auth::user()->apartments))
        <h2>Lista de apartamentos</h2>

        @else

        <h2>No hay apartamentos</h2>

        @endif


    </div>


    @endsection
