@include('navbar');
<h1>Galerija</h1>
<form action="/gallery/upload" method="POST" enctype="multipart/form-data">
    @csrf 
    <input type="file" name="photo">      
    <br>
    <br>
    <button type='submit'>Dodajte vasu fotografiju u galeriju</button>
</form>
@foreach ($photos as $photo)
    <img src="{{ Storage::url('gallery/' . $photo['photo']) }}" alt="Opis slike" width="100px" height="100px">
@endforeach