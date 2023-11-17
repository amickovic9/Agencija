@include('navbar')
<h4>{{$offer['destinacija']}}</h4>
        <img src="{{ Storage::url('images/' . $offer['photo']) }}" alt="Opis slike" width="300px" height="300px">

        <p>{{$offer['opis']}}</p>
        <p>Datum polaska: {{$offer['datum_polaska']}}</p>
        <p>Datum povratka: {{$offer['datum_povratka']}}</p>
        <p>Preostali broj slobodnih mesta: {{$offer['broj_mesta']}}</p>
        <p>Cena: {{$offer['cena']}}</p><br><br>
<form action="/reserve/{{$offer['id']}}" method="post">
    @csrf
    
    <h1>Rezervisi putovanje  - {{$offer['destinacija']}}</h1>
Ime i prezime: <input type ="text" name="user_name"><br><br>
Email: <input type ="text" name="email"><br><br>
Broj telefona: <input type ="text" name="broj_telefona"><br><br>
Broj osoba: <input type ="text" name="broj_osoba"><br><br>
Napomena : <input type ="text" name="napomena" value = " "><br><br>
<button type="submit">Rezervisi</button>
</form>