@include('navbar')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ulogujte se</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Dodatni stil za margine između elemenata */
        form {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h2>Registracija</h2>
                <form action="/register" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Korisničko ime:</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" name="email" id="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Registruj se</button>
                </form>
            </div>
            <div class="col-md-6">
                <h2>Logovanje</h2>
                <form action="/login" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="loginname">Korisničko ime:</label>
                        <input type="text" class="form-control" name="loginname" id="loginname">
                    </div>
                    <div class="form-group">
                        <label for="loginpassword">Password:</label>
                        <input type="password" class="form-control" name="loginpassword" id="loginpassword">
                    </div>
                    <button type="submit" class="btn btn-primary">Uloguj se</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
