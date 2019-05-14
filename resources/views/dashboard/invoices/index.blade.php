@extends('layouts.app-dash')


@section('content')

    <div class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">{{__('profile.history')}}</h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                <th>{{__('profile.apartmentname')}}</th>
                                <th>{{__('profile.apartmentcity')}}</th>
                                <th>{{__('profile.apartmentaddress')}}</th>
                                <th class="text-center">Actions</th>
                                </thead>
                                <tbody>
                                @forelse($apartments as $apartment)
                                    <tr>
                                        <td>{{$apartment->name}}</td>
                                        <td>{{$apartment->city->name}}</td>
                                        <td>{{$apartment->address}}€</td>

                                        <td class="text-center">
                                            <a href="{{route('apartment.showapartment',$apartment->id)}}"
                                               data-toggle="tooltip" title="{{__('profile.show')}}"
                                               class="btn btn-info btn-icon btn-sm ">
                                                <i class="fa fa-user"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <h3>{{__('profile.apartmentempty')}}</h3>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection