@include('adminnavbar')
<div class="container mt-5">
    <h1>Svi korisnici</h1>
    <form action="/admin/users" method="GET" class="mt-4">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="name">Ime:</label>
                    <input type="text" class="form-control" name="name" value="{{ request()->input('name') }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" name="email" value="{{ request()->input('email') }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>&nbsp;</label> 
                    <button type="submit" class="btn btn-primary form-control">Pretraži</button>
                </div>
            </div>
        </div>
    </form>
</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Userame</th>
      <th scope="col">Email</th>
      <th scope="col">Is admin</th>
      <th scope="col">Akcije</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($users as $user)
        
    <tr>
      <td>{{$user['name']}}</td>
      <td>{{$user['email']}}</td>
      <td>{{$user['is_admin']}}</td>
      <td><a href="/admin/edit-user/{{$user['id']}}" >Izmeni      </a> 
        <a href="/admin/delete-user/{{$user['id']}}" style="margin-left:3px">Izbrisi</a></td>
    </tr>
    
    @endforeach

  </tbody>

</table>