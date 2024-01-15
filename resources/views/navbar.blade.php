<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/img/favico.png">
    <link rel="stylesheet" href="/css/navbar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Turisticka agencija</title>
</head>
<body>
<div class="navcontainer1">
    <nav class="nav1">
        <a class="nav-option1 option1" href="/">Home </a>
        <a class="nav-option1 option2" href="/offers">Ponude</a>
        <a class="nav-option1 option5" href="/gallery">Galerija</a>
        
        @auth
            <a class="nav-option1 option3" href="/myReservations">Moje rezervacije</a>
        
            @if(Auth::user()->is_admin)
                <a class="nav-option1 option4" href="/create-offer">Oglasi ponudu</a>
                <a class="nav-option1 option6" href="/admin">Admin panel</a>
            @endif
        @endauth

        @auth
            <a class="nav-option1 option7" href="/logout">Logout</a>
        @else
            <a class="nav-option1 option8" href="/login">Login</a>
        @endauth
    </nav>
</div>

@if(session('success'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

</body>

</html>
