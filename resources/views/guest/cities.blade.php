@extends('layouts.app-nav')

@section('content')

    <div class="blogs-5" style="background-image: url('{{asset('/img/aparts.jpg')}}');">
        <div class="container">
            <div class="row">
                <div class="col-md-10 ml-auto mr-auto">
                    <div class="row justify-content-center">
                        <h2 class="title text-light">{{__('apartments.cities')}}</h2>
                    </div>

                </div>
            </div>
        </div>
    </div>

   <div class="container">
       <div class="row justify-content-center mt-5">
           <div class="col-md-10">
               <iframe class="borde shadow-lg" src="https://www.google.com/maps/d/u/1/embed?mid=1PTfcZSQ0RahxXZR2__f9eHAD_CHHDcHr" width="900" height="700"></iframe>
           </div>

       </div>
   </div>
    @include('partials.footer')

@endsection


