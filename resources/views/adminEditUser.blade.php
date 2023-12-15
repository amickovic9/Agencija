@include('navbar');
<head> 
    
</head> 
<h1>Uredi Korisnika</h1>
<form action="/admin/edit-user/{{$user['id']}}" method="POST">
    @csrf
<input type="text" name="name" value="{{$user['name']}}">
<input type="text" name="email" value="{{$user['email']}}">
<input type="text" name="is_admin" value="{{$user['is_admin']}}">
<button type="submit" >Izmeni</button></form>