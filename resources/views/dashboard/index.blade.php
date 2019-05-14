@extends('layouts.app-dash')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-10 ml-auto mr-auto">
                <div class="card card-calendar">
                    <div class="card-body ">
                        <div id="fullCalendar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.0.min.js"></script>
    <script>
        $(document).ready(function() {

            demo.initFullCalendar();

            var calendar = new Calendar(calendarEl, {

            });
        });
    </script>


@endsection