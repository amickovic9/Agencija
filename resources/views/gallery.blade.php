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
<h3 style="text-align: center; color:white;">Galerija</h3>


<body class="gallery-page">
<div id="image-track"  data-mouse-down-at="0" data-prev-percentage="0">
@foreach ($photos as $photo)
    <img class="image" src="{{ Storage::url('gallery/' . $photo['photo']) }}" draggable="false" />
@endforeach
</div>
<div class="buttons-center">
        <form action="/gallery/upload" method="POST" enctype="multipart/form-data">
            @csrf 
            <div style="margin-bottom: 10px;">
                <input type="file" id="fileInput" name="photo" required style="display: none;">
                <button type="button" id="uploadBtn" class="btn btn-outline-light">Izaberi sliku</button>
            </div>     
            <button type='submit' class="btn btn-outline-light">Klikni da postaviš</button>
        </form>
    </div>


<script src="/js/gallery.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
