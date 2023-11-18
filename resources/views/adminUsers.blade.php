@include('navbar')
<h1>Svi korisnici</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Userame</th>
      <th scope="col">Email</th>
      <th scope="col">Is admin</th>
      <th scope="col">Akcije</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($users as $user)
        
    <tr>
      <th scope="row">1</th>
      <td>{{$user['name']}}</td>
      <td>{{$user['email']}}</td>
      <td>{{$user['is_admin']}}</td>
      <td><a href="/admin/edit-user/{{$user['id']}}" >Izmeni      </a> 
        <a href="/admin/delete-user/{{$user['id']}}" style="margin-left:3px">Izbrisi</a></td>
    </tr>
    
    @endforeach

  </tbody>

</table>