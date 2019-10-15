<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Document</title>
    body{
        background-color:{{session('bgColor','white')}};
    }
</head>

<body>
    <br>
    <br>
    <div class="container">
        <form class="col-md-6" method="POST" action="/">
            {{csrf_field()}}
            <div class="form-group">
                <label for="name">Your name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter your name">
            </div>
            <div class="form-group">
                <label for="color">Enter background color name</label>
                <input type="text" class="form-control" id="color" placeholder="Enter background color">
            </div>
            <div class="form-group">
                <label for="shapeColor">Color for your shapes</label>
                <input type="text" class="form-control" id="shapeColor" placeholder="Enter Color for your shapes">
            </div>
            <div>
            <button type="submit" class="btn btn-primary mb-2">Change the colors</button>
            </div>
        </form>

        <a href="/data"></a>
    </div>
</body>

</html>