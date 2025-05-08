<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About US</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
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
                            <a class="flex items-center text-gray-800 hover:text-gray-600" href="{{url('home/morroco')}}">
                                <i class="fa-solid fa-house-user mr-1"></i> Home
                            </a>
                        </li>
                        <li>
                            <a class="flex items-center text-gray-800 hover:text-gray-600" href="{{url('offers')}}">
                                <i class="fa-solid fa-box mr-1"></i> Offres
                            </a>
                        </li>
                        <li>
                            <a class="flex items-center text-gray-800 hover:text-gray-600 font-medium" href="{{url('aboutus')}}">
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
    
    <header class="bg-gradient-to-r from-blue-500 to-purple-600 text-white text-center py-32 mt-16">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl md:text-5xl font-bold">À Propos de Nous</h2>
        </div>
    </header>
    
    <section class="container mx-auto px-4 py-16 max-w-3xl">
        <div class="bg-white rounded-lg shadow-md p-8">
            <div class="prose prose-lg mx-auto text-gray-700 leading-relaxed">
                <p class="mb-6">
                    Chez <strong class="font-bold text-blue-600">moSafir</strong>, nous révolutionnons l'expérience de voyage en offrant des
                    <strong class="font-bold text-blue-600">offres exclusives</strong> sur des destinations uniques à des prix imbattables.
                    Notre plateforme connecte les voyageurs du monde entier en permettant l'<strong class="font-bold text-blue-600">hébergement gratuit</strong>
                    ou en échange de services, favorisant ainsi des rencontres authentiques et enrichissantes.
                </p>
                <p class="mb-6">
                    Que vous soyez en quête d'<strong class="font-bold text-blue-600">aventure</strong> ou d'<strong class="font-bold text-blue-600">échanges culturels</strong>,
                    moSafir vous accompagne à chaque étape pour rendre votre séjour plus accessible et humain.  
                    <br>Rejoignez-nous et découvrez une nouvelle façon de voyager !
                </p>
            </div>
        </div>
    </section>
    
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