@include('navbar')
<form action="/my-offers/search" method="get">
    @csrf
    Pretrazi ponude po destinaciji:<input type="text" name="destinacija" value="{{ request()->input('destinacija') }}">
    Datum polaska od:<input type="date" name="polazak" value="{{ request()->input('polazak') }}">
    Datum povratka do :<input type="date" name="povratak" value="{{ request()->input('povratak') }}">
    <button type="submit">Pretrazi</button>
</form>
 @foreach ($offers as $offer)
    <div>
        <h4>{{$offer['destinacija']}}</h4>
        <img src="{{ Storage::url('images/' . $offer['photo']) }}" alt="Opis slike" width="300px" height="300px">

        <p>{{$offer['opis']}}</p>
        <p>Datum polaska: {{$offer['datum_polaska']}}</p>
        <p>Datum povratka: {{$offer['datum_povratka']}}</p>
        <p>Broj mesta: {{$offer['broj_mesta']}}</p>
        <p>Cena: {{$offer['cena']}}</p>
        <p><a href="/edit-offer/{{$offer->id}}">Izmeni</a></p>
        <p><a href="/reservations/{{$offer->id}}">Vidi rezervacije</a></p>
        <form action="/delete-offer/{{$offer->id}}" method = "post">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>
@endforeach