<html>
<head>
    <title></title>
    <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet" type="text/css" />

    <script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.js') }}" type="text/javascript"></script>

</head>
<body>

<div class="container-fluid">
    @yield('content')
</div>
</body>
</html>