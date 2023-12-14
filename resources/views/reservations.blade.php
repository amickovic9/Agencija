@include('navbar')

<form action="/reservations/search/{{$offer['id']}}" method="GET">
   Ime: <input type="text" name="name" value="{{ request()->input('name') }}">
   Email: <input type="text" name="email" value="{{ request()->input('email') }}">
   Broj telefona: <input type="number" name="broj_telefona" value="{{ request()->input('broj_telefona') }}">
    <button type="submit">Pretraži</button>
</form>
@foreach ($reservations as $reservation)
    <div style="border: 3px solid black">
    <p>Ime: {{ $reservation->user_name }}</p>
    <p>Email: {{ $reservation->email }}</p>
    <p>Broj telefona: {{ $reservation->broj_telefona }}</p>
    <p>Broj osoba: {{ $reservation->broj_osoba }}</p>
    <p>Napomena: {{ $reservation->napomena }}</p>
    </div>
@endforeach
