<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .photo-container {
            height: 200px; /* Prilagodite visinu kontejnera kako želite */
        }

        .photo-container img {
            object-fit: cover;
            height: 100%;
            width: 100%;
        }
    </style>
</head>

<body>
    @include('navbar')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Ukupan broj korisnika</h5>
                        <p class="card-text">{{$users}}</p>
                        <a href="/admin/users" class="btn btn-primary">Upravljanje korisnicima</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Ukupan broj ponuda</h5>
                        <p class="card-text">{{$offers}}</p>
                        <a href="/admin/offers" class="btn btn-primary">Upravljanje ponudama</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Ukupan broj rezervacija</h5>
                        <p class="card-text">{{$reservations}}</p>
                        <a href="/admin/reservations" class="btn btn-primary">Upravljanje rezervacijama</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                    <h1 class="display-4">Upravljanje galerijom</h1>
                    @if ($photos->isEmpty())
                        <p class="lead">Sve fotografije su filtrirane</p>
                    @endif
                    <a href="/admin/photos" class="btn btn-primary">Upravljanje slikama u galeriji</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
            @foreach ($photos as $photo)
                <div class="col mb-4">
                    <div class="card">
                        <div class="aspect-ratio photo-container">
                            <img src="{{ Storage::url('gallery/' . $photo['photo']) }}" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body">
                            <div class="btn-group d-flex" role="group" aria-label="Basic example">
                                <a href="admin/allow/{{$photo['id']}}" class="btn btn-success flex-fill mr-1">Odobri</a>
                                <a href="admin/decline/{{$photo['id']}}" class="btn btn-danger flex-fill ml-1">Odbij</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
