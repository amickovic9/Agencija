@include('navbar')
<h1>Ukupan broj korisnika: {{$users}}</h1>
<h1>Ukupan broj ponuda: {{$offers}}</h1>
<h1>Ukupan broj rezervacija: {{$reservations}}</h1>
<a href="/admin/users">Upravljanje korisnicima</a>
<a href="/admin/offers">Upravljanje ponudama</a>
<a href="/admin/reservations">Upravljanje rezervacijama</a>
<a href="/admin/photos">Upravljanje slikama u galeriji</a>
<h2>Upravljanje galerijom</h2>

@if ($photos->isEmpty())
    <h3>Sve fotografije su filtrirane</h1>
    
@endif
    
@foreach ($photos as $photo)
    <div class="photo-container text-center">
        <img src="{{ Storage::url('gallery/' . $photo['photo']) }}" class="img-fluid">
        <div class="button-group mt-3">
            <a href="admin/allow/{{$photo['id']}}" class="btn btn-success" role="button">Odobri</a>
            <a href="admin/decline/{{$photo['id']}}" class="btn btn-danger" role="button">Odbij</a>
        </div>
    </div>
@endforeach
