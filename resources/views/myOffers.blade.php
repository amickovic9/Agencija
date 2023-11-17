@include('navbar')
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
        <form action="/delete-offer/{{$offer->id}}" method = "post">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>
@endforeach