@include('adminnavbar')
<head>
<meta charset="UTF-8">
    <title>Ponude</title>
<link rel="stylesheet" href="/css/admin/offers.css">

</head>
<main>
    
    <form action="/admin/offers" method="get" class="form-wrapper">
        
                <div class="form-group">
                    <label for="destinacija">Destinacija:</label>
                    <input type="text" class="form-control" name="destinacija" value="{{ request()->input('destinacija') }}">
                </div>
            
                <div class="form-group">
                    <label for="polazak">Datum polaska:</label>
                    <input type="date" class="form-control" name="polazak" value="{{ request()->input('polazak') }}">
                </div>
            
                <div class="form-group">
                    <label for="povratak">Datum povratka:</label>
                    <input type="date" class="form-control" name="povratak" value="{{ request()->input('povratak') }}">
                </div>
            
                <button type="submit" class="btn btn-primary">Pretraži</button>
            </div>
        
    </form>


<table>
  <thead>
    <tr>
      <th>User_id</th>
      <th>Destinacija</th>
      <th>Opis</th>
      <th>Slika</th>
      <th>Rezervacije</th>
      <th>Datum polaska</th>
      <th>Datum povratka</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($offers as $offer)
        
    <tr>
      <td>{{$offer['user_id']}}</td>
      <td>{{$offer['destinacija']}}</td>
      <td>{{$offer['opis']}}</td>
      <td>        <img src="{{ Storage::url('images/' . $offer['photo']) }}" alt="Opis slike" width="50px" height="50px">
</td>
<td>{{$zauzeto[$offer['id']]}}/{{$offer['broj_mesta']}}</td>
      <td>{{$offer['datum_polaska']}}</td>
      <td>{{$offer['datum_povratka']}}</td>
      <td>
        <a href="/admin/edit-offer/{{$offer['id']}}" class="btn btn-success" role="button">Izmeni</a>
        <a href="/admin-reservations-offer/{{$offer['id']}}" class="btn btn-success" role="button" >Rezervacije</a> 
        <a href="/admin/delete-offer/{{$offer['id']}}" class="btn btn-danger" role="button">Izbrisi</a>
      </td>
    </tr>
    
    @endforeach

  </tbody>

</table>
</main>
