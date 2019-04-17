@extends('layouts.app-nav')
@push('style')
    <!-- Style -->
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" />
    <link href="{{asset('css/fresh-bootstrap-table.css')}}" rel="stylesheet" />

    <!-- Fonts and icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
@endpush
@include('partials.header')
@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-8 col-md-offset-4 mx-auto d-block text-center justify-content-center">
                <div class="description">
                    <h2>{{__('profile.apartmenthello')}}</h2>
                </div>

                <div class="fresh-table full-color-orange justify-content-center mx-auto d-block text-center" style="width: 1000px">
                    <div class="toolbar">
                        <a href="{{route('profile.createapartment')}}"><button class="btn btn-warning">{{__('profile.create')}}</button></a>
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
                                        <a href="{{route('profile.showapartment',$apartment->id)}}" data-toggle="tooltip" title="{{__('profile.show')}}" class="btn-primary btn-round btn-sm"><i class="now-ui-icons design_app"></i></a>
                                        <a href="{{route('profile.editapartment',$apartment->id)}}" data-toggle="tooltip" title="{{__('profile.edit')}}" class="btn-primary btn-round btn-sm"><i class="now-ui-icons design_app"></i></a>
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
@endsection
@push('script')
    <!-- Javascript -->
    <script type="text/javascript" src="{{asset('js/jquery-1.11.2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap-table.js')}}"></script>

    <script type="text/javascript">
        var $table = $('#fresh-table'),
            $alertBtn = $('#alertBtn'),
            full_screen = false;

        $().ready(function(){
            $table.bootstrapTable({
                toolbar: ".toolbar",

                showRefresh: true,
                search: true,
                showToggle: true,
                showColumns: true,
                pagination: true,
                striped: true,
                sortable: true,
                pageSize: 8,
                pageList: [8,10,25,50,100],

                formatShowingRows: function(pageFrom, pageTo, totalRows){
                    //do nothing here, we don't want to show the text "showing x of y from..."
                },
                formatRecordsPerPage: function(pageNumber){
                    return pageNumber + " rows visible";
                },
                icons: {
                    refresh: 'fa fa-refresh',
                    toggle: 'fa fa-th-list',
                    columns: 'fa fa-columns',
                    detailOpen: 'fa fa-plus-circle',
                    detailClose: 'fa fa-minus-circle'
                }
            });
        });

        $(function () {
            $alertBtn.click(function () {
                alert("You pressed on Alert");
            });
        });


        function operateFormatter(value, row, index) {
            return [
                '<a rel="tooltip" title="Like" class="table-action like" href="javascript:void(0)" title="Like">',
                '<i class="fa fa-heart"></i>',
                '</a>',
                '<a rel="tooltip" title="Edit" class="table-action edit" href="javascript:void(0)" title="Edit">',
                '<i class="fa fa-edit"></i>',
                '</a>',
                '<a rel="tooltip" title="Remove" class="table-action remove" href="javascript:void(0)" title="Remove">',
                '<i class="fa fa-remove"></i>',
                '</a>'
            ].join('');
        }

        window.operateEvents = {
            'click .like': function (e, value, row, index) {
                alert('You click like icon, row: ' + JSON.stringify(row));
                console.log(value, row, index);
            },
            'click .edit': function (e, value, row, index) {
                console.log(value, row, index);
            },
            'click .remove': function (e, value, row, index) {
                alert('You click remove icon, row: ' + JSON.stringify(row));
                console.log(value, row, index);
            }
        }

        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });

    </script>
@endpush