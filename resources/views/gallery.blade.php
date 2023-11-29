@include('navbar');
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/gallery.css">
    <title>Document</title>
</head>
    <h1>Galerija</h1>

<body class="gallery-page">
<div id="image-track" data-mouse-down-at="0" data-prev-percentage="0">
@foreach ($photos as $photo)
    <img class="image" src="{{ Storage::url('gallery/' . $photo['photo']) }}" draggable="false" />
@endforeach
</div>
<form action="/gallery/upload" method="POST" enctype="multipart/form-data">
    @csrf 
    <input type="file" name="photo" required>      
    <br>
    <br>
    <button type='submit'>Dodajte vasu fotografiju u galeriju</button>
</form> 

<script src="/js/gallery.js"></script>


</body>
</html>
