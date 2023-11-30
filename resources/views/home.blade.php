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
    <input type="date" class="form-control" id="polazak" name="polazak" value="{{ request()->input('polazak') }}" min="{{ now()->format('Y-m-d') }}" max="{{ now()->addYears(4)->format('Y-m-d') }}">
</div>
<div>
    <label for="povratak">Povratak:</label>
    <input type="date" class="form-control" id="povratak" name="povratak" value="{{ request()->input('povratak') }}" min="{{ now()->format('Y-m-d') }}" max="{{ now()->addYears(4)->format('Y-m-d') }}">
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
      <div class="benefits">
      
        
          <div class="benefits-icon">
          <img src="/img/route-solid.svg" alt=""></div>
        
        
          <div class="benefits-icon">
          <img src="/img/bed-solid.svg" alt=""></div>
    
            <div class="benefits-icon">
            <img src="/img/plane-departure-solid.svg" alt=""></div>
            <div class="benefits-icon">
            <img src="/img/food-solid.svg" alt=""></div>
        
       </div>
      
    </section>
    <section class="card-section">
      <h1> Korisnici najviše pretražuju</h1> 
      <h3> Preporučujemo neodoljive destinacije koje oduzimaju dah i zadovoljavaju različite interese. </h3>
  <div class="container">
  @foreach($offers as $index => $offer)
<div class="card">
  <div class="card-img">
<img src="{{ Storage::url('images/' . $offer['photo']) }}" class="card-img-top" >
  </div>
<div class="card-details">
    <p class="text-title">{{$offer->destinacija}}</p>
    <p class="text-body">Datum polaska: {{ $offer->datum_polaska }}</p>
    <p class="text-body">Datum povratka: {{ $offer->datum_povratka }}</p>
    <p class="text-body">Cena: {{ $offer->cena }}€</p>
                       
  </div>
  <a href="/reserve/{{$offer['id']}}" class="card-button">Više informacija</a>
    
</div>
@endforeach
        </div>
  </section>
  <section class="gallery-section">
      
      <h1>Ovde delimo trenutke sa putovanja naših zadovoljnih putnika.</h1>
      <h3> Naša misija je stvaranje nezaboravnih iskustava, a ove slike su samo mali uvid u bogatstvo destinacija koje možete istražiti sa nama. Bez obzira da li se radi o impresivnim pejzažima, kulturnim blagom ili uzbudljivim avanturama, svaka destinacija nosi svoju jedinstvenu priču.</h3>
    
      <a href="/gallery" class="gallery-btn">
  <span class="circle" aria-hidden="true">
  <span class="icon arrow"></span>
  </span>
  <span class="button-text">Galerija</span>
  </a>
  </section> 

<section class="comment-section">
<div class="leave-comment">
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
      <button type="submit" class="comm-btn">
        <span>Pošalji komentar</span></button>
    </form>
  </div>
  </div>

  <div class="user-comments">
      
            @foreach ($comments as $komentar)
                <div class="comment shadow">
                    <h6 class="">{{$ime[$komentar['id']]}}</h6>
                    <div class="comment-info">
                        <p class="">
                            {{$komentar['created_at']}}
                        </p>
                    </div>
                    <p class="">
                        {{$komentar['komentar']}}
                    </p>
                    <div class="rating">
                        @for ($i = 1; $i <= $komentar['ocena']; $i++)
                            &#9733;
                        @endfor
                    </div>
                    @auth
                        @if(Auth::user()->is_admin)
                            <a href="/admin/izbrisi-komentar/{{$komentar['id']}}">Izbrisi</a>
                        @endif
                    @endauth
                    
                </div>
            @endforeach
    </div>


</section>
<section class="contact-text"> 
<body>
      <div class="scroller">
        <span class="h1">
          Pozovite<br/>
          Pišite<br/>
          Posetite nas<br/>
        </span>
      </div>
</body>
  <h3> Vaše pitanje, sugestija ili pohvala su nam od velike važnosti. Slobodno nas kontaktirajte putem donje kontakt forme. Takodje možete da nas posetite u našoj kancelariji.
  </section> 


<section class="contact-section">
  <div class="google-map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2869.1178398867464!2d20.90285717493987!3d44.018959328699786!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4757213a3f69a34f%3A0x9acc30ed949db9b7!2z0KTQsNC60YPQu9GC0LXRgiDQuNC90LbQtdGa0LXRgNGB0LrQuNGFINC90LDRg9C60LAg0KPQvdC40LLQtdGA0LfQuNGC0LXRgtCwINGDINCa0YDQsNCz0YPRmNC10LLRhtGD!5e0!3m2!1ssr!2srs!4v1701358880064!5m2!1ssr!2srs" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" width="600" height="450"></iframe>
    </div>
    <div class="contact-container">
        <form action="/contact-us" method="post">
            @csrf
            <h1>Kontakt</h1>
            <div class="form-group">
                <label for="name">Ime:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="message">Poruka:</label>
                <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
            </div>
            <button type="submit" class=""><span>Pošalji poruku</span></button>
        </form>
    </div>
    
</section>

<script src="/js/date.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
    
<!DOCTYPE html>
<html lang="en">
