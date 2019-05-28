
<div class="content">
    <div class="row">
        <div class="col-md-12 ml-auto mr-auto shadow p-5">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5 col-md-4">
                                    <div class="icon-big text-center icon-warning">
                                        <i class="fa fa-home text-warning"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-md-8">
                                    <div class="numbers">
                                        <p class="card-category">{{__('dashboard.apartment')}}</p>
                                        <p class="card-title">{{count(Auth()->user()->apartments)}}
                                        <p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5 col-md-4">
                                    <div class="icon-big text-center icon-warning">
                                        <i class="nc-icon nc-money-coins text-success"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-md-8">
                                    <div class="numbers">
                                        <p class="card-category">{{__('dashboard.totals')}}</p>
                                        <p class="card-title">{{$totalEarnings}} &euro;
                                        <p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <hr>
                        </div>
                    </div>
                </div>

                <div id="test">

                </div>

                <!--
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5 col-md-4">
                                    <div class="icon-big text-center icon-warning">
                                        <i class="nc-icon nc-vector text-danger"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-md-8">
                                    <div class="numbers">
                                        <p class="card-category">Errors</p>
                                        <p class="card-title">23
                                        <p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <hr>
                        </div>
                    </div>
                </div>
                -->
                <!--
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5 col-md-4">
                                    <div class="icon-big text-center icon-warning">
                                        <i class="nc-icon nc-favourite-28 text-primary"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-md-8">
                                    <div class="numbers">
                                        <p class="card-category">Followers</p>
                                        <p class="card-title">+45K
                                        <p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
            -->
                <br>
                <h3 class="text-center text-primary justify-content-center text-center mx-auto d-block">{{__('dashboard.resume')}}</h3>

                <div class="row">
                    <div class="col-md-7 ml-auto mr-auto">
                        <div class="card card-calendar">
                            <div class="card-body ">
                                <div id="fullCalendar" class="btns-calendar"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.0.min.js"></script>
<script>

    let language = "{!! config('app.locale'); !!}";

    let colours = ['#093145','#107896','#829356','#BCA136','#C2571A','#9A2617'];

    let array = {!! json_encode($allDates) !!};

    let months, abrev, days, today;

    if(language == "es"){
        months = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
        abrev = ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'];
        days = ['Lun','Mar','Mie','Jue','Vie','Sáb','Dom'];
        today = "Hoy";
    } else {
        months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
        abrev = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
        days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        today = "Today";
    }

    let getEvent = [];
    for(let i = 0, j = 0;i < array.length;i++,j++)
    {
        let title = "{!! __('dashboard.rentedTo') !!}: " + array[i].name.toString() + ", {!! __('dashboard.rented') !!}: " + array[i].last_name.toString();
        let start = array[i].entry;
        let end = array[i].exit;
        let color;

        if(j == 6)
        {
            j=0;
        }
        color = colours[j];

        let insertEvents = {};
        insertEvents =
            {
                title: title,
                start: start,
                end: end,
                color: color,
                textColor: 'white',
            },
            getEvent.push(insertEvents);
    }


    $('#fullCalendar').fullCalendar({
        editable: false,
        weekMode: 'liquid',
        weekends: true,
        events: getEvent,
        monthNames: months,
        monthNamesShort: abrev,
        dayNamesShort: days,
        buttonText: {
            today: today
        },
        /*eventRender: function(event, element) {
            let title = event.title.split(",");
            $(element).tooltip({
                title: title[0] + "<br>" + title[1],
                content: title[1],
                trigger: 'hover',
                html: true,
                placement: 'top',
            });
        },*/
    });
</script>


