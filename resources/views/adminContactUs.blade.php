@include('adminnavbar')
<head>
<link rel="stylesheet" href="/css/admin/contact.css">
</head>
<main>

@if($contacts->isEmpty())
    <p>Nema neodgovorenih pitanja</p>
@else
        @foreach($contacts as $contact)
                    <div class="card-body">
                        <h5 class="card-title">Ime: {{ $contact['name'] }}</h5>
                        <p class="card-text">Email: {{ $contact['email'] }}</p>
                        <p class="card-text">Poruka: {{ $contact['message'] }}</p>
                        <a href="/admin/reply/{{$contact['id']}}" class = 'btn btn-primary'>Odgovori</a>
                    </div>
        @endforeach
    

@endif
</main>
</body>

</html>
