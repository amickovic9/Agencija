@include('adminnavbar');
<head>
<link rel="stylesheet" href="/css/admin/edit.css">

</head>
<main>

<form action="/admin/edit-reservation/{{$reservation->id}}" method="post" class="form-wrapper">
    @csrf
    <div class="form-group">
    <input type="text" name = 'user_name'  class="form-control"  value="{{$reservation->user_name}}">
</div>
    <div class="form-group">
    <input type="text" name = 'email'  class="form-control"  value="{{$reservation->email}}">
</div>
    <div class="form-group">
    <input type="text" name = 'broj_telefona'  class="form-control"  value="{{$reservation->broj_telefona}}">
</div>
    <div class="form-group">
    <input type="text" name = 'broj_osoba'  class="form-control"  value="{{$reservation->broj_osoba}}">
</div>
    <div class="form-group">
    <input type="text" name = 'napomena'  class="form-control"  value="{{$reservation->napomena}}">
</div>
    
    <button type="submit" class="btn btn-primary">Azuriraj</button>

</form>
</main>