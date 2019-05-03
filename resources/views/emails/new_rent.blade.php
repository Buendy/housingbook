<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style media="screen">
        *{
            font-family: arial;
            color: #474747;
        }
        body{
            background-color: #e2e2e2;
        }
        ul{
            list-style-type: none;
        }

        .card{
            background-color: white;
            padding: 5px;
            box-shadow: -1px 2px 7px 3px #878787;
            border-radius: 5px;
            position:absolute;
            left:25%;
            width: 50%;
        }

        .card-header{
            padding: 5px;

        }
        .line-header{
            border-bottom: 1px solid #e2e2e2;
            widh: 100px;
            text-align: center;

        }
        h3{
            text-align: center;
        }
        .card-body{
            padding-left: 10px;
        }

        .total{
            border: 1px solid #b2b2b2;
            border-radius: 3px;
            padding: 5px;
            padding-left: 10px;
            margin-bottom: 10px;
            box-shadow: -1px 1px 3px 1px #b2b2b2;
        }
        span{
            background-color: #d84949;
            padding: 5px;
            border-radius: 5px;
            color: white;
        }

        a{
            color: #0194a8;
            text-decoration: none;
        }
        .centrado{
            text-align: center;
        }
        img{
            width: 100%;
            heidht: 100%;
        }


    </style>
</head>
<body>
<div class="card">
    <div class="card-header">
        <h3>{{__('mail.rentsuccess')}}</h3>
        <div class="line-header"></div>
        <img src="www.housingbook.es/img/mail-template.jpg"></img>
    </div>
    <div class="card-body">
        <h4>{{__('mail.customerdata')}}</h4>
        <ul>
            <li><strong>{{__('mail.customername')}}:</strong> {{$user->name}}</li>
            <li><strong>{{__('mail.customerlast_name')}}:</strong> {{$user->last_name}}</li>
            <li><strong>{{__('mail.customeraddress')}}:</strong> {{$user->address}}</li>
            <li></li>
            <li><strong>{{__('mail.customeremail')}}:</strong> {{$user->email}}</li>
            <li><strong>{{__('mail.customerphone')}}:</strong> {{$user->phone}}</li>
        </ul>
        <h4>{{__('mail.ownerdata')}}:</h4>
        <ul>
            <li><strong>{{__('mail.ownername')}}:</strong> {{$apartment->user()->name}}</li>
            <li><strong>{{__('mail.ownerlast_name')}}:</strong> {{$apartment->user()->last_name}}</li>
            <li><strong>{{__('mail.owneraddress')}}:</strong> {{$apartment->user()->address}}</li>
            <li></li>
            <li><strong>{{__('mail.owneremail')}}:</strong> {{$apartment->user()->email}}</li>
            <li><strong>{{__('mail.ownerphone')}}:</strong> {{$apartment->user()->phone}}</li>
        </ul>
        <div class="line-header"></div>
        <h4>{{__('mail.rentdata')}}</h4>
        <ul>
            <li><strong>{{__('mail.apartmentname')}}:</strong> {{$apartment->name}}</li>
            <li><strong>{{__('mail.apartmentaddress')}}:</strong> {{$apartment->address}}</li>
            <li><strong>{{__('mail.apartmentphone')}}:</strong> {{$apartment->phone}}</li>

        </ul>
        <div class="total">
            <p><strong>{{__('mail.apartmentduration')}}:</strong> {{$apartment->name}}</p>
            <p><strong>{{__('mail.apartmentprice')}}:</strong><span> {{$apartment->name}}€</span></p>
        </div>
        <div class="line-header"></div>
        <p class="centrado"> {{__('mail.generaldoubts')}}:</p>
        <p class="centrado"><a href="#">admin@housingbook.es</a></p>
    </div>
</div>
</body>
</html>
