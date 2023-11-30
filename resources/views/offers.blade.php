@include('navbar')

<div class="container mt-5">
    <h1>All offers</h1>
    <form action="/offers/search" method="get" class="mb-4">
        @csrf
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="destinacija">Pretraži ponude po destinaciji:</label>
                <input type="text" class="form-control" id="destinacija" name="destinacija" value="{{ request()->input('destinacija') }}">
            </div>
            <div>    
                <label for="polazak">Datum polaska:</label>
                <input type="date" class="form-control" id="polazak" name="polazak" value="{{ request()->input('polazak') }}" min="{{ now()->format('Y-m-d') }}" max="{{ now()->addYears(4)->format('Y-m-d') }}">
            </div>
            <div>
                <label for="povratak">Datum povratka:</label>
                <input type="date" class="form-control" id="povratak" name="povratak" value="{{ request()->input('povratak') }}" min="{{ now()->format('Y-m-d') }}" max="{{ now()->addYears(4)->format('Y-m-d') }}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Pretraži</button>
    </form>

    <div class="row row-cols-1 row-cols-md-3">
        @foreach ($offers as $offer)
            <div class="col mb-4">
                <div class="card h-100">
                    <img src="{{ Storage::url('images/' . $offer['photo']) }}" class="card-img-top" >
                    <div class="card-body">
                        <h4 class="card-title">{{$offer['destinacija']}}</h4>
                        <p class="card-text">Datum polaska: {{$offer['datum_polaska']}}</p>
                        <p class="card-text">Datum povratka: {{$offer['datum_povratka']}}</p>
                        <p class="card-text">Cena: {{$offer['cena']}} €</p>
                        <a href="/reserve/{{$offer['id']}}" class="btn btn-primary">Više</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<script src="/js/date.js"></script>
