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
  <script>
    function proveriFormu() {
      var form = document.getElementById("reservationForm");
      var userName = form.elements["user_name"].value;
      var email = form.elements["email"].value;
      var phoneNumber = form.elements["broj_telefona"].value;
      var numberOfPeople = form.elements["broj_osoba"].value;
      var note = form.elements["napomena"].value;

      
      if (userName.trim() === "") {
        prikaziGresku("*Unesite korisničko ime!");
        return false;
      }
      var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailRegex.test(email)) {
        prikaziGresku("*Unesite validnu e-mail adresu!");
        return false;
      }
      var phoneNumberRegex = /^\+381\s6\d\s\d{2}\s\d{2}\s\d{2}$|^\+381\s6\d\s\d{2}\s\d{2}\s\d{3}$/;
      if (!phoneNumberRegex.test(phoneNumber)) {
          prikaziGresku("*Unesite validan broj telefona u formatu +381 6x xx xx xx ili +381 6x xx xx xxx!");
          return false;
      }

      if (isNaN(numberOfPeople) || numberOfPeople <= 0) {
        prikaziGresku("*Unesite validan broj osoba!");
        return false;
      }
      return true;
    }

    function prikaziGresku(message) {
      var errorMessage = document.getElementById("error-message");
      errorMessage.innerHTML = message;
      errorMessage.style.display = "block";
    }
  </script>
</head>
<body>

    @include('navbar')
    
    <div class="container">
    <div class="flip-card1">
        <div class="flip-card1-inner">
            <div class="flip-card1-front">
                <h4 class="title">{{$offer['destinacija']}}</h4>
                <img src="{{ Storage::url('images/' . $offer['photo']) }}" alt="Offer Image" class="offer-img">
            </div>
            <div class="flip-card1-back">
                <p class="description">{{$offer['opis']}}</p>
                <p>Datum polaska: {{$offer['datum_polaska']}}</p>
                <p>Datum povratka: {{$offer['datum_povratka']}}</p>
                <p>Preostali broj slobodnih mesta: {{$offer['broj_mesta']}}</p>
                <p class="price">Cena: {{$offer['cena']}}€</p>
            </div>
        </div>
    </div>


    <div class="reservation-form">
    <form id="reservationForm" action="/reserve/{{$offer['id']}}" method="post" onsubmit="return proveriFormu()">
      @csrf
      <h1>Rezervisi putovanje - <b>{{$offer['destinacija']}}</b></h1>
      <input class="input" type="text" name="user_name" placeholder="Korisničko ime" ><br><br>
      <input class="input" type="email" name="email" placeholder="Email " ><br><br>
      <input class="input" type="tel" name="broj_telefona" placeholder="Broj telefona +381 6x xx xx xxx" size="13" ><br><br>
      <input class="input" type="number" name="broj_osoba" placeholder="Broj osoba" min="1" max="{{$offer['broj_mesta']}}"><br><br>
      <input class="input" type="text" name="napomena" placeholder="Napomena" ><br><br>
      <button type="submit" class="button" id="reserveButton"><span>Rezerviši putovanje</span></button>
      <div id="error-message" class="error-message"></div>
    </form>
  </div>
    </div>
<section class="middle"> 
   <h1> Pogledajte i ostale destinacije koje ljudi takodje pretražuju <h1>
    
</section> 
<div class="offers-container">
        @foreach ($moreOffers as $mOffer)
            <div class="offers">
                <div class="card1">
                    <div class="card1-img">
                    <img src="{{ Storage::url('images/' . $mOffer['photo']) }}" class="card1-img-top" >
                        </div>
                    <div class="card1-body">
                        <h4 class="card1-title">{{$mOffer['destinacija']}}</h4>
                        <p class="card1-text">Datum polaska: {{$mOffer['datum_polaska']}}</p>
                        <p class="card1-text">Datum povratka: {{$mOffer['datum_povratka']}}</p>
                        <p class="card1-text1">Cena: {{$mOffer['cena']}} €</p>
                        <a href="/reserve/{{$mOffer['id']}}" class="button1">Vise informacija</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>
