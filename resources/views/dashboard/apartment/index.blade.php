


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

</script>

