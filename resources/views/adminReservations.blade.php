@include('adminnavbar')
<head>
<meta charset="UTF-8">
    <title>Rezervacije</title>
<link rel="stylesheet" href="/css/admin/offers.css">
<link rel="stylesheet" href="/css/admin/reservation.css">
</head>
<main>
    <form action="/admin/reservations" method="get" class="form-wrapper">
        
            
                <div class="form-group">
                    <label for="name">Ime:</label>
                    <input type="text" class="form-control" name="name" value="{{ request()->input('name') }}">
                </div>
            
            
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" name="email" value="{{ request()->input('email') }}">
                </div>
           
            
                <div class="form-group">
                    <label for="broj_telefona">Broj telefona:</label>
                    <input type="text" class="form-control" name="broj_telefona" value="{{ request()->input('broj_telefona') }}">
                </div>
            
            
                <button type="submit" class="btn btn-primary">Pretraži</button>
           
        </div>
    </form>


<table>
    <thead>
        <tr>
            <th >User ID</th>
            <th >Offer ID</th>
            <th >Ime</th>
            <th >Email</th>
            <th >Broj telefona</th>
            <th >Broj osoba</th>
            <th >Napomena</th>
            <th ></th>
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
                <td><a href="/admin/edit-reservation/{{$reservation['id']}}" class="btn btn-success" role="button">Izmeni      </a> 
        <a href="/admin/delete-reservation/{{$reservation['id']}}" class="btn btn-danger" role="button">Izbrisi</a></td>
            </tr>
        @endforeach
    </tbody>
</table>
</main>
