<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link href="/css/admin/pocetna.css" rel="stylesheet">
    
    
    
</head>

<body>
    @include('adminnavbar')
    <main>
        <div class="box-container">
        
            <a href="/admin/users" class="box box1">
                
                    <h3 class="topic-heading">{{$users}}</h3>
                    <h3 class="topic">Korisnika</h3>
                    
                 
                
</a>
            <a href="/admin/offers" class="box box2" >
                 
                        <h3 class="topic-heading">{{$offers}}</h3>    
                        <h3 class="topic">Ponuda</h3>
            </a>
                
            
            <a href="/admin/reservations" class="box box3">
                
                   
                        <h3 class="topic-heading">{{$reservations}}</h3>
                        <h3 class="topic">Rezervacija</h3>
                        
                  
                
</a>
            <a href="/admin/contact-us" class="box box4">
                
                        <h3 class="topic-heading">{{$contactUs}}</h3>
                        <h3 class="topic">Neodgovorenih contact-us</h3>
                  
   
</a>
        </div>

        
       
            <div class="requests">
                
                    <h1>Zahtevi za postavljanje fotografija</h1>
                    @if ($photos->isEmpty())
                        <p>Sve fotografije su filtrirane</p>
                    @endif
                    
    
            @foreach ($photos as $photo)
                <div class="img">
                        
                            <img src="{{ Storage::url('gallery/' . $photo['photo']) }}" class="card-img-top" alt="...">
                        
                        
                            <div class="btn-group d-flex" role="group" aria-label="Basic example">
                                <a href="/admin/allow/{{$photo['id']}}" class="btn btn-success flex-fill mr-1">Odobri</a>
                                <a href="/admin/decline/{{$photo['id']}}" class="btn btn-danger flex-fill ml-1">Odbij</a>
                            </div>
                        </div>
                    
            @endforeach
</div>
</main>
     
    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
