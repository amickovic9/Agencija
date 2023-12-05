@include('navbar')
<link rel="stylesheet" href="/css/offersprva.css">
<body style="background-image: url('/img/eeee.jpg'); background-size: cover; background-repeat: no-repeat; background-attachment: fixed;">
    <h1 style="text-align:center; color:#ffffff;"><span class="glowing-text">SVE PONUDE NA JEDNOM MESTU</span></h1>
    <div class="container-fluid mt-0 mb-0">
        <div>
            <div class="form-container" style="display: block;">
                <form action="/offers/search" method="get" class="mb-4">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="destinacija" style="color: #5A5A5A; font-weight: bold;">Pretraži ponude po destinaciji:</label>
                            <input type="text" class="form-control" id="destinacija" name="destinacija" value="{{ request()->input('destinacija') }}">
                        </div>
                        <div class="col-md-8 mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="polazak" style="color: #5A5A5A; font-weight: bold;">Datum polaska:</label>
                                    <input type="date" class="form-control" id="polazak" name="polazak" value="{{ request()->input('polazak') }}" min="{{ now()->format('Y-m-d') }}" max="{{ now()->addYears(4)->format('Y-m-d') }}">
                                </div>
                                <div class="col">
                                    <label for="povratak" style="color: #5A5A5A; font-weight: bold;">Datum povratka:</label>
                                    <input type="date" class="form-control" id="povratak" name="povratak" value="{{ request()->input('povratak') }}" min="{{ now()->format('Y-m-d') }}" max="{{ now()->addYears(4)->format('Y-m-d') }}">
                                </div>
                                <div class="col">
                                    <label for="sort" style="color: #5A5A5A; font-weight: bold;">Sortiraj po:</label>
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
                        <button type="submit" class="btn btn-outline-dark">Pretražite</button>
                    </div>
                </form>
            </div>
            <div class="cards-container">
                <div id="particle-background"></div>
                <div class="row" >
                    @foreach ($offers as $offer)
                        <div class="col custom-card mb-0" >
                            <div class="card h-100">
                                <img src="{{ Storage::url('images/' . $offer['photo']) }}" class="card-img-top" >
                                <div class="card-body">
                                    <h4 class="card-title">{{$offer['destinacija']}}</h4>
                                    <p class="card-text">Datum polaska: {{$offer['datum_polaska']}}</p>
                                    <p class="card-text">Datum povratka: {{$offer['datum_povratka']}}</p>
                                    <p class="card-text">Cena: {{$offer['cena']}} €</p>
                                    <a href="/reserve/{{$offer['id']}}" class="btn btn-outline-dark">Više</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
<script src="/js/offers.js"></script>
<script src="/js/date.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>