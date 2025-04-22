<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offres</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/client/style2.css') }}">

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
                        <a class="nav-link text-dark" href="{{url('offre')}}"><i class="bi bi-box"></i> offres</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{url('aboutus')}}"><i class="bi bi-info-circle"></i> About us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{url('community')}}"><i class="fa-solid fa-earth-africa"></i> Community </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="header">
        <h1>Offres</h1>
    </header>

    <div class="container-fluid containe">
        <div class="showSidBare"></div>
        <section class="sidbar">
            <div>
                <input type="text" name="searchByname" placeholder="search...">
                <a href=""><i class="fa-solid fa-magnifying-glass"></i></a>
            </div>
            <hr>

            <div>
                <label for="hotel">Hotel</label>
                <input id="hotel" name="searchByCategory" type="checkbox">
            </div>

            <div>
                <label for="pace">pace</label>
                <input id="pace" name="searchByCategory" type="checkbox">
            </div>

            <div>
                <label for="nature">nature</label>
                <input id="nature" name="searchByCategory" type="checkbox">
            </div>

            <div>
                <label for="beach">beach</label>
                <input id="beach" name="searchByCategory" type="checkbox">
            </div>
            <hr>
        </section>
        <section class="section-main">
            @foreach ($Voyages as $Voyage)
                <div class="card">
                    <img class="card-img" src="{{ $Voyage->image }}" alt="{{ $Voyage->name}}">
                    <div class="card-content">
                        <div class="card-header">
                            <div class="rating">
                                <i class="star">@for ($i = 0; $i < $Voyage->stars; $i++) ★ @endfor</i>
                            </div>
                            <button class="btn-demand">SUR DEMANDE</button>
                        </div>
                        <p class="location">
                            <i class="fa-map-marker">📍</i> {{ $Voyage->location }}
                        </p>
                        <h2 class="card-title">{{ $Voyage->title }}</h2>
                        <p class="card-description">{{ $Voyage->description }}</p>
                    </div>
                </div>
            @endforeach
        </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>