<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <style>
        .grad {
            background: #2C3590;
            background: -webkit-linear-gradient(270deg, rgba(44, 53, 144, 1) 0%, rgba(0, 149, 255, 1) 100%);
            background: -moz-linear-gradient(270deg, rgba(44, 53, 144, 1) 0%, rgba(0, 149, 255, 1) 100%);
            background: linear-gradient(270deg, rgba(44, 53, 144, 1) 0%, rgba(0, 149, 255, 1) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#2C3590",
                endColorstr="#0095FF",
                GradientType=0);
        }
    </style>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
</head>

<body class="hold-transition login-page grad">
    <div class="login-box">
        {{-- <div class="login-logo font-weight-normal text-white ">
            <a href="/">{{ config('app.name', 'Laravel') }}</a>
        </div> --}}
        <!-- /.login-logo -->
        <div class="card">
            @yield('content')
        </div>
    </div>
    <!-- /.login-box -->

    @vite('resources/js/app.js')
    <!-- Bootstrap 4 -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('js/adminlte.min.js') }}" defer></script>
</body>

</html>
