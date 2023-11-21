@include('navbar')

<div class="container mt-5">
    <h1>Oglasi ponudu</h1>
    <form action="/create-offer" method="POST" enctype="multipart/form-data" class="mt-4">
        @csrf 

        <div class="form-group">
            <label for="destinacija">Destinacija:</label>
            <input type="text" class="form-control" name="destinacija" required>
        </div>

        <div class="form-group mt-3">
            <label for="photo">Fotografija:</label>
            <input type="file" class="form-control-file" name="photo" accept="image/*">
        </div>

        <div class="form-group mt-3">
            <label for="opis">Opis:</label>
            <textarea class="form-control" name="opis" required></textarea>
        </div>

        <div class="form-group mt-3">
            <label for="datum_polaska">Datum polaska:</label>
            <input type="date" class="form-control" name="datum_polaska" required>
        </div>

        <div class="form-group mt-3">
            <label for="datum_povratka">Datum povratka:</label>
            <input type="date" class="form-control" name="datum_povratka" required>
        </div>

        <div class="form-group mt-3">
            <label for="broj_mesta">Broj mesta:</label>
            <input type="number" class="form-control" name="broj_mesta" required>
        </div>

        <div class="form-group mt-3">
            <label for="cena">Cena:</label>
            <input type="number" class="form-control" name="cena" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Sačuvaj ponudu</button>
    </form>
</div>
