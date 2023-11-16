@include('navbar')

<h1>Edit post</h1>
<form action="/edit-offer/{{$offer->id}}" method="post">
    @csrf
    @method('put')
    <input type="text" name = 'destinacija' value="{{$offer->destinacija}}"><br>
    <textarea  name='opis' >{{$offer->opis}}</textarea><br>
    <input type="date" name = 'datum_polaska' value="{{$offer->datum_polaska}}"><br>
    <input type="date" name = 'datum_povratka' value="{{$offer->datum_povratka}}"><br>
    <input type="number" name = 'broj_mesta' value="{{$offer->broj_mesta}}"><br>
    <input type="number" name = 'cena' value="{{$offer->cena}}"><br>
    <button type="submit">Azuriraj</button>

</form>