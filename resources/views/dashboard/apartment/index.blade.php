@extends('layouts.app-dash')


@section('content')

    <div class="content">
        <div class="container">
            <div class="row ">
                <div class="col-md-8 col-md-offset-4 mx-auto d-block text-center justify-content-center">
                    <div class="description">
                        <h2>{{__('profile.apartmenthello')}}</h2>
                    </div>

                    <div class="fresh-table full-color-orange justify-content-center mx-auto d-block text-center" style="width: 1000px">
                        <div class="toolbar">
                            <a href="{{route('apartment.createapartment')}}"><button class="btn btn-warning">{{__('profile.create')}}</button></a>
                        </div>

                        <table id="fresh-table" class="table">
                            <thead>
                            <th data-field="id">ID</th>
                            <th data-field="name" data-sortable="true">{{__('profile.apartmentname')}}</th>
                            <th data-field="salary" data-sortable="true">{{__('profile.apartmentaddress')}}</th>
                            <th data-field="country" data-sortable="true">{{__('profile.apartmentdescription')}}</th>
                            <th data-field="city">{{__('profile.apartmentcity')}}</th>
                            <th data-field="actions" data-formatter="operateFormatter" data-events="operateEvents" colspan="2">{{__('profile.apartmentactions')}}</th>
                            </thead>
                            <tbody>
                            @forelse($apartments as $apartment)
                                <tr>
                                    <td>{{$apartment->id}}</td>
                                    <td>{{$apartment->name}}</td>
                                    <td>{{$apartment->short_description}}</td>
                                    <td>{{$apartment->city->name}}</td>
                                    <td>{{$apartment->id}}</td>
                                    <td colspan="2" width="500">
                                        <div class="d-inline-block">
                                            <a href="{{route('apartment.showapartment',$apartment->id)}}" data-toggle="tooltip" title="{{__('profile.show')}}" class="btn-primary btn-round btn-sm"><i class="now-ui-icons design_app"></i></a>
                                            <a href="{{route('apartment.editapartment',$apartment->id)}}" data-toggle="tooltip" title="{{__('profile.edit')}}" class="btn-primary btn-round btn-sm"><i class="now-ui-icons design_app"></i></a>
                                            {{Form::open(['action' => ['ApartmentController@destroy',$apartment->id], 'method' => 'DELETE', 'class' => ['d-inline-block']])}}
                                            <button type="submit" data-toggle="tooltip" title="{{__('profile.delete')}}" class="btn-primary btn-round btn-sm"><i class="now-ui-icons design_app"></i></button>
                                            {{Form::close()}}
                                        </div>
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


@endsection
