<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>moSafir - Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
        }
        
        .hero-header {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1503220317375-aaad61436b1b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80');
            background-size: cover;
            background-position: center;
        }
        
        .star {
            color: #FFD700;
        }
    </style>
</head>

<body class="bg-gray-50">
    <nav class="fixed top-0 left-0 right-0 bg-white shadow-md z-10">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <h4 class="text-xl font-bold text-gray-800"><i class="fa-solid fa-street-view"></i> moSafir</h4>

                <button class="md:hidden border border-gray-300 rounded px-2 py-1" id="menu-button">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>

                <div class="hidden md:flex" id="navbar-menu">
                    <ul class="flex space-x-6">
                        <li>
                            <a class="flex items-center text-gray-800 hover:text-gray-600 font-medium" href="{{url('home/morroco')}}">
                                <i class="fa-solid fa-house-user mr-1"></i> Home
                            </a>
                        </li>
                        <li>
                            <a class="flex items-center text-gray-800 hover:text-gray-600" href="{{url('offers')}}">
                                <i class="fa-solid fa-box mr-1"></i> Offres
                            </a>
                        </li>
                        <li>
                            <a class="flex items-center text-gray-800 hover:text-gray-600" href="{{url('aboutus')}}">
                                <i class="fa-solid fa-circle-info mr-1"></i> About us
                            </a>
                        </li>
                        <li>
                            <a class="flex items-center text-gray-800 hover:text-gray-600" href="{{url('community')}}">
                                <i class="fa-solid fa-earth-africa mr-1"></i> Community
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Header -->
    <header class="hero-header min-h-screen flex flex-col justify-between pt-20">
        <div class="container mx-auto px-4 pt-20 md:pt-32">
            <h1 class="text-4xl md:text-6xl font-bold text-white leading-tight">
                Lets Explore <br> Earth Together
            </h1>
        </div>
        
        <div class="container mx-auto px-4 pb-16 flex flex-col md:flex-row items-center md:justify-between">
            <h1 class="text-2xl text-white mb-4 md:mb-0">
                @if (session()->has('status'))
                    {{ session()->get('status') }}
                @endif
            </h1>

            @guest
                <div class="flex space-x-4">
                    <a href="{{ url('register') }}" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md transition">Register</a>
                    <a href="{{ url('login') }}" class="px-6 py-2 bg-white hover:bg-gray-100 text-blue-600 font-medium rounded-md transition">Login</a>
                </div>
            @endguest
            @auth
                <form action="{{ url('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="px-6 py-2 bg-white hover:bg-gray-100 text-blue-600 font-medium rounded-md transition">logout</button>
                </form>
            @endauth
        </div>
    </header>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-12">
        <!-- Offers Section -->
        <div class="flex flex-col md:flex-row justify-between items-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-4 md:mb-0">Découvrir Nos offres</h2>
            <a href="{{url('offers')}}" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md transition">Offres</a>
        </div>

        <!-- Promotions Section -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-2">Nos promotions en Cours</h2>
            <p class="text-gray-600 mb-6">
                Réserver vos prochaines vacances sur notre plateforme « », votre agence qui vous garantit le meilleur prix <br class="hidden md:block"> sur le marché.
            </p>

            <!-- Navigation Tabs -->
            <div class="border-b border-gray-200 mb-8">
                <ul class="flex flex-wrap -mb-px">
                    <li class="mr-2">
                        <a href="morroco" class="inline-block px-4 py-2 text-gray-600 hover:text-blue-600 hover:border-b-2 hover:border-blue-600 font-medium">Voyages Maroc</a>
                    </li>
                    <li class="mr-2">
                        <a href="monde" class="inline-block px-4 py-2 text-gray-600 hover:text-blue-600 hover:border-b-2 hover:border-blue-600 font-medium">Voyages Monde</a>
                    </li>
                    <li class="mr-2">
                        <a href="week-end" class="inline-block px-4 py-2 text-gray-600 hover:text-blue-600 hover:border-b-2 hover:border-blue-600 font-medium">Week-end</a>
                    </li>
                </ul>
            </div>

            <!-- Voyage Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($Voyages as $Voyage)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                    <img class="w-full h-48 object-cover object-center" src="{{ $Voyage->image }}" alt="{{ $Voyage->name }}">
                    <div class="p-4">
                        <div class="flex justify-between items-center mb-2">
                            <div class="star text-xl">
                                @for ($i = 0; $i < $Voyage->stars; $i++) ★ @endfor
                            </div>
                            <button class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-1 rounded"><a href="{{ url('single-offer/' . $Voyage->id) }}">More</a></button>
                        </div>
                        <p class="text-gray-600 text-sm mb-2">
                            <i class="fa-solid fa-location-dot mr-1"></i> {{ $Voyage->location }}
                        </p>
                        <h2 class="text-lg font-semibold text-gray-800 mb-2">{{ $Voyage->title }}</h2>
                        <p class="text-gray-600 text-sm">{{ $Voyage->description }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- About Us Section -->
        <section class="bg-white rounded-lg shadow-md p-8 my-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">À Propos de Nous</h2>
            <div class="prose prose-lg text-gray-700 mb-6">
                <p class="mb-4">
                    Chez <strong class="text-blue-600">moSafir</strong>, nous révolutionnons l'expérience de voyage en offrant des 
                    <strong class="text-blue-600">offres exclusives</strong> sur des destinations uniques à des prix imbattables. 
                    Notre plateforme connecte les voyageurs du monde entier en permettant l'<strong class="text-blue-600">hébergement gratuit</strong> 
                    ou en échange de services, favorisant ainsi des rencontres authentiques et enrichissantes.
                </p>
                <p>
                    Que vous soyez en quête d'<strong class="text-blue-600">aventure</strong> ou d'<strong class="text-blue-600">échanges culturels</strong>, 
                    moSafir vous accompagne à chaque étape pour rendre votre séjour plus accessible et humain.  
                    <br>Rejoignez-nous et découvrez une nouvelle façon de voyager !
                </p>
            </div>
            <a href="{{url('aboutus')}}" class="inline-block px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md transition">Découvrir Plus</a>
        </section>
    </div>

    <script>
        // Mobile menu toggle
        document.getElementById('menu-button').addEventListener('click', function() {
            const menu = document.getElementById('navbar-menu');
            menu.classList.toggle('hidden');
            menu.classList.toggle('block');
            menu.classList.toggle('absolute');
            menu.classList.toggle('top-16');
            menu.classList.toggle('right-4');
            menu.classList.toggle('bg-white');
            menu.classList.toggle('shadow-md');
            menu.classList.toggle('p-4');
            menu.classList.toggle('rounded-md');
            menu.classList.toggle('w-48');
            
            if (!menu.classList.contains('hidden')) {
                menu.querySelector('ul').classList.remove('flex', 'space-x-6');
                menu.querySelector('ul').classList.add('flex', 'flex-col', 'space-y-3');
            } else {
                menu.querySelector('ul').classList.add('flex', 'space-x-6');
                menu.querySelector('ul').classList.remove('flex', 'flex-col', 'space-y-3');
            }
        });
    </script>
</body>

</html>