<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Contact Us</title>
    <link href="/css/admin/photos.css" rel="stylesheet">
    
</head>

<body>
@include('adminnavbar')
<main>
<h1>Upravljanje Contact us </h1>
@if($contacts->isEmpty())
    <p>Nema neodgovorenih pitanja</p>
@else
<div class="container mt-5">
    <div class="row">
        @foreach($contacts as $contact)
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Ime: {{ $contact['name'] }}</h5>
                        <p class="card-text">Email: {{ $contact['email'] }}</p>
                        <p class="card-text">Poruka: {{ $contact['message'] }}</p>
                        <a href="/admin/reply/{{$contact['id']}}" class = 'btn btn-primary'>Odgovori</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endif
</main>
</body>

</html>
