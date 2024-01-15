@include('navbar')
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="/css/offersprva.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    
</head> 

<link rel="stylesheet" href="/css/offersprva.css">
<body style="background-image: url('/img/1.jpg'); background-size: cover; background-repeat: no-repeat; background-attachment: fixed;">
<div class="h1-title">    
<h1 style="text-align:center; color:white;"><span class="glowing-text">SVE PONUDE NA JEDNOM MESTU</span></h1>
</div> 
<div class="container-fluid">
        <div>
            <div class="form-container" style="display: block;">
                <form action="/offers/search" method="get" class="mb-4">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="destinacija" style="color: white; ">Pretraži ponude po destinaciji:</label>
                            <input type="text" class="form-control" id="destinacija" name="destinacija" value="{{ request()->input('destinacija') }}">
                        </div>
                        <div class="col-md-8 mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="polazak" style="color: white; ">Datum polaska:</label>
                                    <input type="date" class="form-control" id="polazak" name="polazak" value="{{ request()->input('polazak') }}" min="{{ now()->format('Y-m-d') }}" max="{{ now()->addYears(4)->format('Y-m-d') }}">
                                </div>
                                <div class="col">
                                    <label for="povratak" style="color: white; ">Datum povratka:</label>
                                    <input type="date" class="form-control" id="povratak" name="povratak" value="{{ request()->input('povratak') }}" min="{{ now()->format('Y-m-d') }}" max="{{ now()->addYears(4)->format('Y-m-d') }}">
                                </div>
                                <div class="col">
                                    <label for="sort" style="color: white; ">Sortiraj po:</label>
                                        <select class="form-control" id="sort" name="sort">
                                            <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Najnovije</option>
                                            <option value="priceAsc" {{ request('sort') == 'priceAsc' ? 'selected' : '' }}>Cena - rastuće</option>
                                            <option value="priceDesc" {{ request('sort') == 'priceDesc' ? 'selected' : '' }}>Cena - opadajuće</option>
                                            <option value="dateAsc" {{ request('sort') == 'dateAsc' ? 'selected' : '' }}>Datum - rastuće</option>
                                            <option value="dateDesc" {{ request('sort') == 'dateDesc' ? 'selected' : '' }}>Datum - opadajuće</option>
                                        </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="button5">Pretražite</button>
                    </div>
                </form>
            </div>
            <div class="cards-container">
            <div id="particle-background"></div>
            <div class="row" >
                @foreach ($offers as $offer)
                    <div class="col-md-4 custom-card mb-0">
                        <div class="card h-100">
                            <div class="card-image-container">
                                <img src="{{ Storage::url('images/' . $offer['photo']) }}" class="card-img">
                            </div>
                            <div class="card-text-container">
                                <div class="card-text-top">
                                    <h4 class="card-title">{{$offer['destinacija']}}</h4>
                                </div>
                                <div class="card-text-bottom">
                                    <div>
                                        <p>Datum polaska:</p>
                                        <p>{{$offer['datum_polaska']}}</p>
                                    </div>
                                <div>
                                    <p>Datum povratka:</p>
                                    <p>{{$offer['datum_povratka']}}</p>
                                </div>
                                    <p class="card-text">Cena: {{$offer['cena']}} €</p>
                                    <a href="/reserve/{{$offer['id']}}" class="buttonn">Više informacija</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            </div>
        </div>
    </div>
</body>
@include('footer')
<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
<script src="/js/offers.js"></script>
<script src="/js/date.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
