@include('navbar')
<h1>Moje rezervacije</h1>
@foreach ($reservations as $reservation)
    Rezervacija za ponudu: <a href="/reserve/{{$reservation['offer_id']}}">Klik</a>
   <br> Na ime: {{$reservation['user_name']}}
   <br> Email: {{$reservation['email']}}
   <br> Broj telefona: {{$reservation['broj_telefona']}}
   <br> Broj osoba: {{$reservation['broj_osoba']}}
   <br> Napomena: {{$reservation['napomena']}}
    
@endforeach