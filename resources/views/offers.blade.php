@include('navbar')

<h1>All offers</h1>
<form action="/offers/search" method="get">
    @csrf
    Pretrazi ponude po destinaciji:<input type="text" name="destinacija" value="{{ request()->input('destinacija') }}">
    Datum polaska od:<input type="date" name="polazak" value="{{ request()->input('polazak') }}">
    Datum povratka do :<input type="date" name="povratak" value="{{ request()->input('povratak') }}">
    <button type="submit">Pretrazi</button>
</form>
@foreach ($offers as $offer)
    <div>
        <h4>{{$offer['destinacija']}}</h4>
        <img src="{{ Storage::url('images/' . $offer['photo']) }}" alt="Opis slike" width="100px" height="100px">
       <p>Datum polaska: {{$offer['datum_polaska']}}</p>
        <p>Datum povratka: {{$offer['datum_povratka']}}</p>
        <p>Cena: {{$offer['cena']}} €</p>
        <a href="/reserve/{{$offer['id']}}">Vise</a>
        </form>
    </div>
@endforeach