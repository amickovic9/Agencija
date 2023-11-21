@include('navbar');
<h1>Galerija</h1>
<form action="/gallery/upload" method="POST" enctype="multipart/form-data">
    @csrf 
    <input type="file" name="photo">      
    <br>
    <br>
    <button type='submit'>Dodajte vasu fotografiju u galeriju</button>
</form>

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ Storage::url('gallery/aktivna.jpg') }}" class="d-block w-100" style=" max-`width: 70%; height: 70%; margin: 0 auto;">
        </div>
        @foreach ($photos as $photo)
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ Storage::url('gallery/' . $photo['photo']) }}" style="width: 70%; height: 70%; margin: 0 auto;">
            </div>  
        @endforeach
    </div>
    
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
