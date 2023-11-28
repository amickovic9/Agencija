@include('navbar')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
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
<html lang="en">