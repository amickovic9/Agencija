@include('navbar')

<h1>All offers</h1>
@foreach ($offers as $offer)
    <div>
        <h4>{{$offer['destinacija']}}</h4>
        <img src="{{ Storage::url('images/' . $offer['photo']) }}" alt="Opis slike" width="100px" height="100px">
       <p>Datum polaska: {{$offer['datum_polaska']}}</p>
        <p>Datum povratka: {{$offer['datum_povratka']}}</p>
        <p>Cena: {{$offer['cena']}}</p>
        <a href="reserve/{{$offer['id']}}">Vise</a>
        </form>
    </div>
@endforeach