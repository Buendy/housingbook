@extends('layouts.app-dash')


@section('content')

    <div class="content">

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
                                <tr>
                                    <td colspan="4" class="text-center"><h3>{{__('profile.apartmentempty')}}</h3></td>
                                </tr>



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection
