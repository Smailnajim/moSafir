<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About US</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/client/aboutus.css') }}">
</head>
<body>
    <nav style="position: fixed;" class="navbar navbar-expand-lg bg-white navbar-light">
        <div class="container-fluid">

            <h4 class="navbar-brand text-dark"><i class="fa-solid fa-street-view"></i> moSafir</h4>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-dark active" href="{{url('home/morroco')}}"><i class="bi bi-house-door"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{url('offers')}}"><i class="bi bi-box"></i> Offres</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{url('aboutus')}}"><i class="bi bi-info-circle"></i> About us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{url('community')}}"><i class="fa-solid fa-earth-africa"></i> Community</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="header">
        <h2>À Propos de Nous</h2>

    </header>

    <section id="aboutUs">
        <p>
            Chez <strong>moSafir</strong>, nous révolutionnons l'expérience de voyage en offrant des 
            <strong>offres exclusives</strong> sur des destinations uniques à des prix imbattables. 
            Notre plateforme connecte les voyageurs du monde entier en permettant l'<strong>hébergement gratuit</strong> 
            ou en échange de services, favorisant ainsi des rencontres authentiques et enrichissantes.
        </p>
        <p>
            Que vous soyez en quête d'<strong>aventure</strong> ou d'<strong>échanges culturels</strong>, 
            moSafir vous accompagne à chaque étape pour rendre votre séjour plus accessible et humain.  
            <br>Rejoignez-nous et découvrez une nouvelle façon de voyager !
        </p>
        
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>