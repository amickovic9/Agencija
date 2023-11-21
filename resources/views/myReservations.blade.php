@include('navbar')

<div class="container mt-5">
    <h1>Moje rezervacije</h1>
    @foreach ($reservations as $reservation)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Rezervacija za ponudu: <a href="/reserve/{{$reservation['offer_id']}}">Detalji</a></h5>
                <p class="card-text">Na ime: {{$reservation['user_name']}}</p>
                <p class="card-text">Email: {{$reservation['email']}}</p>
                <p class="card-text">Broj telefona: {{$reservation['broj_telefona']}}</p>
                <p class="card-text">Broj osoba: {{$reservation['broj_osoba']}}</p>
                <p class="card-text">Napomena: {{$reservation['napomena']}}</p>
                <form action="delete-reservation/{{$reservation['id']}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Otkaži rezervaciju</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
