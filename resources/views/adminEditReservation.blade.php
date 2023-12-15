@include('navbar')
<head>
    
</head> 
<h1>Edit Reservation</h1>
<form action="/admin/edit-reservation/{{$reservation->id}}" method="post" >
    @csrf
    <input type="text" name = 'user_name' value="{{$reservation->user_name}}"><br>
    <input type="text" name = 'email' value="{{$reservation->email}}"><br>
    <input type="text" name = 'broj_telefona' value="{{$reservation->broj_telefona}}"><br>
    <input type="text" name = 'broj_osoba' value="{{$reservation->broj_osoba}}"><br>
    <input type="text" name = 'napomena' value="{{$reservation->napomena}}"><br>
    <button type="submit">Azuriraj</button>

</form>