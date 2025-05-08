<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offres</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
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
                            <a class="flex items-center text-gray-800 hover:text-gray-600" href="{{url('home/morroco')}}">
                                <i class="fa-solid fa-house-user mr-1"></i> Home
                            </a>
                        </li>
                        <li>
                            <a class="flex items-center text-gray-800 hover:text-gray-600 font-medium" href="{{url('offers')}}">
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

    <header class="bg-gradient-to-r from-blue-500 to-purple-600 text-white text-center py-28 mt-16">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl md:text-5xl font-bold">Offres</h1>
        </div>
    </header>

    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-col md:flex-row gap-6">
            <div class="w-full md:w-64 flex-shrink-0 bg-white rounded-lg shadow-md p-4">
                <form action="" method="POST" class="mb-6">
                    @csrf
                    <div class="flex">
                        <input type="text" name="searchByname" placeholder="Search..." 
                            class="w-full px-3 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <button class="bg-blue-500 text-white px-4 py-2 rounded-r-md hover:bg-blue-600 transition">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                </form>

                <!-- Categories Filter Form -->
                <form action="/offers/categories" method="POST">
                    @csrf
                    @php
                        $i = 0;
                    @endphp
                    
                    <div class="mb-2">
                        <label class="flex items-center space-x-2 cursor-pointer">
                            <input id="all" name="all" value="all" type="checkbox" 
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                            <span>All</span>
                        </label>
                    </div>
                    
                    <hr class="my-3">
                    
                    @foreach ($categories as $category)
                    <div class="mb-2">
                        <label class="flex items-center space-x-2 cursor-pointer">
                            <input id="category{{$i}}" name="category{{$i}}" value="{{$category->name}}" type="checkbox" 
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                            <span>{{$category->name}}</span>
                        </label>
                    </div>
                    @php $i++; @endphp
                    @endforeach
                    
                    <hr class="my-3">
                    
                    <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded transition">
                        Filter
                    </button>
                    <input type="hidden" name="index" value="{{$i}}">
                </form>
            </div>

            <!-- Main Content -->
            <div class="flex-grow">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($voyages as $voyage)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                        <img class="w-full h-48 object-cover object-center" src="{{ $voyage->image }}" alt="{{ $voyage->name}}">
                        <div class="p-4">
                            <div class="flex justify-between items-center mb-2">
                                <div class="star text-xl">
                                    @for ($i = 0; $i < $voyage->stars; $i++) ★ @endfor
                                </div>
                                <button class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-1 rounded">SUR DEMANDE</button>
                            </div>
                            <p class="text-gray-600 text-sm mb-2">
                                <i class="fa-solid fa-location-dot mr-1"></i> {{ $voyage->location }}
                            </p>
                            <h2 class="text-lg font-semibold text-gray-800 mb-2">{{ $voyage->title }}</h2>
                            <p class="text-gray-600 text-sm">{{ $voyage->description }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
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