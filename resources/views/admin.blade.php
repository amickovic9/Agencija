@include('navbar')
<h1>Ukupan broj korisnika: {{$users}}</h1>
<h1>Ukupan broj ponuda: {{$offers}}</h1>
<h1>Ukupan broj rezervacija: {{$reservations}}</h1>
<a href="/admin/users">Vidi sve korisnike</a>
<a href="/admin/offers">Vidi sve ponude</a>
<a href="/admin/reservations">Vidi sve rezervacije</a>