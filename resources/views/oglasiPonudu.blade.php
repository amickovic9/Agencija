@include('navbar')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kreiraj ponudu</title>
    <link rel="stylesheet" type="text/css" href="/css/makeoffer.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
  
</head>
<body>

<div class="offer-container">
    <h1>Oglasi ponudu</h1>
    <form action="/create-offer" method="POST" enctype="multipart/form-data" class="form-offer">
  @csrf 
  <div class="coolinput">
    <label for="destinacija" class="text">Destinacija:</label>
    <input type="text" placeholder="" name="destinacija" class="input">
  </div>

  <div class="coolinput">
    <label for="opis" class="text">Opis:</label>
    <textarea type="form-control" name="opis" class="input" required></textarea>
  </div>
  
  <label for="uploadImage" class="file-upload-label" id="dropArea">
  <div class="file-upload-design">
    <span class="browse-button">Izaberi sliku</span>
    <p id="selectedFileName">Nema izabrane slike</p>
  </div>
  <input id="uploadImage" type="file" accept="image/*" name="photo" onchange="updateFileName()" />
</label>



  <div class="coolinput">
    <label for="datum_polaska" class="text">Datum polaska:</label>
    <input required="" placeholder="Datum polaska" name="datum_polaska" type="date" class="form-control" id="datum_polaska"value="{{ request()->input('datum_polaska') }}" min="{{ now()->format('Y-m-d') }}" max="{{ now()->addYears(4)->format('Y-m-d') }}">
  </div>

  <div class="coolinput">
    <label for="datum_povratka" class="text">Datum povratka:</label>
    <input class="form-control" id="datum_povratka" required="" placeholder="Datum_povratka" name="datum_povratka" type="date" value="{{ request()->input('datum_polaska') }}" min="{{ now()->format('Y-m-d') }}" max="{{ now()->addYears(4)->format('Y-m-d') }}">

  </div>

  <div class="coolinput">
  <label for="broj_mesta" class="text">Broj mesta:</label>
  <input type="number" name="broj_mesta" class="input" min="1" max="100" required>
</div>

<div class="coolinput">
  <label for="cena" class="text">Cena:</label>
  <input type="number" class="input" name="cena" min="1" max="100000" required>
</div>

  <button type="submit" class="comm-btn">
    <span>Objavi ponudu</span>
  </button>
</form>
</div>
<script> 
function updateFileName() {
  var input = document.getElementById('uploadImage');
  var fileName = input.files[0] ? input.files[0].name : 'Nema izabrane slike';
  document.getElementById('selectedFileName').innerText = fileName;
}
document.getElementById('datum_polaska').addEventListener('change', function() {
    var departureDate = this.value;
    var returnInput = document.getElementById('datum_povratka');
    returnInput.min = departureDate;
    if (returnInput.value < departureDate) {
        returnInput.value = departureDate;
    }
});
</script>
<script src="/js/date.js"></script>
