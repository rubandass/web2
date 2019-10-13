<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="tabbable">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active show" href="#tab1" data-toggle="tab">All dogs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tab2" data-toggle="tab">Labrador Retrievers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tab3" data-toggle="tab">All Breeds</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tab4" data-toggle="tab">Retriever Dogs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tab5" data-toggle="tab">Dogs before 2010</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tab6" data-toggle="tab">Not Retrievers</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Name</th>
                                    <th>Birthday</th>
                                    <th>Breed</th>
                                </tr>
                                @foreach($dogsList as $dog)
                                <tr>
                                    <td>{{$dog->name}}</td>
                                    <td>{{$dog->date_of_birth}}</td>
                                    <td>{{$dog->breed->name}}</td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                        <div class="tab-pane" id="tab2">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Name</th>
                                    <th>Birthday</th>
                                    <th>Breed</th>
                                </tr>
                                @foreach($resultDogs as $dog)
                                <tr>
                                    <td>{{$dog->name}}</td>
                                    <td>{{$dog->date_of_birth}}</td>
                                    <td>{{$dog->breed->name}}</td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                        <div class="tab-pane" id="tab3">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Breed Name</th>

                                </tr>
                                @foreach($breedNames as $breed)
                                <tr>
                                    <td>{{$breed}}</td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                        <div class="tab-pane" id="tab4">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Name</th>
                                    <th>Birthday</th>
                                    <th>Breed</th>
                                </tr>
                                @foreach($retrieverBreed as $breed)
                                @foreach($breed->dogs as $dog)
                                <tr>
                                    <td>{{$dog->name}}</td>
                                    <td>{{$dog->date_of_birth}}</td>
                                    <td>{{$breed->name}}</td>
                                </tr>
                                @endforeach
                                @endforeach
                            </table>
                        </div>
                        <div class="tab-pane" id="tab5">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Name</th>
                                    <th>Birthday</th>
                                    <th>Breed</th>
                                </tr>
                                @foreach($dogsbefore2010 as $dog)
                                <tr>
                                    <td>{{$dog->name}}</td>
                                    <td>{{$dog->date_of_birth}}</td>
                                    <td>{{$dog->breed->name}}</td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                        <div class="tab-pane" id="tab6">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Name</th>
                                    <th>Birthday</th>
                                    <th>Breed</th>
                                </tr>
                                @foreach($notRetrievers as $breed)
                                @foreach($breed->dogs as $dog)
                                <tr>
                                    <td>{{$dog->name}}</td>
                                    <td>{{$dog->date_of_birth}}</td>
                                    <td>{{$breed->name}}</td>
                                </tr>
                                @endforeach
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>