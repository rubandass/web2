<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="stylesheet" href="/css/mystyle.css">
    
    <title>@yield('title','Lab7 example')</title>
</head>

<body>
    <nav class="navigation">
        <a class="@yield('fruit_class')" href="/fruit">Fruit</a>
        <a class="@yield('olympics_class')" href="/">Olympics</a>
        <a class="@yield('fruit2_class')" href="/fruit2">Fruit2</a>
    </nav>
    <div class="container">
        @yield('content')
    </div>

</body>

</html>