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
            <form action="" method="POST" >
                @csrf
                <input type="text" name="searchByname" placeholder="search...">
                <button ><i class="fa-solid fa-magnifying-glass"></i></button>
                
            </form>

            <form action="/offers/categories" method="POST" class="sidbar">
                @csrf
                @php
                    $i = 0;
                @endphp
                <div>
                    <input id="beach" name="all" value="all" type="checkbox">
                    <label for="beach">All</label>
                </div>
                <hr>
                @foreach ($categories as $category)
                <div>
                    <input id="beach{{$i}}" name="category{{$i}}" value="{{$category->name}}" type="checkbox">
                    <label for="beach{{$i++}}">{{$category->name}}</label>
                </div>
                    
                @endforeach
                <hr>
                <button  class="btn btn-info" type="submit">Filter</button>
                <input type="hidden" name="index" value="{{$i}}">
            </form>
        </section>


        <section class="section-main">
            @foreach ($voyages as $voyage)
            
                <div class="card">
                    <img class="card-img" src="{{ $voyage->image }}" alt="{{ $voyage->name}}">
                    <div class="card-content">
                        <div class="card-header">
                            <div class="rating">
                                <i class="star">@for ($i = 0; $i < $voyage->stars; $i++) ★ @endfor</i>
                            </div>
                            <button class="btn-demand">SUR DEMANDE</button>
                        </div>
                        <p class="location">
                            <i class="fa-map-marker">📍</i> {{ $voyage->location }}
                        </p>
                        <h2 class="card-title">{{ $voyage->title }}</h2>
                        <p class="card-description">{{ $voyage->description }}</p>
                    </div>
                </div>
            @endforeach
        </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>