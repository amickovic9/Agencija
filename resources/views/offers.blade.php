@include('navbar');

<h1>All offers</h1>
@foreach ($offers as $offer)
    <div>
        <h4>{{$offer['destinacija']}}</h4>
        <p>{{$offer['opis']}}</p>
        <p>Datum polaska: {{$offer['datum_polaska']}}</p>
        <p>Datum povratka: {{$offer['datum_povratka']}}</p>
        <p>Broj mesta: {{$offer['broj_mesta']}}</p>
        <p>Cena: {{$offer['cena']}}</p>
        <form action="reserve" method="post">
            <button type='submit'>Rezervisi</button>
        </form>
    </div>
@endforeach