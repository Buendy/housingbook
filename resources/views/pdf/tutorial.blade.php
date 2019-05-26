<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ID TELEGRAM</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        *{
            color: #6b6b6b;
        }
        .fotos{
            text-align: center;
        }
        img{
            border: 1px solid #6b6b6b;
            border-radius: 5px;

        }
        h3{
            color: white;
            background-color: #1cc5db;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<h3 class="fotos">{{__('telegram.how')}}</h3>
<hr>
<p>{{__('telegram.identi')}}</p>
<p>{{__('telegram.util')}}</p>
<hr>
<p>{{__('telegram.obtain')}}</p>
<br>
<p class="fotos"><img src="{{asset('img/telegram-1.jpg')}}"  width="300" height="300" alt="">
    <img src="{{asset('img/telegram-2.jpg')}}" width="300" height="300" alt=""></p>
<p>{{__('telegram.id')}}</p>
<p class="fotos"><img src="{{asset('img/telegram-3.jpg')}}" width="300" height="300" alt=""></p>

</body>
</html>
