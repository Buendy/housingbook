


<div class="content p-5">
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

                            <th class="text-center">{{__('form.actions')}}</th>
                            </thead>
                            <tbody>
                            @forelse($apartments as $apartment)
                                <tr>
                                    <td>{{$apartment->name}}</td>
                                    <td>{{$apartment->city->name}}</td>
                                    <td>{{$apartment->price}}€</td>
                                    <td>{{$apartment->address}}</td>
                                    <td class="text-center text-light">
                                        <a href="{{$apartment->id}}"
                                           data-toggle="tooltip" title="{{__('profile.show')}}"
                                           class="btn btn-info btn-icon btn-sm show">
                                            <i class="fa fa-user"></i>
                                        </a>
                                        <a href="{{url('/dashboard/apartment/' . $apartment->id .'/edit')}}"
                                           class="btn btn-success btn-icon btn-sm edit"
                                           data-toggle="tooltip" title="{{__('profile.edit')}}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a data-toggle="tooltip" data-placement="top" title="{{__('profile.deletephotos')}}"><button data-toggle="modal" data-target="#photo" data-id="{{$apartment->id}}" class="photoApartment btn btn-warning btn-icon btn-sm"><i class="fa fa-photo"></i></button></a>
                                        <a data-toggle="tooltip" data-placement="top" title="{{__('profile.deleteapartment')}}"><button data-toggle="modal" data-target="#borrar" data-id="{{$apartment->id}}" class="Apartment btn btn-danger btn-icon btn-sm"><i class="fa fa-times"></i></button></a>
                                    </td>
                                </tr>
                            @empty
                                <h3>{{__('profile.apartmentempty')}}</h3>
                            @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Modal -->
                    <div id="photo" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header" style="height:20px;">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <p>{{__('apartments.photodelete')}}</p>
                                </div>
                                <div class="modal-footer" style="margin-right: 10px">
                                    {{Form::open(['action' => ['dashboard\ApartmentController@photodestroy'], 'method' => 'DELETE', 'class' => ['d-inline-block']])}}
                                    <input type="hidden" name="idHolder" id="idHolder">
                                    <input type="submit" class="btn btn-danger" value="{{__('apartments.accept')}}" name="{{__('apartments.accept')}}">
                                    {{Form::close()}}
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">{{__('apartments.cancel')}}</button>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Modal -->
                    <div id="borrar" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header" style="height:20px;">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <p>{{__('apartments.apartmentdelete')}}</p>
                                </div>
                                <div class="modal-footer" style="margin-right: 10px">
                                    {{Form::open(['action' => ['dashboard\ApartmentController@destroy'], 'method' => 'DELETE', 'class' => ['d-inline-block']])}}
                                    <input type="submit" class="btn btn-danger" value="{{__('apartments.accept')}}" name="{{__('apartments.accept')}}">
                                    <input type="hidden" name="idHolder" id="idHolder2">
                                    {{Form::close()}}
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">{{__('apartments.cancel')}}</button>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>

    $(".show").each(function() {
        $(this).click(function (event) {

            if(event.currentTarget.href !== undefined)
            {
                event.preventDefault();

                let indice = event.currentTarget.href.split("/");

                $.ajax(
                    {
                        url: "/dashboard/apartment/show/" + indice[3],
                        type: 'GET',
                    }).done(

                    function(data)
                    {
                        $('#ajaxviews').html(data.html);
                    }
                );
            }

        });
    });

    $(document).on("click", ".photoApartment", function () {
        var eventId = $(this).data('id');
        $('#idHolder').val( eventId );
    });

    $(document).on("click", ".Apartment", function () {
        var eventId = $(this).data('id');
        $('#idHolder2').val( eventId );
    });

</script>

