@include('navbar');
<div class="container mt-5">
    <h1>Sve ponude</h1>
    <form action="/admin/offers" method="get" class="mt-4">
        <div class="row">
            <div class="col-md-4">
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


<table class="table">
  <thead>
    <tr>
      <th scope="col">User_id</th>
      <th scope="col">Destinacija</th>
      <th scope="col">Opis</th>
      <th scope="col">Slika</th>
      <th scope="col">Rezervisano</th>
      <th scope="col">Datum polaska</th>
      <th scope="col">Datum povratka</th>
      <th scope="col">Akcije</th>
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
        <a href="/admin/edit-offer/{{$offer['id']}}" >Izmeni      </a> 
        <a href="/admin/delete-offer/{{$offer['id']}}" style="margin-left:3px">Izbrisi</a>
        <a href="/admin-reservations-offer/{{$offer['id']}}" style="margin-left:3px">Rezervacije</a>
      </td>
    </tr>
    
    @endforeach

  </tbody>

</table>
</main>
