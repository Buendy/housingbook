@extends('layouts.app-dash')


@section('content')

    <div class="content">
        <div class="row justify-content-center">
            <div class="toolbar text-center">
                <a href="{{route('apartment.createapartment')}}"><i class="fa fa-plus border bg-warning rounded-circle p-4 text-light" style="font-size:30px;"></i></a>
                <p><a href="{{route('apartment.createapartment')}}"><button class="btn btn-warning">{{__('profile.create')}}</button></a></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">{{__('profile.apartmenthello')}}</h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                <th>{{__('profile.apartmentname')}}</th>
                                <th>{{__('profile.apartmentcity')}}</th>
                                <th>{{__('form.price')}}</th>
                                <th>{{__('profile.apartmentaddress')}}</th>

                                <th class="text-center">Actions</th>
                                </thead>
                                <tbody>
                                @forelse($apartments as $apartment)
                                    <tr>
                                        <td>{{$apartment->name}}</td>
                                        <td>{{$apartment->city->name}}</td>
                                        <td>{{$apartment->price}}€</td>
                                        <td>{{$apartment->address}}€</td>
                                        <td class="text-center text-light">
                                            <a href="{{route('apartment.showapartment',$apartment->id)}}"
                                               data-toggle="tooltip" title="{{__('profile.show')}}"
                                               class="btn btn-info btn-icon btn-sm ">
                                                <i class="fa fa-user"></i>
                                            </a>
                                            <a href="{{route('apartment.editapartment',$apartment->id)}}"
                                               class="btn btn-success btn-icon btn-sm "
                                               data-toggle="tooltip" title="{{__('profile.edit')}}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            {{Form::open(['action' => ['dashboard\ApartmentController@destroy',$apartment->id], 'method' => 'DELETE', 'class' => ['d-inline-block']])}}
                                            <button type="submit" data-toggle="tooltip" title="{{__('profile.delete')}}" class="btn btn-danger btn-icon btn-sm"><i class="fa fa-times"></i></button>
                                            {{Form::close()}}
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
            <div class="mx-auto d-block">
                {{$apartments->links()}}
            </div>
        </div>

    </div>


@endsection
