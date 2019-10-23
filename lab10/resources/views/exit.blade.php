<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Document</title>
    <style>
        body{
            background-color:{{session('bgColor','white')}};
        }
    </style>
</head>

<body>
    <br>
    <br>
    <br>
    <br>
    <div class="container">
        <h5>Good bye</h5>
        <p>Session destroyed</p>

        <p><a href="/">Go to page1</a></p>
        <p><a href="/page2">Go to page 2</a></p>
        <p><a href="/page3">Go to page 3</a></p>
    </div>
</body>

</html>