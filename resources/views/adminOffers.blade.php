@include('navbar');
<h1>Sve ponude</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">User_id</th>
      <th scope="col">Destinacija</th>
      <th scope="col">Opis</th>
      <th scope="col">Slika</th>
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
      <td>{{$offer['datum_polaska']}}</td>
      <td>{{$offer['datum_povratka']}}</td>
      <td><a href="/admin/edit-offer/{{$offer['id']}}" >Izmeni      </a> 
        <a href="/admin/delete-offer/{{$offer['id']}}" style="margin-left:3px">Izbrisi</a></td>
    </tr>
    
    @endforeach

  </tbody>

</table>