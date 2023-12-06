<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/admin/adminnav.css" rel="stylesheet">
</head>
<body>
    @include('navbar')
    <div class="navcontainer">
        <nav class="nav">
            <div class="nav-upper-options">
                <a href="/admin" class="nav-option option1 ">
                    <img src="/img/dashboard.png" class="nav-img">
                    <h3> Dashboard</h3>
                </a>

                <a href="/admin/photos" class="option2 nav-option ">
                    <img src="/img/gallery.png" class="nav-img">
                    <h3> Upravljanje galerijom</h3>
                </a>

                <a href="/admin/reservations" class="nav-option option3">
                    <img src="/img/reservation.png" class="nav-img">
                    <h3 >Upravljanje rezervacijama</h3>
                </a>

                <a href="/admin/users" class="nav-option option4">
                    <img src="/img/user.png" class="nav-img">
                    <h3>Upravljanje korisnicima</h3>
                </a>

                <a href="/admin/contact-us" class="nav-option option5">
                    <img src="/img/message.png" class="nav-img">
                    <h3>Neodgovorene poruke</h3>
                </a>
            </div>
        </nav>
    </div>

    <script src="/js/adminnav.js/"></script>
</body>
</html>
