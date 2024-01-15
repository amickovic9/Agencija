<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/img/favico.png">
    <link rel="stylesheet" href="/css/navbar.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Turisticka agencija</title>
</head>
<body>
<div class="navcontainer1">
<nav class="nav1">
        
                <a class="nav-option1 option1" href="/">Home <span class="sr-only">(current)</span></a>
            
            
                <a class="nav-option1 option2" href="/offers">Ponude</a>
            
            
            @auth
            
                <a class="nav-option1 option3" href="/myReservations">Moje rezervacije</a>
            
            @if(Auth::user()->is_admin)
            
                <a class="nav-option1 option4" href="/create-offer">Oglasi ponudu</a>
            
                <a class="nav-option1 option5" href="/admin">Admin panel</a>
            
            @endif
            @endauth
            
                <a class="nav-option1 option6" href="/gallery">Galerija</a>
            @auth
            
                <a class="nav-option1 option7" href="/logout">Logout</a>
            
            @else
            
                <a class="nav-option1 option8" href="/login">Login</a>
            @endauth
            
                <a class="nav-option1 option9" href="/about">O nama</a>
        
    
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
