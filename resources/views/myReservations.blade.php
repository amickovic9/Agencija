
<head> 
    <title> Moje rezervacije </title> 
    <link rel="stylesheet" type="text/css" href="/css/myres.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
</head>
<body>
@include('navbar')
<h1 class="naslov">Moje rezervacije</h1>
<div class="container">
    
    @foreach ($reservations as $reservation)
        <div class="reservations">
            <div class="card-body">
                <h5 class="card-title"><b>Rezervacija za ponudu:</b><a href="/reserve/{{$reservation['offer_id']}}" class="details-btn">Detalji rezervacije</a></h5>
                <p class="card-text"><b>Ime:</b> {{$reservation['user_name']}}</p>
                <p class="card-text"><b>Email:</b> {{$reservation['email']}}</p>
                <p class="card-text"><b>Broj telefona:</b> {{$reservation['broj_telefona']}}</p>
                <p class="card-text"><b>Broj osoba:</b> {{$reservation['broj_osoba']}}</p>
                <p class="card-text"><b>Napomena:</b> {{$reservation['napomena']}}</p>
                <form action="delete-reservation/{{$reservation['id']}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-delete">Otkaži rezervaciju</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
</body>