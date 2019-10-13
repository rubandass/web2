<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="stylesheet" href="/css/mystyle.css">
    
    <title>@yield('title','Lab2 example')</title>
</head>

<body>
    <nav class="navigation">
        <a class="@yield('lab2_class')" href="/">Lab2</a>
        <a class="@yield('lab2-1_class')" href="/lab2-1">Lab2-1</a>
        <a class="@yield('lab2-2_class')" href="/lab2-2">Lab2-2</a>
        <a class="@yield('checkpoint2_class')" href="/checkpoint2">Checkpoint2</a>
        <a class="@yield('bladeex_class')" href="/bladeex">Bladeex</a>
        
    </nav>
    <div class="container">
        @yield('content')
    </div>

</body>

</html>