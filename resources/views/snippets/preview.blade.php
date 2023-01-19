<!DOCTYPE html>
<html>
<head>
    <title>Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div style="display: flex ; justify-items: center">
    <img src="{{ public_path('images/mkcb.png') }}" class=" px-10 max-w-full h-auto w-auto rounded-lg ">

</div>
<h1>{{ $title }}</h1>
<p>{{ $date }}</p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua.</p>

<table class="table table-bordered">
    <tr>
        <th>Name</th>
        <th>Title</th>
        <th>Signature</th>
        <th>Date</th>
    </tr>

        <tr>
            <td>{{ $user->firstname }} {{ $user->lastname}}</td>
            <td>{{ $user->role }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $date}}</td>
        </tr>

</table>
</body>
</html>
