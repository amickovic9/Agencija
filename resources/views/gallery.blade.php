@include('navbar');
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/gallery.css">
    <title>Galerija</title>
</head>
<body class="gallery-page">

    <div class="image-container">
        <button id="scrollLeft" class="nav-button">←</button>
        <div id="image-track" data-mouse-down-at="0" data-prev-percentage="0">
            @foreach ($photos as $photo)
                <img class="image" src="{{ Storage::url('gallery/' . $photo['photo']) }}" draggable="false" />
            @endforeach
        </div>
        <button id="scrollRight" class="nav-button">→</button>
    </div>

    <div class="large-image-wrapper">
        <img class="large-image" src="" alt="" />
    </div>

    <div class="buttons-center">
        <form action="/gallery/upload" method="POST" enctype="multipart/form-data">
            @csrf
            <div style="margin-bottom: 10px;">
                <input type="file" id="fileInput" name="photo" required style="display: none;">
                <button type="button" id="uploadBtn" class="btn-upload">Izaberi sliku</button>
            </div>     
            <button type='submit' class="btn-submit">Klikni da postaviš</button>
        </form>
    </div>

    <script src="/js/gallery.js"></script>
    
</body>
</html>
@include('footer')
