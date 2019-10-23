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
    <div class="container">
        <form class="col-md-6" method="POST" action="/">
            {{csrf_field()}}
            <div class="form-group">
                <label for="name">Your name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter your name">
            </div>
            <div class="form-group">
                <label for="color">Enter background color name</label>
                <input type="text" class="form-control" name="bgColor" placeholder="Enter background color">
            </div>
            <div class="form-group">
                <label for="shapeColor">Color for your shapes</label>
                <input type="text" class="form-control" name="shapeColor" placeholder="Enter Color for your shapes">
            </div>
            <div>
            <button type="submit" class="btn btn-primary mb-2">Change the colors</button>
            </div>
        </form>
        
        <p><a href="/page2">Go to page2</a></p>
        <p><a href="/page3">Go to page 3</a></p>
        <p><a href="/exit">Exit</a></p>
    </div>
</body>

</html>