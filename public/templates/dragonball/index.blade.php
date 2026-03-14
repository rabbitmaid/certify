<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Certificate</title>

    <style>
        @page {
            size: A4 landscape;
            margin: 0;
        }

        body {
            margin: 0;
            padding: 0;
        }

        .page {
            width: 100%;
            height: 100%;
            position: relative;
            background: #fdfdfd;
            font-family: "Georgia", serif;
            background: url("{{ public_path('templates/dragonball/assets/images/layout.jpg') }}") no-repeat center / contain;
        }

        /* decorative border */

        .frame {
            position: absolute;
            top: 20px;
            left: 20px;
            right: 20px;
            bottom: 20px;
            border: 10px solid #1f3c5a;
        }

        .inner-frame {
            position: absolute;
            top: 40px;
            left: 40px;
            right: 40px;
            bottom: 40px;
            border: 2px solid #d4af37;
        }

        /* header */

        .authorization-up {
            position: absolute;
            top: 50px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 16px;
            letter-spacing: 2px;
            color: #d4af37;
            font-weight: 700;
        }

        .page h1 {
            position: absolute;
            top: 134px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 38px;
            text-transform: uppercase;
            color: #1f3c5a;
            text-align: center;
        }

        .logo {
            position: absolute;
            right: 90px;
            top: 95px;
            width: 160px;
        }

        /* content */

        .year {
            position: absolute;
            top: 230px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 26px;
            font-style: italic;
            color: #333;
        }

        .intro {
            position: absolute;
            top: 280px;
            left: 50%;
            transform: translateX(-50%);
            width: 100%;
            text-align: center;
            font-size: 24px;
            text-transform: uppercase;
        }

        .name {
            position: absolute;
            top: 320px;
            left: 50%;
            transform: translateX(-50%);
            width: 100%;
            text-align: center;
            font-size: 44px;
            font-weight: 800;
            color: #d4af37;
            text-transform: uppercase;
        }

        .stroke {
            position: absolute;
            top: 318px;
            left: 50.2%;
            transform: translateX(-50%);
            font-size: 44px;
            font-weight: 900;
            color: #000;
            opacity: 0.8;
            text-transform: uppercase;
        }

        .desc {
            position: absolute;
            top: 420px;
            left: 50%;
            transform: translateX(-50%);
            width: 70%;
            text-align: center;
            font-size: 18px;
            line-height: 1.6;
        }

        /* notice */

        .notice {
            position: absolute;
            top: 570px;
            left: 50%;
            transform: translateX(-50%);
            width: 100%;
            text-align: center;
            font-size: 18px;
            font-style: italic;
            color: #d4af37;
            font-weight: 700;
        }

        /* qr */

        .qr-wrapper {
            position: absolute;
            right: 70px;
            bottom: 80px;
            padding: 10px;
            background: white;
            border: 1px solid #ddd;
        }

        .qr-wrapper img {
            width: 110px;
            height: 110px;
        }

        /* uuid */

        .uuid {
            position: absolute;
            bottom: 85px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 15px;
            font-style: italic;
            font-family: monospace;
        }

    </style>
</head>

<body>

    <div class="page">

        <div class="frame">
        </div>
        <div class="inner-frame"></div>

        <p class="authorization-up">
            {{ $authorization }}
        </p>

        <h1>{!! $data['heading'] !!}</h1>

        <img src="{{ public_path('storage/' . $logo ) }}" class="logo" />

        <p class="year">{!! $data['year'] !!}</p>

        <p class="intro">{!! $data['intro'] !!}</p>

        <p class="stroke">{!! $name !!}</p>
        <p class="name">{!! $name !!}</p>

        <p class="desc">
            {!! $data['description'] !!}
        </p>

        <p class="notice">
            {!! $data['notice'] !!}
        </p>

        <p class="uuid">
            {{ $uuid }}
        </p>

        <div class="qr-wrapper">
            <img src="{{ public_path('storage/'. $qrCodeFile) }}" />
        </div>

    </div>

</body>
</html>
