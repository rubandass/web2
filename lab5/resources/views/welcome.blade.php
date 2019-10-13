<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Contacts</title>
    <style>
    .table{
        margin: auto;
        margin-top: 20px;
    }
    </style>
</head>
<body>

    <table class="table table-bordered col-md-10">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Phone</th>
        </tr>
        @foreach($people as $person)
            <tr>
                <td>{{$person->id}}</td>
                <td>{{$person->firstName}}</td>
                <td>{{$person->lastName}}</td>
                <td>{{$person->phone}}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>