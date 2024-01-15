@include('adminnavbar');
<head>
<link rel="stylesheet" href="/css/admin/editoffers.css">

</head>

<main>
<form action="/admin/edit-offer/{{$offer->id}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <input type="text" name = 'destinacija' value="{{$offer->destinacija}}"><br>
    <textarea  name='opis' >{{$offer->opis}}</textarea><br>
    <input type="file" name="photo">       
    <br>
    <br>
    <input type="date" name = 'datum_polaska' value="{{$offer->datum_polaska}}"><br>
    <input type="date" name = 'datum_povratka' value="{{$offer->datum_povratka}}"><br>
    <input type="number" name = 'broj_mesta' value="{{$offer->broj_mesta}}"><br>
    <input type="number" name = 'cena' value="{{$offer->cena}}"><br>
    <button type="submit">Azuriraj</button>
</main>

</form>