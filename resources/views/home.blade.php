@include('navbar')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
<style>
    .rating {
      unicode-bidi: bidi-override;
      direction: rtl;
    }
    .rating > label {
      display: inline-block;
      padding: 5px;
      cursor: pointer;
    }
    .rating > input {
      display: none;
    }
    .rating > label:before {
      content: "\2605";
      font-size: 2em;
      color: grey;
    }
    .rating > label:hover:before,
    .rating > label:hover ~ label:before,
    .rating > input:checked ~ label:before {
      color: gold;
    }
  </style>
    <title>Pocetna</title>
</head>
<body>
    <section class="search-bar">
        <div class="text">
        <h1>
    <span class="prva-boja">Istraži svet sa nama,</span>
    <span class="druga-boja">Tvoja avantura počinje ovde!</span>
</h1>

        <h3>Vaše putovanje snova je na samo jedan klik daleko od vas! </h3>
</div>
        <form action="/offers/search" method="get" class="search-form">
        @csrf
        <div class="form-row">
            <div>   
                <label for="destinacija">Destinacija:</label>
                <input type="text" class="form-control" id="destinacija" name="destinacija" value="{{ request()->input('destinacija') }}">
</div>
<div>    
                <label for="polazak">Polazak:</label>
                <input type="date" class="form-control" id="polazak" name="polazak" value="{{ request()->input('polazak') }}">
</div>
<div>
                <label for="povratak">Povratak:</label>
                <input type="date" class="form-control" id="povratak" name="povratak" value="{{ request()->input('povratak') }}">
</div>  
<div class="button-container">
    <button type="submit" name="button" class="btn btn-outline-dark">Pretraži</button>  
</div>
</div>
        
    </form>
</section>

<section class="middle-section" id="ponuda">
    <h3> Šta nudimo? </h3> 
    <h1>Nudimo širok spektar putničkih usluga koje obuhvataju različite vrste prevoza, personalizovane opcije ishrane, autentične kulturne doživljaje i pažljivo odabrane smještajne opcije. Vaše putovanje, bez obzira na destinaciju, prilagođava se vašim željama, obezbeđujući nezaboravna iskustva i bezbrižnu avanturu. </h1>
      <div class="cards">
      
        
          <div class="card-icon">
          <img src="/img/route-solid.svg" alt=""></div>
        
        
          <div class="card-icon">
          <img src="/img/bed-solid.svg" alt=""></div>
    
            <div class="card-icon">
            <img src="/img/plane-departure-solid.svg" alt=""></div>
            <div class="card-icon">
            <img src="/img/food-solid.svg" alt=""></div>
        
       </div>
      
    </section>

<div class="container">
    <div class="row">
        @foreach($offers as $offer)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ Storage::url('images/' . $offer['photo']) }}" class="card-img-top" >


                    <div class="card-body">
                        <h1>{{$offer->destinacija}}</h1>

                        <p class="card-text">Datum polaska: {{ $offer->datum_polaska }}</p>
                        <p class="card-text">Datum povratka: {{ $offer->datum_povratka }}</p>
                        <p class="card-text">Cena: {{ $offer->cena }}€</p>
                        <a href="/reserve/{{$offer['id']}}" class="btn btn-primary">Više informacija</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="container mt-4">
    <h2>Oceni i ostavi komentar</h2>
    <form action="/oceni" method="post">
      @csrf
      <div class="form-group">
        <label for="rating" >Ocena:</label><br>
        <div class="rating" required>
          <input type="radio" id="star5" name="ocena" value="5">
          <label for="star5"></label>
          <input type="radio" id="star4" name="ocena" value="4">
          <label for="star4"></label>
          <input type="radio" id="star3" name="ocena" value="3">
          <label for="star3"></label>
          <input type="radio" id="star2" name="ocena" value="2">
          <label for="star2"></label>
          <input type="radio" id="star1" name="ocena" value="1">
          <label for="star1"></label>
        </div>
      </div>
      <div class="form-group">
        <label for="comment">Komentar:</label>
        <textarea class="form-control" id="comment" name="komentar" rows="4" required></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Pošalji</button>
    </form>
  </div>
<section style="background-color: #6c9ef5;">
  <div class="container my-5 py-5">
    <div class="row d-flex justify-content-center">
      <div class="col-md-12 col-lg-10">
        <div class="card text-dark">
          <div class="card-body p-4">
            <h4 class="mb-0">Skorašnji komentari</h4>
            <p class="fw-light mb-4 pb-2"></p>

            @foreach ($comments as $komentar)
              <div>
                <h6 class="fw-bold mb-1">{{$ime[$komentar['id']]}}</h6>
                <div class="d-flex align-items-center mb-3">
                  <p class="mb-0">
                    {{$komentar['created_at']}}
                  </p>
                </div>
                <p class="mb-0">
                  {{$komentar['komentar']}}
                </p>
                <div class="mt-2">
                  @for ($i = 1; $i <= $komentar['ocena']; $i++)
                    &#9733; 
                  @endfor
                </div>
                @auth
                @if(Auth::user()->is_admin)
                <a href="/admin/izbrisi-komentar/{{$komentar['id']}}">Izbrisi</a>
                @endif
              @endauth
                <hr style="width: 100%; margin-top: 1rem;">
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section>
    <form action="/contact-us" method="post" class="container">
        @csrf
        <h1>Contact us</h1>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="message">Message:</label>
            <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</section>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
    
<!DOCTYPE html>
<html lang="en">
