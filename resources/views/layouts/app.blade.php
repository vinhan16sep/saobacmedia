<!DOCTYPE html>
<html lang="zxx">



<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pustok - Book Store HTML Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Use Minified Plugins Version For Fast Page Load -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/plugins.css?v=' . ($ver ?? '')) }}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/main.css?v=' . ($ver ?? '')) }}" />
    <link rel="shortcut icon" type="image/x-icon" href="image/favicon.ico">
</head>

<body>

    @include('layouts.header')

    @yield('content')

    @include("layouts.footer")
    
    <!-- Use Minified Plugins Version For Fast Page Load -->
    <script type="text/javascript" src="{{ asset('js/plugins.js?v=' . ($ver ?? '')) }}"></script>
    <script type="text/javascript" src="{{ asset('js/ajax-mail.js?v=' . ($ver ?? '')) }}"></script>
    <script type="text/javascript" src="{{ asset('js/custom.js?v=' . ($ver ?? '')) }}"></script>
</body>



</html>