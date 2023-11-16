@include('navbar')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ulogujte se</title>
</head>
<body>
    <form action="/register" method="post">
        @csrf
        Korisnicko ime<input type="text" name="name" id=""><br>
         Email<input type="text" name="email" id=""><br>
        Password<input type="password" name="password" id=""><br>
        <button type="submit">Registruj se</button>
    </form>
    <br> <br>
    <form action="/login" method="post">
        @csrf
        
         Korisnicko ime<input type="text" name="loginname" id=""><br>
        Password<input type="password" name="loginpassword" id=""><br>
        <button type="submit">Uloguj se se</button>
    </form>
</body>
</html>