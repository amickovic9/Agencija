<!DOCTYPE html>
@include('navbar')

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prijava | Registracija</title>
    
    <link href="/css/login.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        form {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
  

<div class="container" id="container">
      <div class="form-container sign-up">
        
        <form action="/register" method="post">
        @csrf
          <h1>Kreiraj nalog</h1>
          <br/>
          

          <input type="text" name="name" required id="name" placeholder="Korisnicko Ime" />
          <input type="email" name="email"  required id="email" placeholder="Email" />
          <input type="password" name="password" required id="password" placeholder="Lozinka" />
          <button type="submit">Registracija</button>
        </form>
      </div>
      <div class="form-container sign-in">
        <form action="/login" method="post">
        @csrf
          <h1>Prijava</h1>
          <br />
          <input type="text" placeholder="Korisnicko ime" required name="loginname" id="loginname"/>
          <input type="password" placeholder="Lozinka"  required name="loginpassword" id="loginpassword"/>
          <button type="submit">Prijavi se</button>
        </form>
      </div>
      <div class="toggle-container">
        <div class="toggle">
          <div class="toggle-panel toggle-left">
            <h1>Dobrodošao nazad!</h1>
            <p>
              Unesi svoje podatke, kako bi mogao da koristiš sve mogućnosti
              našeg sajta
            </p>
            <button class="hidden" id="login">Prijavi se</button>
          </div>
          <div class="toggle-panel toggle-right">
            <h1>Pozdrav!</h1>
            <p>
              Registruj se sa svojim podacima, kako bi mogao da zakažeš svoje
              putovanje na vreme!
            </p>
            <button class="hidden" id="register">Registracija</button>
          </div>
        </div>
      </div>
    </div>

    <script src="/js/script.js"></script>
    
</body>
</html>
