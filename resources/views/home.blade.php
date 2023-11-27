@include('navbar')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pocetna</title>
</head>
<body>
    <form action="/offers/search" method="get" class="mb-4">
        @csrf
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="destinacija">Pretraži ponude po destinaciji:</label>
                <input type="text" class="form-control" id="destinacija" name="destinacija" value="{{ request()->input('destinacija') }}">
            </div>
            <div class="col-md-4 mb-3">
                <label for="polazak">Datum polaska od:</label>
                <input type="date" class="form-control" id="polazak" name="polazak" value="{{ request()->input('polazak') }}">
            </div>
            <div class="col-md-4 mb-3">
                <label for="povratak">Datum povratka do:</label>
                <input type="date" class="form-control" id="povratak" name="povratak" value="{{ request()->input('povratak') }}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Pretraži</button>
    </form>
    <!-- home.blade.php -->

<!-- Ovo je samo primer kako bi moglo izgledati, zameni sa tvojom stvarnom strukturom -->

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


</body>
</html>
    

<!DOCTYPE html>
<html lang="en">
