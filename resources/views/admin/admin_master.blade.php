<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">


</head>
<body  class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed ">
    <div class="wrapper">
        <div id="app">
            <admin-home></admin-home>
        </div>
    </div>

</body>

<script src="{{ asset('js/app.js') }}"></script>

</html>
