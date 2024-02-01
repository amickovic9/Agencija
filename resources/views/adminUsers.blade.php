@include('adminnavbar')
<head>
<link rel="stylesheet" href="/css/admin/offers.css">
<link rel="stylesheet" href="/css/admin/users.css">

</head>
<main>

    <form action="/admin/users" method="GET" class="form-wrapper">
                <div class="form-group">
                    <label for="name">Ime:</label>
                    <input type="text" class="form-control" name="name" value="{{ request()->input('name') }}">
                </div>
            
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" name="email" value="{{ request()->input('email') }}">
                </div>
            
                
                    
                <button type="submit" class="btn btn-primary form-control">Pretraži</button>
                </div>
    </form>


<table>
  <thead>
    <tr>
      <th >Userame</th>
      <th >Email</th>
      <th >Is admin</th>
      <th ></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($users as $user)
        
    <tr>
      <td>{{$user['name']}}</td>
      <td>{{$user['email']}}</td>
      <td>{{$user['is_admin']}}</td>
      <td><a href="/admin/edit-user/{{$user['id']}}" class="btn btn-success" role="button">Izmeni      </a> 
        <a href="/admin/delete-user/{{$user['id']}}" class="btn btn-danger" role="button">Izbrisi</a></td>
    </tr>
    
    @endforeach

  </tbody>

</table>