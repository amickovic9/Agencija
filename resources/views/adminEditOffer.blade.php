@include('adminnavbar');
<head>
<link rel="stylesheet" href="/css/admin/edit.css">

</head>

<main>
<form action="/admin/edit-offer/{{$offer->id}}" method="post" enctype="multipart/form-data" class="form-wrapper">
    @csrf
    @method('put')
    <div class="form-group">
    <input type="text" name = 'destinacija'  class="form-control"  value="{{$offer->destinacija}}">
    </div>
    <div class="form-group">
    <textarea  name='opis'  class="form-control"  >{{$offer->opis}}</textarea><br>
    </div>
    <div class="form-group">
    <input type="file" name="photo"  class="form-control" >       
    </div>
    <div class="form-group">
    <input type="date" name = 'datum_polaska'  class="form-control" value="{{$offer->datum_polaska}}"><br>
    </div>
    <div class="form-group">
    <input type="date" name = 'datum_povratka'  class="form-control" value="{{$offer->datum_povratka}}"><br>
    </div>
    <div class="form-group">
    <input type="number" name = 'broj_mesta'  class="form-control" value="{{$offer->broj_mesta}}"><br>
    </div>
    <div class="form-group">
    <input type="number" name = 'cena'  class="form-control"  value="{{$offer->cena}}"><br>
    </div>
    <button type="submit" class="btn btn-primary">Azuriraj</button>
</main>

</form>