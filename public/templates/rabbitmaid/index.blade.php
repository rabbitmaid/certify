<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RabbitMaid</title>
    <style>
        @page {
            margin: 0;
            padding: 0;
        }
        .a4 {
            width:100%;
            height:100%;
            background: url("{{ public_path('templates/rabbitmaid/assets/images/layout.jpg') }}") no-repeat center / contain;
        }

        .page {
            position: relative;
        }

        .page > .authorization-up {
            color: #e69e0e;
            position: absolute;
            font-size: 18px;
            top: 29px;
            left: 50%;
            transform: translateX(-50%);
            font-weight: 700;
        }

        .page>h1 {
            color: white;
            text-align: center;
            font-size: 62px;
            text-transform: uppercase;
            position: absolute;
            top: 39px;
            left: 50%;
            transform: translateX(-50%);
        }

        .page>h1>span {
            font-size: 45px;
        }

        .page>.year {
            color: white;
            font-size: 35px;
            font-weight: 700;
            position: absolute;
            left: 112px;
            top: 242px;
            font-style: italic;
            font-family: 'Times New Roman', Times, serif;
        }

        .page>.intro {
            color: black;
            text-transform: uppercase;
            font-size: 26px;
            font-weight: 500;
            position: absolute;
            top: 320px;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
            width: 100%;
            font-style: normal;
            font-family: Helvetica;
        }

        .page>.name {
            color: #e69e0e;
            text-transform: uppercase;
            font-size: 40px;
            font-weight: 900;
            position: absolute;
            left: 50%;
            top: 340px;
            transform: translateX(-50%);
            width: 100%;
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
        }

        .page>.stroke {
            color: black;
            text-transform: uppercase;
            font-size: 40px;
            scale: 1.0035;
            font-weight: 900;
            position: absolute;
            left: 50.15%;
            top: 340px;
            transform: translateX(-50%);
            width: 100%;
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
        }

        .page>.desc {
            position: absolute;
            font-size: 18px;
            text-align: center;
            top: 420px;
            left: 50%;
            transform: translateX(-50%);
            width: 100%;
            font-weight: 400;
            line-height: 1.5;
            font-style: normal;
            font-family: Arial, Helvetica, sans-serif;
        }

        .page > .authorization {
            position: absolute;
            font-size: 12.5px;
            top: 450px;
            left: -98px;
            transform: rotate(90deg);
            font-weight: 700;
        }


        .page>.notice {
            position: absolute;
            font-size: 18px;
            color: #e69e0e;
            font-weight: 700;
            font-style: italic;
            text-align: center;
            top: 558px;
            left: 50%;
            transform: translateX(-50%);
            width: 100%;
            font-family: Arial, Helvetica, sans-serif;
        }

        .page>.uuid {
            position: absolute;
            color: black;
            font-size: 16px;
            bottom: 18px;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
            width: 100%;
            font-style: italic;
            font-family: 'Courier New', Courier, monospace;
        }

        .page>.qr-code {
            width: 140.8px;
            height: 140.8px;
            object-fit: contain;
            position: absolute;
            left: 943px;
            top: 604px;
        }

        .page>.logo {
            width: 125px;
            object-fit: contain;
            position: absolute;
            top: 85px;
            right: 59px;
        }
    </style>
</head>

<body>

    <div class="page a4">
        <p class="authorization-up">
            {{ $authorization }}
        </p>
        <h1>{!! $data['heading'] !!}</h1>
        <img src="{{ public_path('templates/rabbitmaid/assets/images/logo.png') }}" class="logo" />
        <p class="year">{!! $data['year'] !!}</p>
        <p class="intro">{!! $data['intro'] !!}</p>
        <p class="stroke">{!! $name !!} </p>
        <p class="name">{!! $name !!}</p>
        <p class="desc">
            {!! $data['description'] !!}    
        </p>

        <p class="authorization">
            {{ $authorization }}
        </p>

        <p class="notice">{!! $data['notice'] !!}</p>

         <p class="uuid">{{ $uuid }}</p>
        <img src="{{ public_path('templates/rabbitmaid/assets/images/qr-code.png') }}" class="qr-code" />
    </div>

</body>

</html>