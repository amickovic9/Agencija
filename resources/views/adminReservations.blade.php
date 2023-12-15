@include('adminnavbar')
<head>
    
</head>
<div class="container mt-5">
    <form action="/admin/reservations" method="get" class="mt-4">
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
                    <label for="broj_telefona">Broj telefona:</label>
                    <input type="text" class="form-control" name="broj_telefona" value="{{ request()->input('broj_telefona') }}">
                </div>
            </div>
            <div class="col-md-12 mt-3">
                <button type="submit" class="btn btn-primary">Pretraži</button>
            </div>
        </div>
    </form>
</div>

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
            <th scope="col">Akcije</th>
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
                <td><a href="/admin/edit-reservation/{{$reservation['id']}}" >Izmeni      </a> 
        <a href="/admin/delete-reservation/{{$reservation['id']}}" style="margin-left:3px">Izbrisi</a></td>
            </tr>
        @endforeach
    </tbody>
</table>
