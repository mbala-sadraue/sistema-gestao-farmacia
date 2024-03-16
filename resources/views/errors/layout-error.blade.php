<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Template Main CSS File -->
    <link href="{{asset('assets/css/main.css')}}" rel="stylesheet">
    <style>
        html,
        body {
            height: 100%;
        }

        .btn {
            padding: 14px 16px;
            color: #fff;
            background: #5775cd;
            border-radius: 6px;
            border: none;
            font-weight: bold;
            font-size: 16px;
        }
        .btn:hover {
            color: #fff;
            background: #4a64b3;
        }
    </style>
</head>

<body>
    <div style="text-align: center; display: grid; align-items: center; height: 100%;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <img src="{{asset('assets/img/notfound.png')}}" class="img-fluid" alt="not found" />
                </div>
                <div class="col-md-12">
                    <h1>@yield('message')</h1>
                </div>
                <div class="col-md-12">
                    <a  href="/" type="button" class="btn"> Valtar a pagina inicial</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>