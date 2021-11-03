<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css') }}"/>
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #1a1e21;
            color: white;
        }

        footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 2.5rem;
        }

        .center {
            display: flex;
            justify-content: center;
        }

        .padding {
            padding: 10px;
        }

        .input-text {
            padding: 5px;
            width: 250px;
        }

        .middle-container {
            margin: auto;
        }
    </style>
</head>
<body>
@yield('content')
</body>
</html>
