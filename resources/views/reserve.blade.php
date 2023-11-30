<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> {{$offer['destinacija']}} - Putovanje</title>
    <link rel="stylesheet" type="text/css" href="/css/offer.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">

</head>
<body>

    @include('navbar')

    <div class="container">
        <div class="offer-details">
            <h4>{{$offer['destinacija']}}</h4>
            <img src="{{ Storage::url('images/' . $offer['photo']) }}" alt="Offer Image" class="offer-img">
            <p>{{$offer['opis']}}</p>
            <p>Datum polaska: {{$offer['datum_polaska']}}</p>
            <p>Datum povratka: {{$offer['datum_povratka']}}</p>
            <p>Preostali broj slobodnih mesta: {{$offer['broj_mesta']}}</p>
            <p>Cena: {{$offer['cena']}}</p>
        </div>

        <div class="reservation-form">
            <form action="/reserve/{{$offer['id']}}" method="post">
                @csrf
                <h1>Rezervisi putovanje -<b> {{$offer['destinacija']}}</b></h1>
                <input class="input" type="text" name="user_name" placeholder="Korisničko ime"><br><br>
                <input class="input" type="email" name="email" placeholder="Email"><br><br>
                <input class="input" type="number" name="broj_telefona" placeholder="Broj teledona"><br><br>
                <input class="input" type="number" name="broj_osoba" placeholder="Broj osoba"><br><br>
                <input class="input" type="text" name="napomena" placeholder="Napomena"><br><br>
                <button type="submit" class="button"><span>Rezerviši putovanje</span></button>
        
            </form>
        </div>
    </div>

</body>
</html>
