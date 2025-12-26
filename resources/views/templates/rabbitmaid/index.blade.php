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
            font-size: 30px;
            font-weight: 700;
            position: absolute;
            left: 113px;
            top: 250px;
        }

        .page>.intro {
            color: black;
            text-transform: uppercase;
            font-size: 26px;
            font-weight: 600;
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
            color: rgb(254, 130, 5);
            text-transform: uppercase;
            font-size: 40px;
            font-weight: 900;
            position: absolute;
            left: 50%;
            top: 364px;
            transform: translateX(-50%);
            width: 100%;
            text-align: center;
            text-shadow: 2px 2px black;
            font-style: normal;
            font-family: serif;
        }

        .page>.desc {
            position: absolute;
            font-size: 18px;
            text-align: center;
            top: 440px;
            left: 50%;
            transform: translateX(-50%);
            width: 100%;
            font-weight: 500;
            line-height: 1.5;
            font-style: normal;
            font-family: Helvetica;
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
            color: rgb(254, 130, 5);
            font-weight: 700;
            font-style: italic;
            text-align: center;
            top: 585px;
            left: 50%;
            transform: translateX(-50%);
            width: 100%;
            font-family: Helvetica;
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
        <h1>Certificate <br /> <span class="part">Of Training</span></h1>
        <img src="{{ public_path('templates/rabbitmaid/assets/images/logo.png') }}" class="logo" />
        <p class="year">2026</p>
        <p class="intro">Proudly Presented To</p>
        <p class="name">John Jobelane druad druid</p>
        <p class="desc">
            During his Training at ESCHOSYS TECHOLOGIES, <br />
            he gained hands-on experience in Graphic design, web development, SEO, GitHub,<br />
            and Digital Marketing. He successfully applied his skills to various projects,<br />
            contributing to both technical and creative aspects of the company. <br />
        </p>

        <p class="authorization">
            RC / YAO / 2023 / B /1851 DU 09 OCTOBER 2023
        </p>

        <p class="notice">This Certificate is issued to serve the purpose to which it is intended</p>
        <img src="{{ public_path('templates/rabbitmaid/assets/images/qr-code.png') }}" class="qr-code" />
    </div>

</body>

</html>