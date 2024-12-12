<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @yield('style')
</head>

<body>
    <h1>@yield('header', 'Header')</h1>
    <hr><br>
    @yield('content')
    @yield('script')
</body>
</html>
