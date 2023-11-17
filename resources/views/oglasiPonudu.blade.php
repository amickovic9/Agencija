@include('navbar')
<h1>Oglasi ponudu</h1>
<form action="/create-offer" method="POST" enctype="multipart/form-data">
    @csrf 

    <label for="destinacija">Destinacija:</label>
    <input type="text" name="destinacija" required>
    <br><br>

    <input type="file" name="photo">Slika       
    <br>
    <br>
    <label for="opis">Opis:</label>
    <textarea name="opis" required></textarea>
    <br><br>

    <label for="datum_polaska">Datum polaska:</label>
    <input type="date"  name="datum_polaska" required>
    <br><br>

    <label for="datum_povratka">Datum povratka:</label>
    <input type="date"  name="datum_povratka" required>
    <br><br>

    <label for="broj_mesta">Broj mesta:</label>
    <input type="number"  name="broj_mesta" required>
    <br><br>

    <label for="cena">Cena:</label>
    <input type="number" name="cena" required>
    <br><br>

    <button type="submit">Sačuvaj ponudu</button>
</form>
