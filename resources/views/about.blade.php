@include('navbar')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Forma za ocenjivanje i komentare</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .rating {
      unicode-bidi: bidi-override;
      direction: rtl;
    }
    .rating > label {
      display: inline-block;
      padding: 5px;
      cursor: pointer;
    }
    .rating > input {
      display: none;
    }
    .rating > label:before {
      content: "\2605";
      font-size: 2em;
      color: grey;
    }
    .rating > label:hover:before,
    .rating > label:hover ~ label:before,
    .rating > input:checked ~ label:before {
      color: gold;
    }
  </style>
</head>
<body>
  <div class="container mt-4">
    <h2>Oceni i ostavi komentar</h2>
    <form action="/oceni" method="post">
      @csrf
      <div class="form-group">
        <label for="rating" >Ocena:</label><br>
        <div class="rating" required>
          <input type="radio" id="star5" name="ocena" value="5">
          <label for="star5"></label>
          <input type="radio" id="star4" name="ocena" value="4">
          <label for="star4"></label>
          <input type="radio" id="star3" name="ocena" value="3">
          <label for="star3"></label>
          <input type="radio" id="star2" name="ocena" value="2">
          <label for="star2"></label>
          <input type="radio" id="star1" name="ocena" value="1">
          <label for="star1"></label>
        </div>
      </div>
      <div class="form-group">
        <label for="comment">Komentar:</label>
        <textarea class="form-control" id="comment" name="komentar" rows="4"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Pošalji</button>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<section style="background-color: #6c9ef5;">
  <div class="container my-5 py-5">
    <div class="row d-flex justify-content-center">
      <div class="col-md-12 col-lg-10">
        <div class="card text-dark">
          <div class="card-body p-4">
            <h4 class="mb-0">Skorašnji komentari</h4>
            <p class="fw-light mb-4 pb-2"></p>

            @foreach ($comments as $komentar)
              <div>
                <h6 class="fw-bold mb-1">{{$ime[$komentar['id']]}}</h6>
                <div class="d-flex align-items-center mb-3">
                  <p class="mb-0">
                    {{$komentar['created_at']}}
                  </p>
                </div>
                <p class="mb-0">
                  {{$komentar['komentar']}}
                </p>
                <div class="mt-2">
                  @for ($i = 1; $i <= $komentar['ocena']; $i++)
                    &#9733; 
                  @endfor
                </div>
                @auth
                @if(Auth::user()->is_admin)
                <a href="/admin/izbrisi-komentar/{{$komentar['id']}}">Izbrisi</a>
                @endif
              @endauth
                <hr style="width: 100%; margin-top: 1rem;">
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
