@include('adminnavbar')
 
<form action="/admin-reservations-offer/search/{{$offer['id']}}" method="GET">
   Ime: <input type="text" name="name" value="{{ request()->input('name') }}">
   Email: <input type="text" name="email" value="{{ request()->input('email') }}">
   Broj telefona: <input type="number" name="broj_telefona" value="{{ request()->input('broj_telefona') }}">
    <button type="submit">Pretraži</button>
</form>
<table class="table" >
    <thead>
        <tr>
            <th scope="col">User_id</th>
            <th scope="col">Offer_id</th>
            <th scope="col">Ime</th>
            <th scope="col">Email</th>
            <th scope="col">Broj telefona</th>
            <th scope="col">Broj osoba</th>
            <th scope="col">Napomena</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($reservations as $reservation)
            <tr>
                <td>{{ $reservation->user_id }}</td>
                <td>{{ $reservation->offer_id }}</td>
                <td>{{ $reservation->user_name }}</td>
                <td>{{ $reservation->email }}</td>
                <td>{{ $reservation->broj_telefona }}</td>
                <td>{{ $reservation->broj_osoba }}</td>
                <td>{{ $reservation->napomena }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

