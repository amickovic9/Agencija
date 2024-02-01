@include('adminnavbar');
<head>
<link rel="stylesheet" href="/css/admin/edit.css">

</head>
<main>
<form action="/admin/edit-user/{{$user['id']}}" method="POST" class="form-wrapper">
    @csrf

<div class="form-group">
    <input type="text" name="name"  class="form-control" value="{{$user['name']}}">
</div>
    <div class="form-group">
<input type="text" name="email"  class="form-control" value="{{$user['email']}}">
</div>
<div class="form-group">
<input type="text" name="is_admin"  class="form-control" value="{{$user['is_admin']}}">
</div>
<button type="submit" class="btn btn-primary">Izmeni</button></form>
</main>