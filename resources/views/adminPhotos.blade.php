<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Upravljanje galerijom</title>
    <link href="/css/admin/photos.css" rel="stylesheet">
    
</head>

<body>
    @include('adminnavbar');
<main>
    <h1>Upravljanje galerijom</h1>
@foreach ($photos as $photo)
    <div class="photo-container text-center">

        <img src="{{ Storage::url('gallery/' . $photo['photo']) }}" class="img-fluid">
        
            <a href="/admin/photo-delete/{{$photo['id']}}" class="btn btn-danger" role="button">Obrisi</a>
            @if ($photo['is_allowed'])
            <a href="/admin/photo-hide/{{$photo['id']}}" class="btn btn-danger" role="button">Sakrij</a>    
            @else 
            <a href="/admin/photo-show/{{$photo['id']}}" class="btn btn-success" role="button">Prikazi</a>
            @endif
        </div>
    </div>
@endforeach
</main>
</body>

</html>
