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

        .circle {
        width: 100px;
        height: 100px;
        background: {{session('shapeColor','white')}};
        border: 3px solid;
        border-radius: 50%;
        }
    </style>
</head>

<body>
    <br>
    <br>
    <br>
    <br>
    <div class="container">
        <h5>Hello '{{session('name')}}'</h5>
        <p>Is the background-color still changed?</p>

        <div class="circle"></div>

        <p><a href="/">Go back to page1</a></p>
        <p><a href="/page2">Go to page 2</a></p>
        <p><a href="/exit">Exit</a></p>
    </div>
</body>

</html>