<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>singel offer</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-gray-100 text-gray-800 font-sans">
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
        <div class="flex h-screen mt-16">
            <main class="p-6">
                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <!-- Offer Header with Background Image -->
                    <div class="relative h-64 bg-gray-200">
                        <img src="{{ $offer->image }}" alt="{{ $offer->title }}" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-end">
                            <div class="p-6 text-white">
                                <h1 class="text-3xl font-bold">{{ $offer->title }}</h1>
                                <div class="flex items-center mt-2">
                                    <span class="inline-block px-2 py-1 text-xs rounded-full bg-white text-gray-800 mr-3">
                                        {{ number_format($offer->price, 2) }} DH
                                    </span>
                                    <span class="inline-block px-2 py-1 text-xs rounded-full bg-yellow-500 text-white">
                                        {{ $offer->stars }} Stars
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Offer Details -->
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-6">
                            <div class="text-sm text-gray-500">
                                <span class="mr-4"><i class="fas fa-map-marker-alt mr-1"></i> Address: {{ $offer->adress }}</span>
                            </div>
                        </div>
                        
                        <!-- Description -->
                        <div class="mb-6">
                            <h2 class="text-lg font-semibold text-gray-800 mb-2">Description</h2>
                            <div class="text-gray-600">
                                {{ $offer->description }}
                            </div>
                        </div>
                        
                        <!-- Additional Details -->
                        <div class="bg-gray-50 rounded-lg p-4">
                            <h2 class="text-lg font-semibold text-gray-800 mb-4">Details</h2>
                            <ul class="space-y-2">
                                <li class="flex">
                                    <span class="font-medium w-32 text-gray-500">Price:</span>
                                    <span>{{ number_format($offer->price, 2) }} DH</span>
                                </li>
                                <li class="flex">
                                    <span class="font-medium w-32 text-gray-500">Stars:</span>
                                    <span>{{ $offer->stars }}</span>
                                </li>
                                <li class="flex">
                                    <span class="font-medium w-32 text-gray-500">Address:</span>
                                    <span>{{ $offer->adress }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>