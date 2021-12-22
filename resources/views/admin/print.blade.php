<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title', config('app.name'))</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    {{--     
    @if (! config('app.debug', true))
        <link rel="stylesheet" href="/css/admin-all.css">
    @else
        <!-- Vendors -->
        <link rel="stylesheet" href="/css/admin-vendor.css">
        <link rel="stylesheet" href="/css/admin-custom.css">
    @endif --}}
    <link rel="stylesheet" href="/css/admin-vendor.css">

    <style>
        body{background-color: #fff;}
        table, th, td ,tr{
  border: 1px solid black;
  border-collapse: collapse;
}
    </style>

    @yield('css')

</head>

<body>
    <div class="container">
        @yield('content')
    </div>

    @if (! config('app.debug', true))
        <script src="/js/admin-all.js"></script>
    @else
        <!-- Vendors -->
        <script src="/js/admin-vendor.js"></script>
        <script src="/js/admin-custom.js"></script>
    @endif

    
    @yield('js')
    
    <script>
        window.print()
    </script>

</body>
</html>
