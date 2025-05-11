@extends('layouts.admin')


@section('content')
<div class="content">
    <h3 class="section-title">Offers</h3>
    <form class="cardPlus">
        <button class="circle-button" aria-label="Add item"></button>
    </form>
    <div class="flex-grow">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="flex items-center justify-center">
                <a href="{{url('admin/create/post')}}" class="rounded-full h-16 w-16 flex items-center justify-center bg-gray-500">
                    +
                </a>
            </div>
        @foreach ($voyages as $voyage)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                <img class="w-full h-48 object-cover object-center" src="{{ $voyage->image }}" alt="{{ $voyage->name}}">
                <div class="p-4">
                    <div class="flex justify-between items-center mb-2">
                        <div class="star text-xl">
                            @for ($i = 0; $i < $voyage->stars; $i++) ★ @endfor
                        </div>
                        <button class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-1 rounded"><a href="{{ url('/admin/single-offer/' . $voyage->id) }}">More</a></button>
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
@endsection