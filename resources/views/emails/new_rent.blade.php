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
        <h3>Reserva realizada con exito</h3>
        <div class="line-header"></div>
        <img src="www.housingbook.es/img/mail-template.jpg"></img>

    </div>
    <div class="card-body">
        <h4>Datos del cliente</h4>
        <ul>
            <li><strong>Nombre:</strong> Daniel</li>
            <li><strong>Apellidos:</strong> Buendia Valverde</li>
            <li><strong>Dirección:</strong> C/ Sin número</li>
            <li></li>
            <li><strong>Email:</strong> buendy@gmail.com</li>
            <li><strong>Teléfono:</strong> 12345678</li>
        </ul>
        <h4>Datos del dueño:</h4>
        <ul>
            <li><strong>Nombre:</strong> Joss</li>
            <li><strong>Apellidos:</strong> Tomas smith</li>
            <li><strong>Dirección:</strong> C/ Ande sea nº 5</li>
            <li></li>
            <li><strong>Email:</strong> jossmith@hmail.com</li>
            <li><strong>Teléfono:</strong> 12345678</li>
        </ul>
        <div class="line-header"></div>
        <h4>Información sobre la reserva</h4>
        <ul>
            <li><strong>Establecimiento:</strong> La casika</li>
            <li><strong>Dirección:</strong> C/ en un lugar perdido</li>
            <li><strong>Teléfono de contacto:</strong> 12345678</li>

        </ul>
        <div class="total">
            <p><strong>Duración de la reserva:</strong> 5 días</p>
            <p><strong>Precio total de la reserva:</strong><span> 230€</span></p>
        </div>
        <div class="line-header"></div>
        <p class="centrado"> Para cualquier consulta escribanos a:</p>
        <p class="centrado"><a href="#">admin@housingbook.es</a></p>


    </div>

</div>


</body>
</html>
