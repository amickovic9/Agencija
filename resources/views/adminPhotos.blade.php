@include('navbar');
@foreach ($photos as $photo)
    <div class="photo-container text-center">
        <img src="{{ Storage::url('gallery/' . $photo['photo']) }}" class="img-fluid">
        <div class="button-group mt-3">
            <a href="/admin/photo-delete/{{$photo['id']}}" class="btn btn-danger" role="button">Obrisi</a>
            @if ($photo['is_allowed'])
            <a href="/admin/photo-hide/{{$photo['id']}}" class="btn btn-danger" role="button">Sakrij</a>    
            @else 
            <a href="/admin/photo-show/{{$photo['id']}}" class="btn btn-success" role="button">Prikazi</a>
            @endif
        </div>
    </div>
@endforeach