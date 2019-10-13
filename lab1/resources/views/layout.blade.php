<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="stylesheet" href="/css/mystyle.css">
    
    <title>@yield('title','Lab1 example')</title>
</head>

<body>
    <nav class="navigation">
        <a class="@yield('home_class')" href="/">Home</a>
        <a class="@yield('timetable_class')" href="/timetable">Timetable</a>
        <a class="@yield('photos_class')" href="/photos">Photos</a>
        <a class="@yield('lab4_class')" href="/lab4">Lab4</a>
        <a class="@yield('lab4-2_class')" href="/lab4-2">Lab4-2</a>
        <a class="@yield('lab4-3_class')" href="/lab4-3">Lab4-3</a>
    </nav>
    <div class="container">
        @yield('content')
    </div>

</body>

</html>