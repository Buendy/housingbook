<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <title>{{__('invoice.invoice')}}</title>

    <style>
        *{
            color: #6b6b6b;
        }

        .derecha{
            color: #f48942;
            font-size: 40px;
            opacity: 0.5;
        }
        .tabla{
            width: 100%;
        }
        .datos{
            font-size: 12px;
        }
        .cabecera{
            background-color: #f48942;
        }
        .footer {
            position: fixed;
            left: 0;
            bottom: 5%;
            width: 100%;
            background-color: #f48942;
            color: white;
            text-align: center;
            border-radius: 5px;
            box-shadow: 10px 10px 8px -6px rgba(0,0,0,0.75);
        }
        .titulo{
            color: #f48942;
            font-size: 60px;

        }



    </style>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
<table class="tabla">
    <tr>
        <td><h3 class="titulo">HousingBook</h3></td>
        <td><h3 class="text-right derecha">{{__('invoice.invoice')}}</h3></td>
    </tr>
</table>



<h4><strong>{{auth()->user()->name}}</strong></h4>
<h6><strong>{{__('invoice.anywhere')}}</strong></h6>
<br>
<table class="tabla">
    <tr>
        <td>{{auth()->user()->address}}</td>
        <td><strong>{{__('invoice.date')}}</strong> {{Config::get('app.locale') == 'es' ? date("d/m/Y", strtotime($invoice->pivot->entry)) : $invoice->pivot->entry}} </td>
    </tr>
    <tr>
        <td>{{auth()->user()->email}}</td>
        <td><strong>{{__('invoice.invoice')}}</strong> {{rand(10000,1000000)}}</td>
    </tr>
    <tr>
        <td><strong></strong> {{auth()->user()->phone}}</td>
    </tr>
</table>
<br>
<table class="tabla">
    <tr>
        <td><strong>{{__('invoice.to')}}</strong></td>
    </tr>
    <tr>
        <td>{{Auth()->user()->last_name}}, {{Auth()->user()->name}}</td>
    </tr>
    <tr>
        <td>{{Auth()->user()->address}}</td>
    </tr>
</table>
<br>
<table class="table datos p-1">
    <thead>
    <tr class="cabecera text-light">
        <th>{{__('invoice.description')}}</th>
        <th class="text-right">{{__('invoice.price')}}</th>
        <th class="text-right">{{__('invoice.days')}}</th>
        <th class="text-right">Total</th>
    </tr>

    </thead>
    <tbody class="tbody">
    <tr>
        @if(Config::get('app.locale') == 'es')
            <td>{{$invoice->name}} - {{date("d/m/Y", strtotime($invoice->pivot->entry))}} &nbsp;/&nbsp; {{date("d/m/Y", strtotime($invoice->pivot->exit))}}</td>
        @else
            <td>{{$invoice->name}} - {{$invoice->pivot->entry}} &nbsp;/&nbsp; {{$invoice->pivot->exit}}</td>
        @endif
        <td class="text-right">{{$invoice->price}} &euro;</td>
        <td class="text-right">{{$days}}</td>
        <td class="text-right">{{$invoice->pivot->total}} &euro;</td>
    </tr>
    <tr>
        <td colspan="3" class="text-right"><strong>Total:</strong></td>
        <td class="text-right">{{$invoice->pivot->total}} &euro;</td>
    </tr>

    </tbody>


</table>

<hr>
<footer class="footer text-center text-light p-2">
    <h3>HousingBook</h3>
    <p>{{__('invoice.issue')}}</p>
    <br><br>
</footer>

</body>
</html>
