<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Document</title>
    <style>
        body
        {
            background-color: {{session('bgColor','white')}};
        }

        .triangle-up {
            width: 0;
            height: 0;
            border-left: 50px solid transparent;
            border-right: 50px solid transparent;
            border-bottom: 100px solid {{session('shapeColor','')}};
        }
    </style>
</head>

<body>
    <br>
    <br>
    <div class="container">
        <h5>Hello '{{session('name')}}'</h5>
        <p>Is the background-color still changed?</p>

        <div class="triangle-up"></div>

        <p><a href="/">Go back to page1</a></p>
        <p><a href="/page3">Go to page 3</a></p>
        <p><a href="/exit">Exit</a></p>
    </div>
</body>

</html>